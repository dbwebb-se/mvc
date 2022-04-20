<?php

namespace Grm\Game21;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Game21.
 */
class Game21Test extends TestCase
{
    /**
     * Construct object and verify that the object is of expected instance.
     * Use no arguments.
     */
    public function testCreate()
    {
        $game = new Game21();
        $this->assertInstanceOf("\Grm\Game21\Game21", $game);
    }

    /**
     * Construct object, plays the game and dealer wins.
     */
    public function testPlayDealerWins()
    {
        $game = new Game21();
        $res = $game->play();
        $this->assertStringContainsString("Dealer", $res);
    }

    /**
     * Construct object, plays the game and player wins.
     */
    public function testPlayPlayerWins()
    {
        $game = new Game21();
        $res = $game->play();
        $this->assertStringContainsString("Player", $res);
    }
}
