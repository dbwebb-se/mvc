<?php

namespace Grm\Dice21;

use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testCreate()
    {
        $player = new Player("Player 1");
        $this->assertInstanceOf("\Grm\Dice21\Player", $player);
        $this->assertEquals("Player 1", $player->getName());
        $this->assertEquals([], $player->getDice());
        $this->assertEquals(0, $player->getScore());
    }

}