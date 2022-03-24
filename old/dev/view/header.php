<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

use function Mos\Functions\url;

?><!doctype html>
<html>
    <meta charset="utf-8">
    <title><?= $title ?? "No title" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url("/favicon.ico") ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/css/style.css") ?>">
</head>

<body>

<header>
    <nav>
        <a href="<?= url("/") ?>">Home</a> |
        <a href="<?= url("/session") ?>">Session</a> |
        <a href="<?= url("/debug") ?>">Debug</a> |
        <a href="<?= url("/twig") ?>">Twig view</a> |
        <a href="<?= url("/some/where") ?>">some/where</a>
        <br>
        Form:
        <a href="<?= url("/form/view") ?>">Post with processing page and session</a>
        <br>
        Error:
        <a href="<?= url("/error/304") ?>">304</a> |
        <a href="<?= url("/error/404") ?>">404</a> |
        <a href="<?= url("/no/such/path") ?>">404</a> |
        <a href="<?= url("/no-get-access") ?>">405</a> |
        <a href="<?= url("/error/500") ?>">500</a> |
    </nav>
</header>
<main>
