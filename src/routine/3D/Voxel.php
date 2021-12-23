<?php
/**
 *                   ______                            __
 *           __     /\\\\\\\\_                        /\\\
 *          /\\\  /\\\//////\\\_                      \/\\\
 *        /\\\//  \///     \//\\\    ________       ___\/\\\         _______
 *      /\\\//               /\\\   /\\\\\\\\\_    /\\\\\\\\\       /\\\\\\\\_
 *    /\\\//_              /\\\\/   /\\\/////\\\   /\\\////\\\     /\\\/////\\\
 *    \////\\\ __          /\\\/    \/\\\   \/\\\  \/\\\  \/\\\    /\\\\\\\\\\\
 *        \////\\\ __      \///_     \/\\\___\/\\\  \/\\\__\/\\\   \//\\\//////_
 *            \////\\\       /\\\     \/\\\\\\\\\\   \//\\\\\\\\\    \//\\\\\\\\\
 *                \///       \///      \/\\\//////     \/////////      \/////////
 *                                      \/\\\
 *                                       \///
 *
 *                         /P(?:ointless|ortable|HP) Demo Engine/
 */

declare(strict_types=1);

namespace ABadCafe\PDE\Routine;

use ABadCafe\PDE;
use ABadCafe\PDE\Graphics;
use \SPLFixedArray;
use function \array_fill, \cos, \sin;

/**
 * Voxel
 *
 */
class Voxel extends Base implements IResourceLoader {

    use TResourceLoader;

    const DEFAULT_PARAMETERS = [
        'sTexture'   => 'required',
        'sElevation' => 'required',
        'fInitX'     => 0.0,
        'fInitY'     => 0.0,
        'fYaw'       => 0.0,
        'fAltitude'  => 180.0,
        'fHorizon'   => 40.0,
        'fVertScale' => 0.1,
        'fViewDist'  => 1.8,
        'fLODScale'  => 0.00001
    ];

    private Graphics\Image $oTexture;

    /** @var SPLFixedArray<int> */
    private SPLFixedArray  $oElevation;

    /**
     * @inheritDoc
     */
    public function preload() : self {
        $this->oTexture = $this->loadPNM($this->oParameters->sTexture);
        $oElevation     = $this->loadPNM($this->oParameters->sElevation);

        if (
            $this->oTexture->getWidth()  != $oElevation->getWidth() ||
            $this->oTexture->getHeight() != $oElevation->getHeight()
        ) {
            throw new \Exception('Mismatched map size');
        }

        $this->oElevation = $oElevation->getPixels();

        foreach ($this->oElevation as $i => $iValue) {
            $this->oElevation[$i] = $iValue & 0xFF;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDisplay(PDE\IDisplay $oDisplay): self {
        $this->bCanRender = ($oDisplay instanceof PDE\Display\IPixelled);
        $this->oDisplay   = $oDisplay;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function render(int $iFrameNumber, float $fTimeIndex): self {
        $iViewWidth = $this->oDisplay->getWidth();
        $iMapWidth  = $this->oTexture->getWidth();

        $this->oParameters->fInitY -= 0.01;

        $this->oParameters->fYaw -= 0.01;

        // Decompose viewing angle
        $fSinYaw = sin($this->oParameters->fYaw);
        $fCosYaw = cos($this->oParameters->fYaw);

        // Initialise a new height buffer. This is the width of the display and records
        // the current maximum height of a column to reduce overdraw.
        $oHeightBuffer = SPLFixedArray::fromArray(
            array_fill(0, $iViewWidth, $this->oDisplay->getHeight()-1)
        );

        $fWidthFactor = 1.0 / $iViewWidth;

        $oHeightMap = $this->oElevation;
        $oColourMap = $this->oTexture->getPixels();
        $oPixels    = $this->castDisplayPixelled()->getPixels();

        $i = (int)($iViewWidth * $this->oParameters->fHorizon * 1.3);
        while ($i--) {
            $oPixels[$i] = 0x66AAFF;
        }

        // Depth values
        $fDeltaZ = $fZ  = 0.0005;
        while ($fZ < $this->oParameters->fViewDist) {

            // Project the view lines
            $fLeftX = $this->oParameters->fInitX - $fZ * (
                $fCosYaw + $fSinYaw
            );
            $fLeftY = $this->oParameters->fInitY + $fZ * (
                $fSinYaw - $fCosYaw
            );

            $fRightX = $this->oParameters->fInitX + $fZ * (
                $fCosYaw - $fSinYaw
            );
            $fRightY = $this->oParameters->fInitY - $fZ * (
                $fSinYaw + $fCosYaw
            );

            $fDeltaX = $fWidthFactor * ($fRightX - $fLeftX);
            $fDeltaY = $fWidthFactor * ($fRightY - $fLeftY);

            for ($iX = 0; $iX < $iViewWidth; $iX++) {

                $iMapX = ($fLeftX * $iViewWidth)&0xFF;
                $iMapY = ($fLeftY * $iViewWidth)&0xFF;

                $iMapIndex = $iMapX + $iMapY * $iMapWidth;

                $iViewHeight = (int)(
                    ($this->oParameters->fAltitude - ($oHeightMap[$iMapIndex])) / $fZ * $this->oParameters->fVertScale + $this->oParameters->fHorizon
                );

                $iRGB       = $oColourMap[$iMapIndex];
                $iViewIndex = $iX + $oHeightBuffer[$iX] * $iViewWidth;

                if ($iViewIndex < 0) {
                    break;
                }

                for ($iY = $oHeightBuffer[$iX]; $iY > $iViewHeight; $iY--) {
                    $oPixels[$iViewIndex] = $iRGB;
                    $iViewIndex -= $iViewWidth;
                }


                if ($iViewHeight < $oHeightBuffer[$iX]) {
                    $oHeightBuffer[$iX] = $iViewHeight;
                }
                $fLeftX += $fDeltaX;
                $fLeftY += $fDeltaY;
            }

            $fZ += $fDeltaZ;
            $fDeltaZ += $this->oParameters->fLODScale;
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function parameterChange(): void {

    }
}

