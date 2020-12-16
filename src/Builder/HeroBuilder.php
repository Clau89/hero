<?php


namespace Hero\Builder;

use Hero\Player\Hero;
use Hero\Player\Player;
use Hero\Util\PlayerHelper;

class HeroBuilder implements PlayerBuilderInterface
{
    private $hero;

    public function __construct(Player $hero)
    {
        $this->hero = $hero;
    }

    public function setHealth(): self
    {
        $this->hero->setHealth(PlayerHelper::getRandomStatInRange(Hero::HEALTH_MIN_LIMIT, Hero::HEALTH_MAX_LIMIT));

        return $this;
    }

    public function setStrength(): self
    {
        $this->hero->setStrenght(PlayerHelper::getRandomStatInRange(Hero::STRENGHT_MIN_LIMIT, Hero::STRENGHT_MAX_LIMIT));

        return $this;
    }

    public function setDefence(): self
    {
        $this->hero->setDefence(PlayerHelper::getRandomStatInRange(Hero::DEFENCE_MIN_LIMIT, Hero::DEFENCE_MAX_LIMIT));

        return $this;
    }

    public function setSpeed(): self
    {
        $this->hero->setSpeed(PlayerHelper::getRandomStatInRange(Hero::SPEED_MIN_LIMIT, Hero::SPEED_MAX_LIMIT));

        return $this;
    }

    public function setLuck(): self
    {
        $this->hero->setLuck(PlayerHelper::getRandomStatInRange(Hero::LUCK_PERCENTAGE_MIN_LIMIT, Hero::LUCK_PERCENTAGE_MAX_LIMIT));

        return $this;
    }

    /**
     * @return Player
     */
    public function getPlayer():Player
    {
        return $this->hero;
    }
}