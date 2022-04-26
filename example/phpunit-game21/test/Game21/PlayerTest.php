<?php

namespace Grm\Game21;
use Grm\Game21\Player;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Player.
 */
class PlayerTest extends TestCase
{
    /**
     * Construct object and verify that the object is of expected instance.
     * Use no arguments.
     */
    public function testCreateWithNoArguments()
    {
        $player = new Player();
        $this->assertInstanceOf("\Grm\Game21\Player", $player);
    }

    /**
     * Construct object and verify that the object is of expected instance.
     * Use "Dealer".
     */
    public function testCreateDealer()
    {
        $player = new Player("Dealer");
        $this->assertEquals("Dealer", $player->getName());
        $this->assertEquals(3, $player->getNoOfDices());
        $this->assertEquals(0, $player->getScore());
    }

    /**
     * Construct object and verify that the object is of expected instance.
     * Use "Player".
     */
    public function testCreatePlayer()
    {
        $player = new Player("Player");
        $this->assertEquals("Player", $player->getName());
        $this->assertEquals(3, $player->getNoOfDices());
        $this->assertEquals(0, $player->getScore());
    }

    /**
     * Construct object and verify that the object is of expected instance.
     * Use "Player".
     */
    public function testCreatePlayerRollAndCheckScore()
    {
        srand(12345);  // To seed random number for shuffle
        $player = new Player("Player");
        $this->assertEquals(0, $player->getScore());
        $score = $player->rollDices();
        $player->setScore($score);
        $this->assertEquals($score, $player->getScore());
    }
}
