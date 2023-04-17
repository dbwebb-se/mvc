<?php

namespace Grm\Dice21;

class Dice
{
    protected int $value;

    public function __construct()
    {
        $this->value = random_int(1, 6);
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function rollAndReturn(): int
    {
        $this->value = random_int(1, 6);

        return $this->value;
    }

    public function getAsString(): string
    {
        return "[{$this->value}]";
    }
}
