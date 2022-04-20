<?php

namespace Grm\Game21;

/**
 * A interface for dice game 21.
 */
interface Game21Interface
{
    /**
     * Play the game and get the winner.
     *
     * @return string with the result.
     */
    public function play();
}
