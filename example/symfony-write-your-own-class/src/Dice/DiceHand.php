<?php

namespace App\Dice;

use App\Dice\Dice;

class DiceHand
{
    private $hand = [];

    public function add(Dice $die): void
    {
        $this->hand[] = $die;
    }

    public function roll(): void
    {
        foreach ($this->hand as $die) {
            $die->roll();
        }
    }

    public function getNumberDices(): int
    {
        return count($this->hand);
    }

    public function getAsString(): string
    {
        $str = "";
        foreach ($this->hand as $die) {
            $str .= $die->getAsString();
        }
        return $str;
    }
}
