<?php

/**
 * Bootstrap the framework and handle the request and send the response.
 */

declare(strict_types=1);



/**
 * Bootstrapping
 *
 * Start with bootstrapping and starting up the essentials.
 */
// Get a defined to point at the installation directory
define("INSTALL_PATH", realpath(__DIR__ . "/.."));

// Load the inital configuration
require INSTALL_PATH . "/config/bootstrap.php";

// Get the autoloader
require INSTALL_PATH . "/vendor/autoload.php";



/**
 * Router
 *
 * Extract the path and route it to its handler.
 */
$method = $_SERVER["REQUEST_METHOD"];
$path   = Mos\getRoutePath();

Mos\Router\Router::dispatch($method, $path);
