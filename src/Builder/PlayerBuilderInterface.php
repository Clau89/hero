<?php

namespace Hero\Builder;

// Builder interface
interface PlayerBuilderInterface
{
    public function setHealth();
    public function setStrength();
    public function setDefence();
    public function setSpeed();
    public function setLuck();
    public function getPlayer();
}