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

namespace ABadCafe\PDE\Audio\Signal\Filter;

use ABadCafe\PDE\Audio;

/**
 * Band Pass filter.
 *
 * @see https://github.com/0xABADCAFE/random-proto-synth
 *
 * Filter implementation based on http://www.musicdsp.org/en/latest/Filters/141-karlsen.html
 */
class BandPass extends Base {

    /**
     * @inheritDoc
     */
    protected function applyFixedCutoffFixedResonance() {
        $oInputSamples  = $this->oInputStream->emit($this->iLastIndex);
        $oOutputSamples = $this->oLastOutputPacket;
        $fResonance     = $this->fFixedResonance * self::F_SCALE_MAX_Q;
        foreach ($oInputSamples as $i => $fInput) {
            $this->filterSample($fInput, $this->fFixedCutoff, $fResonance);
            $oOutputSamples[$i] = $this->fPole4 - $this->fPole1;
        }
    }

    /**
     * @inheritDoc
     */
    protected function applyVaryingCutoffFixedResonance() {
        $oInputSamples  = $this->oInputStream->emit($this->iLastIndex);
        $oOutputSamples = $this->oLastOutputPacket;
        $oCutoffValues  = $this->oCutoffControl->emit($this->iLastIndex);
        $fResonance     = $this->fFixedResonance * self::F_SCALE_MAX_Q;
        foreach ($oInputSamples as $i => $fInput) {
            $this->filterSample($fInput, $oCutoffValues[$i] * $this->fFixedCutoff, $fResonance);
            $oOutputSamples[$i] = $this->fPole4 - $this->fPole1;
        }
    }

    /**
     * @inheritDoc
     */
    protected function applyFixedCutoffVaryingResonance() {
        $oInputSamples    = $this->oInputStream->emit($this->iLastIndex);
        $oOutputSamples   = $this->oLastOutputPacket;
        $oResonanceValues = $this->oResonanceControl->emit($this->iLastIndex);
        $fResonance       = $this->fFixedResonance * self::F_SCALE_MAX_Q;
        foreach ($oInputSamples as $i => $fInput) {
            $this->filterSample($fInput, $this->fFixedCutoff, $fResonance * $oResonanceValues[$i]);
            $oOutputSamples[$i] = $this->fPole4 - $this->fPole1;
        }
    }

    /**
     * @inheritDoc
     */
    protected function applyVaryingCutoffVaryingResonance() {
        $oInputSamples    = $this->oInputStream->emit($this->iLastIndex);
        $oOutputSamples   = $this->oLastOutputPacket;
        $oCutoffValues    = $this->oCutoffControl->emit($this->iLastIndex);
        $oResonanceValues = $this->oResonanceControl->emit($this->iLastIndex);
        $fResonance       = $this->fFixedResonance * self::F_SCALE_MAX_Q;
        foreach ($oInputSamples as $i => $fInput) {
            $this->filterSample($fInput, $oCutoffValues[$i] * $this->fFixedCutoff, $fResonance * $oResonanceValues[$i]);
            $oOutputSamples[$i] = $this->fPole4 - $this->fPole1;
        }
    }
}