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

/**
 * IANSIControl
 *
 * ANSI Control sequences. Constants ending _TPL are printf() formatting templates that expect parameters
 */
interface IANSIControl {
    const
        // Simple legacy colour mode
        ATTR_COLOUR_TPL = "\x1b[3%d;4%dm",
        ATTR_COLOUR_DEF = "\x1b[37;40m",

        BLACK   = 0,
        RED     = 1,
        GREEN   = 2,
        YELLOW  = 3,
        BLUE    = 4,
        MAGENTA = 5,
        CYAN    = 6,
        WHITE   = 7,

        // Character cell attributes
        ATTR_RESET      = "\x1b[m",
        ATTR_FG_RGB_TPL = "\x1b[38;2;%d;%d;%dm",
        ATTR_BG_RGB_TPL = "\x1b[48;2;%d;%d;%dm",

        // Cursor
        CRSR_ON       = "\x1b[?25h",
        CRSR_OFF      = "\x1b[?25l",
        CRSR_TOP_LEFT = "\x1b[2H",

        // Terminal
        TERM_CLEAR      = "\x1b[2J",
        TERM_SIZE_TPL   = "\x1b[8;%d;%dt"
    ;

}
