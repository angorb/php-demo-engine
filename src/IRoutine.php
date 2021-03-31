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

namespace ABadCafe\PDE;

/**
 * IRoutine
 *
 * Base interface for routines
 */
interface IRoutine {

    /**
     * Expected constructor profile
     *
     * @param IDisplay $oDisplay
     * @param array    $aParameters
     */
    public function __construct(IDisplay $oDisplay, array $aParameters = []);

    /**
     * Set a new display.
     */
    public function setDisplay(IDisplay $oDisplay) : self;

    /**
     * Accepts a key/value set of parameters to change. This can be a sequence event in
     * the overall timeline and will generally take effect on the next call to render().
     *
     * The implementation should not throw here. rather:
     *     Unknown parameter names will be ignored.
     *     The type of a parameter will be force cast (where appropriate)
     *     Out of range values will be clamped..
     *
     * @param  array $aParameters [key => value]
     * @return self  fluent
     */
    public function setParameters(array $aParameters) : self;

    /**
     * Render a frame to the given display
     *
     * @param  IDisplay $oDisplay
     * @param  int      $iFrameNumber
     * @param  float    $fTimeIndex
     * @return self     fluent
     */
    public function render(int $iFrameNumber, float $fTimeIndex) : self;
}