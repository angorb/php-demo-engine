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

namespace ABadCafe\PDE\Audio\Signal\Waveform;
use ABadCafe\PDE\Audio;

use function \is_object;

/**
 * Waveform factory
 */
class Factory implements Audio\IFactory {

    use Audio\TFactory;

    const STANDARD_KEY = 'Waveform';

    const PRODUCT_TYPES = [
        'Sine'      => 'createSimple',
        'Triangle'  => 'createSimple',
        'Saw'       => 'createSimple',
        'Square'    => 'createSimple',
        'Noise'     => 'createSimple',
        'Pulse'     => 'createPulse',
        'Rectifier' => 'createRectifier',
        'Mutator'   => 'createMutator'
    ];

    /**
     * @inheritDoc
     */
    public function createFrom(\stdClass $oDefinition): Audio\Signal\IWaveform {
        $sType    = $oDefinition->sType ?? '<none>';
        $sFactory = self::PRODUCT_TYPES[$sType] ?? null;
        if ($sFactory) {
            /** @var callable $cCreator */
            $cCreator = [$this, $sFactory];
            return $cCreator($oDefinition, $sType);
        }
        throw new \RuntimeException('Unknown waveform type ' . $sType);
    }

    /**
     * Return one of the basic waveform types.
     *
     * @param  \stdClass $oDefinition
     * @param  string $sType
     * @return Audio\Signal\IWaveform
     */
    private function createSimple(\stdClass $oDefinition, $sType): Audio\Signal\IWaveform {
        $bAliased = isset($oDefinition->bAliased) && $oDefinition->bAliased;
        switch ($sType) {
            case 'Sine':     return new Sine();
            case 'Triangle': return new Triangle();
            case 'Noise':    return new WhiteNoise();
            case 'Saw':      return $bAliased ? new AliasedSaw()    : new Saw();
            case 'Square':   return $bAliased ? new AliasedSquare() : new Square();
        }
        throw new \RuntimeException('Unknown waveform type ' . $sType);
    }

    /**
     * Return the PWM waveform.
     *
     * @param  \stdClass $oDefinition
     * @param  string $sType
     * @return Audio\Signal\IWaveform
     */
    private function createPulse(\stdClass $oDefinition, $sType): Audio\Signal\IWaveform {
        $bAliased = isset($oDefinition->bAliased) && $oDefinition->bAliased;

        // TODO - check for a PWM modulator definition in here

        return $bAliased ? new AliasedPulse() : new Pulse();
    }

    /**
     * Return a Rectifier based waveform.
     *
     * @param  \stdClass $oDefinition
     * @param  string $sType
     * @return Audio\Signal\IWaveform
     */
    private function createRectifier(\stdClass $oDefinition, $sType): Audio\Signal\IWaveform {
        if (
        empty($oDefinition->{self::STANDARD_KEY}) ||
            !$oDefinition->{self::STANDARD_KEY} instanceof \stdClass
        ) {
            throw new \RuntimeException('Rectifier requires a waveform');
        }

        if (!empty($oDefinition->iPreset)) {
            $iPreset = (int)$oDefinition->iPreset;
            return Rectifier::createStandard($this->createFrom($oDefinition->{self::STANDARD_KEY}), $iPreset);
        }

        $fMinLevel = (float)($oDefinition->fMinLevel ?? -1.0);
        $fMaxLevel = (float)($oDefinition->fMaxLevel ?? 1.0);
        $fScale    = (float)($oDefinition->fScale    ?? 1.0);
        $fBias     = (float)($oDefinition->fBias     ?? 0.0);
        $bFold     = (bool)($oDefinition->bFold      ?? false);

        return new Rectifier(
            $this->createFrom($oDefinition->{self::STANDARD_KEY}),
            $fMinLevel,
            $fMaxLevel,
            $bFold,
            $fScale,
            $fBias
        );
    }

    /**
     * Return a Mutator based waveform.
     *
     * @param  \stdClass $oDefinition
     * @param  string $sType
     * @return Audio\Signal\IWaveform
     */
    private function createMutator(\stdClass $oDefinition, $sType): Audio\Signal\IWaveform {
        if (
            empty($oDefinition->{self::STANDARD_KEY}) ||
            !$oDefinition->{self::STANDARD_KEY} instanceof \stdClass
        ) {
            throw new \RuntimeException('Mutator requires a waveform');
        }
        return new QuadrantMutator(
            $this->createFrom($oDefinition->{self::STANDARD_KEY})
        );
    }
}
