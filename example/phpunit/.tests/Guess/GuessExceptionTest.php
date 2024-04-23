<?php

namespace Mos\Guess;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class GuessExceptionTest extends TestCase
{
    /**
     * Verify GuessException when guess is to high.
     */
    public function testGuessToHigh()
    {
        $guess = new Guess();

        $this->expectException(GuessException::class);
        $guess->makeGuess(101);
    }

    /**
     * Verify GuessException when guess is to low.
     */
    public function testGuessToLow()
    {
        $guess = new Guess();

        $this->expectException(GuessException::class);
        $guess->makeGuess(0);
    }
}
