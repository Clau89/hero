<?php


namespace Hero\Util;


class PlayerHelper
{
    /**
     * Returns a random interger stat between the provided limits
     *
     * @param int $start
     * @param int $end
     * @return int
     */
    public static function getRandomStatInRange(int $start, int $end): int
    {
        return rand($start, $end);
    }
}