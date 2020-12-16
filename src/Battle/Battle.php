<?php


namespace Hero\Battle;


use Hero\Player\Hero;
use Hero\Player\Player;
use Hero\Util\OutputHelper;

class Battle
{
    private const TURNS_MAX_LIMIT = 20;

    /**
     * @var Player
     */
    private $firstPlayer;

    /**
     * @var Player
     */
    private $secondPlayer;

    /**
     * @return Player
     */
    public function getFirstPlayer(): Player
    {
        return $this->firstPlayer;
    }

    /**
     * @param Player $firstPlayer
     * @return Battle
     */
    public function setFirstPlayer(Player $firstPlayer): self
    {
        $this->firstPlayer = $firstPlayer;

        return $this;
    }

    /**
     * @return Player
     */
    public function getSecondPlayer(): Player
    {
        return $this->secondPlayer;
    }

    /**
     * @param Player $secondPlayer
     * @return Battle
     */
    public function setSecondPlayer(Player $secondPlayer): self
    {
        $this->secondPlayer = $secondPlayer;

        return $this;
    }

    public function fight(): void
    {
        if (!$this->firstPlayer instanceof Player || !$this->secondPlayer instanceof Player) {
            OutputHelper::writeln("The fight requires two participants to commence");
            return;
        }

        OutputHelper::writeln((string)$this->firstPlayer);
        OutputHelper::writeln((string)$this->secondPlayer);
        OutputHelper::writeln('');
        OutputHelper::writeln('The battle begins!');
        OutputHelper::writeln('');

        if ($this->firstPlayer->getSpeed() > $this->secondPlayer->getSpeed()) {
            $firstTurn = $this->firstPlayer;
            $secondTurn = $this->secondPlayer;
        } elseif ($this->firstPlayer->getSpeed() < $this->secondPlayer->getSpeed()) {
            $firstTurn = $this->secondPlayer;
            $secondTurn = $this->firstPlayer;
        } elseif ($this->secondPlayer->getLuck() > $this->firstPlayer->getLuck()) {
            $firstTurn = $this->secondPlayer;
            $secondTurn = $this->firstPlayer;
        } else {
            $firstTurn = $this->firstPlayer;
            $secondTurn = $this->secondPlayer;
        }

        for ($i = 0; $i < self::TURNS_MAX_LIMIT; $i++) {
            if ($i % 2 === 0) {
                $attacker = $firstTurn;
                $defender = $secondTurn;
            } else {
                $attacker = $secondTurn;
                $defender = $firstTurn;
            }

            if ($attacker instanceof Hero && $attacker->canUseRapidStrike()) {
                $damage = $attacker->rapidStrike($defender);
            } else {
                $damage = $attacker->attack($defender);

                if ($defender instanceof Hero && $defender->canUseMagicShield()) {
                    $damage = $defender->magicShield($damage);
                }
            }

            $defender->setHealth($defender->getHealth() - $damage);

            if ($defender->getHealth() <= 0) {
                OutputHelper::write("The battle is over. ");
                OutputHelper::writeln(\sprintf(
                    "Result: %s has won. %s has been defeated.",
                    $attacker->getName(),
                    $defender->getName()
                ));

                return;
            }

            OutputHelper::writeln(\sprintf(
                "%s has %d health left.",
                \ucfirst($defender->getName()),
                $defender->getHealth()
            ));
        }

        OutputHelper::writeln(\sprintf(
            "The battle is over. Both fighters are exhausted. %s had %d health left, while %s has %d health left.",
            $firstTurn->getName(),
            $firstTurn->getHealth(),
            $secondTurn->getName(),
            $secondTurn->getHealth()
        ));

        OutputHelper::writeln(\sprintf(
            "Result: %s.",
            $firstTurn->getHealth() === $secondTurn->getHealth()
                ? "draw"
                : \sprintf(
                    "%s has won.",
                    $firstTurn->getHealth() > $secondTurn->getHealth() ? $firstTurn->getName() : $secondTurn->getName()
                    )
        ));
    }
}