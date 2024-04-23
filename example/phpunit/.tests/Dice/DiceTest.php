<?php

namespace Mos\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceTest extends TestCase
{
    /**
     * Construct object and verify it it a Dice object.
     */
    public function testCreateObject()
    {
        $die = new Dice();
        $this->assertInstanceOf("\Mos\Dice\Dice", $die);

        $res = $die->getValue();
        $exp = null;
        $this->assertEquals($exp, $res);
    }

    /**
     * Roll the dice and assert value is within bounds.
     */
    public function testRollDice()
    {
        $die = new Dice();
        $res = $die->roll();
        $this->assertIsInt($res);

        $res = $die->getValue();
        $this->assertTrue($res >= 1);
        $this->assertTrue($res <= 6);
    }
}
