<?php


namespace Hero\Player;


use Hero\Util\OutputHelper;

class Hero extends Player
{
    public const HEALTH_MIN_LIMIT= 70;
    public const HEALTH_MAX_LIMIT  = 100;
    public const STRENGHT_MIN_LIMIT = 70;
    public const STRENGHT_MAX_LIMIT = 80;
    public const DEFENCE_MIN_LIMIT = 45;
    public const DEFENCE_MAX_LIMIT = 55;
    public const SPEED_MIN_LIMIT = 40;
    public const SPEED_MAX_LIMIT = 50;
    public const LUCK_PERCENTAGE_MIN_LIMIT = 10;
    public const LUCK_PERCENTAGE_MAX_LIMIT = 30;

    public const RAPID_STRIKE_CHANCE_PERCENTAGE = 10;
    public const RAPID_STRIKE_MULTIPLIER = 2;
    public const MAGIC_SHIELD_CHANCE_PERCENTAGE = 20;

    /**
     * Executes multiple strikes on the target
     *
     * @param Player $target
     * @return int
     */
    public function rapidStrike(Player $target): int
    {
        $damage = 0;

        OutputHelper::writeln(\sprintf("%s initiates a rapid strike:", \ucfirst($this->getName())));

        for ($i = 0; $i < self::RAPID_STRIKE_MULTIPLIER; $i++) {
            $damage += $this->attack($target);
        }

        return $damage;
    }

    /**
     * Reduces damage by half
     *
     * @param int $damage
     * @return int
     */
    public function magicShield(int $damage): int
    {
        $damage = $damage / 2;

        OutputHelper::writeln(\sprintf(
            "%s defends using magic shield and only takes %d damage.",
            \ucfirst($this->getName()),
            $damage
        ));

        return $damage;
    }

    /**
     * Determines whether the hero can execute a rapid strike
     *
     * @return bool
     */
    public function canUseRapidStrike(): bool
    {
        return \rand(1, 100) <= self::RAPID_STRIKE_CHANCE_PERCENTAGE;
    }

    /**
     * Determines whether the hero can execute a rapid strike
     *
     * @return bool
     */
    public function canUseMagicShield(): bool
    {
        return \rand(1, 100) <= self::MAGIC_SHIELD_CHANCE_PERCENTAGE;
    }
}