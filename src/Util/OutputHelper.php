<?php


namespace Hero\Util;


class OutputHelper
{
    /**
     * Outputs a line to the screen
     *
     * @param string $string
     */
    public static function writeln(string $string): void
    {
        echo sprintf("%s%s", $string, PHP_EOL);
    }

    /**
     * Outputs a string to the screen
     *
     * @param string $string
     */
    public static function write(string $string): void
    {
        echo $string;
    }
}