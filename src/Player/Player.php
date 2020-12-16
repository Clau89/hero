<?php


namespace Hero\Player;


use Hero\Util\OutputHelper;

class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $health;

    /**
     * @var int
     */
    private $strenght;

    /**
     * @var int
     */
    private $defence;

    /**
     * @var int
     */
    private $speed;

    /**
     * @var int
     */
    private $luck;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth(int $health)
    {
        $this->health = $health;
    }

    /**
     * @return int
     */
    public function getStrenght(): int
    {
        return $this->strenght;
    }

    /**
     * @param int $strenght
     */
    public function setStrenght(int $strenght)
    {
        $this->strenght = $strenght;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @param int $defence
     */
    public function setDefence(int $defence)
    {
        $this->defence = $defence;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     */
    public function setSpeed(int $speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * @param int $luck
     */
    public function setLuck(int $luck)
    {
        $this->luck = $luck;
    }

    /**
     * Executes an attack on a target player, returns damage dealth
     *
     * @param Player $target
     * @return int
     */
    public function attack(Player $target): int
    {
        $damage = 0;

        if (!$target->isPlayerLucky()) {
            $damage = $this->getStrenght() - $target->getDefence();

            OutputHelper::writeln(\sprintf(
                "%s attacks, dealing %d damage to %s.",
                \ucfirst($this->getName()),
                $damage,
                $target->getName()
            ));
        } else {
            OutputHelper::writeln(\sprintf(
                "%s attacks, but misses %s.",
                \ucfirst($this->getName()),
                $target->getName()
            ));
        }

        return $damage;
    }

    /**
     * Returns a boolean indicating if the player is within his luck percentage
     *
     * @return bool
     */
    public function isPlayerLucky(): bool
    {
        return rand(1, 100) <= $this->getLuck();
    }

    /**
     * Outputs object's properties when converted to string
     *
     * @return string
     */
    public function __toString(): string
    {
        $classParts = explode('\\', static::class);

        return "{$classParts[count($classParts) - 1]} stats \n
                Name: {$this->name} \n
                Health: {$this->health} \n
                Speed: {$this->speed} \n
                Strenght: {$this->strenght} \n
                Defence: {$this->defence} \n
                Luck: {$this->luck} \n\n";
    }
}