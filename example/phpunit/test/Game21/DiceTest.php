<?php

namespace Grm\Game21;
use Grm\Game21\DiceTDD;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceTDD.
 */
class DiceTest extends TestCase
{
    /**
     * Construct object and verify that the object is of expected instance.
     * Use no arguments.
     */
    public function testCreate()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Grm\Game21\Dice", $dice);
    }

    /**
     * Construct object and verify that a DiceException is thrown.
     * Use a faulty argument that is too low.
     */
    public function testCreateWithFaultyArgument()
    {
        $this->expectException(DiceException::class);
        new Dice(-1);
    }

    /**
     * Construct object and verify that a DiceException is thrown.
     * Use a faulty argument that is too high.
     */
    public function testCreateWithFaultyArgumentHigh()
    {
        $this->expectException(DiceException::class);
        new Dice(10);
    }

    /**
     * Construct object, roll the dice and check the value of the dice.
     * Use no arguments.
     */
    public function testRollAndCheckValue()
    {
        srand(12345);  // To seed random number for shuffle
        $dice = new Dice();
        $res = $dice->getLastRoll();
        $this->assertEquals(1, $res);
    }

    /**
     * Construct object, roll the dice again and check the value.
     * Use no arguments.
     */
    public function testRollTwiceAndCheckValue()
    {
        srand(12345);  // To seed random number for shuffle
        $dice = new Dice();
        $dice->roll();
        $res = $dice->getLastRoll();
        $this->assertEquals(4, $res);
    }
}
