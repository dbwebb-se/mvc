<?php

namespace App\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class.
 */
class DiceTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties.
     */
    public function testCreateObject()
    {
        $dice = new Dice();
        $this->assertInstanceOf(Dice::class, $dice);
    }

    /**
     * Roll dice and check the value is in range.
     */
    public function testRollDiceValueInRange()
    {
        $dice = new Dice();
        $res = $dice->roll();
        $this->assertGreaterThanOrEqual(1, $res);
        $this->assertLessThanOrEqual(6, $res);
    }

    /**
     * Roll dice and check the value is same as lastRoll.
     */
    public function testRollDiceLastRoll()
    {
        $dice = new Dice();
        $exp = $dice->roll();
        $res = $dice->lastRoll();
        $this->assertEquals($exp, $res);
    }

    /**
     * Create a mocked object that always returns 6.
     */
    public function testStubRollDiceLastRoll()
    {
        // Create a stub for the Dice class.
        $stub = $this->createMock(Dice::class);

        // Configure the stub.
        $stub->method('roll')
            ->willReturn(6);

        $exp = 6;
        $res = $stub->roll();
        $this->assertEquals($exp, $res);
    }
}
