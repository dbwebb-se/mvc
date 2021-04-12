<?php

namespace Mos\Guess;

require __DIR__ . "/../config/config.php";
require __DIR__ . "/../vendor/autoload.php";

// For the view
$title = "Guess my number (GET)";

// Get incoming
$number = $_GET["number"] ?? -1;
$tries  = $_GET["tries"]  ?? 6;
$guess  = $_GET["guess"]  ?? null;

// Start up the game
$game = new Guess($number, $tries);

// Reset the game
if (isset($_GET["reset"])) {
    $game->random();
}

// Do a guess
$res = null;
if (isset($_GET["doGuess"])) {
    $res = $game->makeGuess($guess);
}

// Render the view, through the template file
require __DIR__ . "/../view/guess/get.php";
