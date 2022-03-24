<?php

/**
 * The frontcontroller bootstraps the framework and performs a lifecycle of
 * receiveing and populating the request, mapping the request to the
 * middleware(s) and the router(s), letting the supposed middleware- or
 * router-handler create a response and sending it to the caller.
 */

declare(strict_types=1);

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter as Emitter;
use Mos\Module\Router\RouteDispatcher;
use Mos\Module\Router\Router;

use function Mos\Functions\{
    getRoutePath,
    getBaseUrl,
    getCurrentUrl
};



/** --------------------------------------------------------------------------
 * Bootstrapping and starting up the essentials.
 */

/**
 * Get a define to point at the installation directory of the framework, this
 * defaults to the parent directory but can be any directory to allow to
 * separate the installation directory from the public web directory.
 */
define('INSTALL_PATH', realpath(__DIR__ . '/..'));

/**
 * Get the autoloader, defaults to the one generated from composer.
 */
require INSTALL_PATH . '/vendor/autoload.php';

// Load .env and make part of the Request?

// Load the inital configuration
// Defer this to later?
require INSTALL_PATH . '/config/bootstrap.php';



/**
 * Service container.
 */
// Get a small di class
// Add utility functions and Class:: for ease of use
// Perhaps do this after the request is created?



/**
 * Create the ServerRequest object from the PHP globals and populate it
 * with attributes.
 */
$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();
$request = $request->withAttribute(
    "HTTP_METHOD",
    $request->getServerParams()["REQUEST_METHOD"]
);
$request = $request->withAttribute(
    "ROUTE_PATH",
    getRoutePath()
);
$request = $request->withAttribute(
    "CURRENT_URL",
    getCurrentUrl()
);
$request = $request->withAttribute(
    "BASE_URL",
    getBaseUrl()
);
//var_dump($request->getAttributes());

// Check if all the above is needed or can be replaced with $allowedMethodsfrom // the URI class

// Add to di

// Add session to request
// Add sample class for the session
// Is there an external session class we can use?



/**
 * Try to match the path to a handler, through the router, and attach
 * the matched route to the serverRequest object.
 */
$router = new Router();
$router->loadConfigurationFromFile(INSTALL_PATH . "/config/router.php");
$request = $request->withAttribute(
    "ROUTE_INFO",
    $router->route($request)
);
//var_dump($request->getAttributes());

// Replace with a middleware look and feel
// Make more PSR-15 naming



/**
 * Take the ROUTE_INFO and use it to dispatch the route to its handler which
 * should return a response.
 */
$routeDispatcher = new RouteDispatcher();
$response = $routeDispatcher->handle($request);
// var_dump($request->getAttributes());
// var_dump($response);

// Make more PSR-15 naming



/**
 * Send the response.
 */
(new Emitter())->emit($response);
