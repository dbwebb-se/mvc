<?php

namespace Grm\Game21;
use Grm\Game21\Player;

/**
 * A class for dice game 21.
 */
class Game21 implements Game21Interface
{
    /**
     * @var int GOAL        The goal to reach first to win. Default 21.
     * @var Player $player  The player.
     * @var Player $dealer  The dealer.
     */
    private const GOAL = 21;
    private $player;
    private $dealer;

    /**
     * Constructor to initiate the dicehand with a number of dices.
     */
    public function __construct()
    {
        $this->dealer  =  new Player("Dealer");
        $this->player  =  new Player("Player");
    }


    /**
     * Play the game and get the winner.
     *
     * @return string with the result.
     */
    public function play()
    {
        $result = "";

        $this->playPlayer();

        $this->playDealer();

        $result = $this->win();
        // echo "\n\n" . $this->player->getName() . " has " . $this->player->getScore() . " points. \n";
        // echo $this->dealer->getName() . " has " . $this->dealer->getScore() . " points. \n\n";
        // echo $result . " \n\n";

        return $result;
    }

    /**
     * Play the game for the player and update the player's
     * score.
     *
     * @return void
    */
    private function playPlayer()
    {
      $round = 0;
      $answer = $this->player->getScore();
      while (($answer + $round) < 18) {
          $this->player->setScore($answer + $round);
          // echo $this->player->getName() . " has " . $this->player->getScore() . " points. \n";
          $round = $this->player->rollDices();
          $answer = $this->player->getScore();
      }
      if (($answer + $round) <= self::GOAL) {
          $this->player->setScore($answer + $round);
      }
    }

    /**
     * Play the game for the dealer and update the dealer's
     * score.
     *
     * @return void
    */
    private function playDealer()
    {
      $round = 0;
      $answer = $this->dealer->getScore();
      while (($answer + $round) < 18) {
          $this->dealer->setScore($answer + $round);
          // echo $this->dealer->getName() . " has " . $this->dealer->getScore() . " points. \n";
          $round = $this->dealer->rollDices();
          $answer = $this->dealer->getScore();
      }
      if (($answer + $round) <= self::GOAL) {
          $this->dealer->setScore($answer + $round);
      }
    }

    /**
     * Desides if the player has enough score to win.
     *
     * @return string with the reuslt.
     */
    private function win()
    {
        $result = "The winner is " . $this->dealer->getName() . "!\n";
        if ($this->player->getScore() > $this->dealer->getScore()) {
            $result = "The winner is " . $this->player->getName() . "!\n";;
        }
        $result = "Result: " . $result;

        return $result;
    }
}
