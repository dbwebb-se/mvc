<?php

/**
 * Bootstrap the framework and handle the request and send the response.
 */

declare(strict_types=1);

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter as Emitter;
use function Mos\Functions\getRoutePath;
use Mos\Controller\Error;
use Psr\Http\Message\ResponseInterface;

/**
 * Bootstrapping
 *
 * Start with bootstrapping and starting up the essentials.
 */
// Get a defined to point at the installation directory
define("INSTALL_PATH", realpath(__DIR__ . "/.."));

// Get the autoloader
require INSTALL_PATH . "/vendor/autoload.php";

// Load the inital configuration
require INSTALL_PATH . "/config/bootstrap.php";



/**
 * Router
 *
 * Extract the path and route it to its handler.
 */
$method = $_SERVER["REQUEST_METHOD"];
$path   = getRoutePath();

// Load the routes from the configuration file
$router = null;
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {
    require INSTALL_PATH . "/config/router.php";
});

// Use the router to find the callback for the route path and retrieve
// the response.
$response = null;
$routeInfo = $dispatcher->dispatch($method, $path);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $response = (new Error())->do404();
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        $response = (new Error())->do405($allowedMethods);
        break;

    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        if (is_callable($handler)) {
            if (is_array($handler)
                && is_string($handler[0])
                && class_exists($handler[0])
            ) {
                $obj = new $handler[0]();
                $action = $handler[1];
                $response = $obj->$action();
            } else {
                $response = call_user_func_array($handler, $vars);
            }
        } else if (is_string($handler) && class_exists($handler)) {
            $rc = new \ReflectionClass($handler);
            if ($rc->hasMethod("__invoke")) {
                $obj = new $handler;
                $response = $obj();
            }
        }
        break;
}

// Send the reponse
if (is_null($response)) {
    echo "The response object is null.";
} else if (is_string($response)) {
    echo $response;
} else {
    (new Emitter())->emit($response);
}
