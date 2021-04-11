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

namespace ABadCafe\PDE\Display;
use \SPLFixedArray;

/**
 * IPixelled
 *
 * Interface for displays that model some sort of basic pixelling. This will typically involve a lot of
 * cheating around with ANSI escape sequences to simulate a (very blocky) bitmap.
 */
interface IPixelled {

    const
        /**
         * LUT : Background character cell only
         */
        PIX_LUT = 0,

        /**
         * ASCII + Forground LUT + Background Black
         */
        PIX_ASCII_LUT = 1,

        /**
         * ASCII + Forground LUT + Background LUT
         */
        PIX_ASCII_LUT2 = 2,

        /**
         * RGB : Background character cell only
         */
        PIX_RGB = 3,

        /**
         * ASCII + Forground RGB + Background Black
         */
        PIX_ASCII_RGB = 4,

        /**
         * ASCII + Forground RGB + Background RGB
         */
        PIX_ASCII_RGB2 = 5
    ;

    /**
     * Query the format of the pixel. Returns an integer matching one of the PIX_ constants.
     *
     * @return int
     */
    public function getPixelFormat() : int;

    /**
     * Returns a fixed length array of integer values that represent the pixels. The size of the array
     * is the product of the display's width and height.
     *
     * @return SPLFixedArray
     */
    public function getPixelBuffer() : SPLFixedArray;
}