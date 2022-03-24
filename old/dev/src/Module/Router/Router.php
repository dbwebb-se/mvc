<?php

declare(strict_types=1);

namespace Mos\Module\Router;

use FastRoute\RouteCollector;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Read router configuration and route a request to find its handler.
 */
class Router
{
    private $router;

    public function loadConfigurationFromFile(string $file): void
    {
        if (!is_readable($file)) {
            throw new ConfigurationExeption(
                "The configuration file '$file' is not readable."
            );
        }

        $this->router = \FastRoute\simpleDispatcher(
            function(RouteCollector $router) use($file) {
                try {
                    $res = require $file;
                } catch(\Exception $e) {
                    throw new ConfigurationExeption(
                        "Error in configuration file '$file'. "
                        . $e.getMessage()
                    );
                }
            }
        );
    }

    public function route(ServerRequestInterface $request): array
    {
        return $this->router->dispatch(
            $request->getAttribute("HTTP_METHOD"),
            $request->getAttribute("ROUTE_PATH")
        );
    }
}
