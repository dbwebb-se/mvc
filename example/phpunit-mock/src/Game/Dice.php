<?php

namespace App\Game;

/**
 * A Dice class.
 */
class Dice
{
    /**
     * @var int $value The last rolled value.
     */
    private $value;

    /**
     * Roll the dice.
     *
     * @return int as value rolled.
     */
    public function roll(): int
    {
        return $this->value = rand(1, 6);
    }

    /**
     * Get last roll.
     *
     * @return int as value rolled.
     */
    public function lastRoll(): int
    {
        return $this->value;
    }
}
