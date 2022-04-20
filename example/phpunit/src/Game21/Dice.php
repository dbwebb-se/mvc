<?php

namespace Grm\Game21;
use Grm\Game21\DiceException;

/**
 * Class Dice, a class that represents a dice with
 * using a namespace
 */
class Dice
{
    /**
     * @var int  $sides     The number of sides on the dice.
     * @var int  $lastRoll  The last rolled number of the dice.
     */
    private $sides;
    private $lastRoll;

    /**
     * Constructor to create an object of Dice. And rolls its first value.
     *
     * @param 6|int    $sides  The number of sides of the dice. Default = 6.
     */
    public function __construct(int $sides = 6)
    {
        if ($sides < 1) {
            throw new DiceException("The dice must have 1 or more sides.");
        } elseif ($sides > 6) {
            throw new DiceException("The dice must have 6 or less sides.");
        } else {
            $this->sides = $sides;
        }
        self::roll();
    }

    /**
     * Destroy an object of Dice.
     */
    public function __destruct()
    {
        // echo __METHOD__;
    }

    /**
     * Roll the Dice and return the value.
     *
     * @return void
     */
    public function roll()
    {
        $this->lastRoll = mt_rand(1, $this->sides);
    }

    /**
     * Return the value of the last roll, lastRoll.
     *
     * @return int as the value from the last roll.
     */
    public function getLastRoll()
    {
        return $this->lastRoll;
    }
}

// Examples of prototyping - TODO should be removed in production code. 
// srand(12345);  // To seed random number for shuffle
// $dice = new Dice();
// echo "Last roll: " . $dice->getLastRoll() . "\n";
// $dice->roll();
// echo "Last roll: " . $dice->getLastRoll() . "\n";
// $dice->roll();
// echo "Last roll: " . $dice->getLastRoll() . "\n";
