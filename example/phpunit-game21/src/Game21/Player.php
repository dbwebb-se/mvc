<?php

namespace Grm\Game21;
use Grm\Game21\Dice;

/**
 * A class for a player used in dice game 21.
 *
 */
class Player
{
    /**
     * @var string  $name The name of the player.
     * @var array $dices  The 3 dices.
     * @var int  $score   The score of the player.
     */
    private $name;
    private $dices;
    private $score;

    /**
     * Constructor to initiate the dices with a number of dices.
     *
     * @param string $name The name of the player, default = "".
     * @param int $noOfDices  The number of players to create, default = 3.
*/
    public function __construct(string $name = "", int $noOfDices = 3)
    {
        $this->name = $name;
        $this->dices = [];
        for ($i = 0; $i < $noOfDices; $i++) {
            $this->dices[$i]  = new Dice();
        }
        $this->score = 0;
    }

    /**
     * Get the name of the player.
     *
     * @return string as the name of the player.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the score of the player.
     *
     * @return int as the score of the player.
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the score of the player.
     *
     * @param int $score The score of the player.
     *
     * @return void.
     */
    public function setScore(int $score)
    {
        $this->score = $score;
    }

    /**
     * Get the number of dices in a dices.
     *
     * @return string as the name of the player.
     */
    public function getNoOfDices()
    {
        return count($this->dices);
    }

    /**
     * Roll the dices of the player and return the score of the
     * rolled dices.
     *
     * @return int with dices with the last roll.
     */
    public function rollDices()
    {
        $sum = 0;
        $noOfDices = count($this->dices);
        for ($i = 0; $i < $noOfDices; $i++) {
            $this->dices[$i]->roll();
            $sum += $this->dices[$i]->getLastRoll();
        }

        return $sum;
    }
}
