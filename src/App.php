<?php


namespace Hero;


use Hero\Battle\Battle;
use Hero\Builder\BeastBuilder;
use Hero\Builder\HeroBuilder;
use Hero\Builder\PlayerDirector;
use Hero\Player\Beast;
use Hero\Player\Hero;

class App
{
    /**
     * Application starting point
     */
    public static function run(): void
    {
        $firstPlayer = (new PlayerDirector())->build(new HeroBuilder(new Hero()));
        $secondPlayer = (new PlayerDirector())->build(new BeastBuilder(new Beast()));

        $firstPlayer->setName('Orderus');
        $secondPlayer->setName('the vicious Refund beast');

        $battle = new Battle();

        $battle->setFirstPlayer($firstPlayer);
        $battle->setSecondPlayer($secondPlayer);

        $battle->fight();
    }
}