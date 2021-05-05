<?php

namespace App\Game;

/**
 * A DiceHand using Dices.
 */
class DiceHand
{
    /**
     * @var array $dices The dices holded by the hand.
     */
    private $dices;

    /**
     * Add dice to the dicehand.
     *
     * @param Dice $dice to add to the dicehand.
     *
     * @return int as the sum of all dices rolled.
     */
    public function addDice(Dice $aDice): void
    {
        $this->dices[] = $aDice;
    }

    /**
     * Roll all dices in the dicehand.
     *
     * @return void.
     */
    public function roll(): void
    {
        foreach ($this->dices as $dice) {
            $dice->roll();
        }
    }

    /**
     * Get the sum of last roll.
     *
     * @return int as the sum of all dices rolled.
     */
    public function sum(): int
    {
        $sum = 0;
        foreach ($this->dices as $dice) {
            $sum += $dice->lastRoll();
        }

        return $sum;
    }
}
