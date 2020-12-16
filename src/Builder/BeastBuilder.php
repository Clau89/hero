<?php


namespace Hero\Builder;

use Hero\Player\Beast;
use Hero\Player\Player;
use Hero\Util\PlayerHelper;

class BeastBuilder implements PlayerBuilderInterface
{
    private $beast;

    public function __construct(Player $beast)
    {
        $this->beast = $beast;
    }

    public function setHealth(): self
    {
        $this->beast->setHealth(PlayerHelper::getRandomStatInRange(Beast::HEALTH_MIN_LIMIT, Beast::HEALTH_MAX_LIMIT));

        return $this;
    }

    public function setStrength(): self
    {
        $this->beast->setStrenght(PlayerHelper::getRandomStatInRange(Beast::STRENGHT_MIN_LIMIT, Beast::STRENGHT_MAX_LIMIT));

        return $this;
    }

    public function setDefence(): self
    {
        $this->beast->setDefence(PlayerHelper::getRandomStatInRange(Beast::DEFENCE_MIN_LIMIT, Beast::DEFENCE_MAX_LIMIT));

        return $this;
    }

    public function setSpeed(): self
    {
        $this->beast->setSpeed(PlayerHelper::getRandomStatInRange(Beast::SPEED_MIN_LIMIT, Beast::SPEED_MAX_LIMIT));

        return $this;
    }

    public function setLuck(): self
    {
        $this->beast->setLuck(PlayerHelper::getRandomStatInRange(Beast::LUCK_PERCENTAGE_MIN_LIMIT, Beast::LUCK_PERCENTAGE_MAX_LIMIT));

        return $this;
    }

    /**
     * @return Player
     */
    public function getPlayer():Player
    {
        return $this->beast;
    }
}