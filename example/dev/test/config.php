<?php

/**
 * Bootstrap for the test runner.
 */

// Get a defined to point at the installation directory
define("INSTALL_PATH", realpath(__DIR__ . "/.."));

// Get the autoloader
require INSTALL_PATH . "/vendor/autoload.php";

// Include test helpers and mocks
foreach (glob(__DIR__ . "/Mock/*.php") as $file) {
    require $file;
}
