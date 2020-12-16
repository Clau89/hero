<?php


namespace Hero\Builder;

use Hero\Player\Player;

class PlayerDirector
{
    /**
     * Builds the components of the player using the abstract builder parameter.
     * Returns the specific player object.
     *
     * @param PlayerBuilderInterface $builder
     * @return Player
     */
    public function build(PlayerBuilderInterface $builder): Player
    {
        $builder->setHealth()
            ->setStrength()
            ->setDefence()
            ->setSpeed()
            ->setLuck();

        return $builder->getPlayer();
    }
}