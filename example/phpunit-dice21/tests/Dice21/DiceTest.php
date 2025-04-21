<?php

namespace Grm\Dice21;

use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase
{
    public function testCreate()
    {
        $die = new Dice();
        $this->assertInstanceOf("\Grm\Dice21\Dice", $die);
        $this->assertNotEmpty($die->getValue());
        $this->assertLessThanOrEqual(6, $die->getValue());
        $this->assertGreaterThanOrEqual(1, $die->getValue());
    }

    public function testValueAsString()
    {
        $die = new Dice();
        $this->assertIsString($die->getAsString());
    }

    public function testRollAndReturn()
    {
        $die = new Dice();
        $this->assertLessThanOrEqual(6, $die->getValue());
        $this->assertGreaterThanOrEqual(1, $die->getValue());
        $die->rollAndReturn();
        $this->assertLessThanOrEqual(6, $die->getValue());
        $this->assertGreaterThanOrEqual(1, $die->getValue());
    }
}