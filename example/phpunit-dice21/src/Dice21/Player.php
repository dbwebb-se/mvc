<?php

namespace Grm\Dice21;

class Player
{
    private string $name;

    public function __construct(string $name = "")
    {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}