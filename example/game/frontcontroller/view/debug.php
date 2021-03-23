<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

echo "<h1>Debug details</h1>";

var_dump(Mos\getBaseUrl());
var_dump(Mos\getCurrentUrl());
var_dump(Mos\getRoutePath());
var_dump($_SERVER);
