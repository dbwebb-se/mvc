<?php

namespace App\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class.
 */
class DiceHandTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties.
     */
    public function testCreateObject()
    {
        $dicehand = new DiceHand();
        $this->assertInstanceOf(DiceHand::class, $dicehand);
    }

    /**
     * Roll dicehand and check the value is in range.
     */
    public function testAddDices()
    {
        $dicehand = new DiceHand();
        $dicehand->addDice(new Dice());
        $dicehand->addDice(new Dice());
        $dicehand->roll();
        $res = $dicehand->sum();
        $this->assertGreaterThanOrEqual(2, $res);
        $this->assertLessThanOrEqual(12, $res);
    }

    /**
     * Stub the dices to assure the value can be asserted.
     */
    public function testAddStubbedDices()
    {
        // Create a stub for the Dice class.
        $stub = $this->createMock(Dice::class);

        // Configure the stub.
        $stub->method('roll')
            ->willReturn(6);
        $stub->method('lastRoll')
            ->willReturn(6);

        $dicehand = new DiceHand();
        $dicehand->addDice(clone $stub);
        $dicehand->addDice(clone $stub);
        $dicehand->roll();
        $res = $dicehand->sum();
        $this->assertEquals(12, $res);
    }
}
