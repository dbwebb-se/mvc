<?php

namespace Grm\Dice21;

use PHPUnit\Framework\TestCase;

class Dice21Test extends TestCase
{
    public function testCreate()
    {
        $game = new Dice21();
        $this->assertInstanceOf("\Grm\Dice21\Dice21", $game);
        $player = new Player();
        $this->assertInstanceOf("\Grm\Dice21\Player", $player);
        $name = $game->getPlayer()->getName();
        $this->assertEquals("Player 1", $name);
    }

}