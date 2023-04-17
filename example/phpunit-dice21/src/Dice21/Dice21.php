<?php

namespace Grm\Dice21;

class Dice21
{
    private $player;

    public function __construct()
    {
        $this->player = new Player("Player 1");
    }

    public function getPlayer() 
    {
        return $this->player;
    }
}