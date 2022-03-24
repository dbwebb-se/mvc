<?php

declare(strict_types=1);

namespace Mos\Module\Router;

use FastRoute\Dispatcher as Router;
use Mos\Controller\Error;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Dispatch a matched route to its handler and return a response.
 */
class RouteDispatcher implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $routeInfo = $request->getAttribute("ROUTE_INFO");
        switch ($routeInfo[0]) {
            case Router::NOT_FOUND:
                return (new Error())->do404();
                break;

            case Router::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                return (new Error())->do405($allowedMethods);
                break;

            case Router::FOUND:
                try {
                    $handler = $routeInfo[1];
                    $args = $routeInfo[2];
                    return $this->callHandler($handler, $args);
                } catch (Exception\ForbiddenException $e) {
                    return (new Error())->do304();
                } catch (Exception\NotFoundException $e) {
                    return (new Error())->do404();
                } catch (Exception\InternalErrorException $e) {
                    return (new Error())->do500();
                }
                break;
        }
    }

    private function callHandler($handler, array $args): ResponseInterface
    {
        if (is_array($handler)
            && is_string($handler[0])
            && class_exists($handler[0])
            && method_exists($handler[0], $handler[1])
        ) {
            return (new $handler[0]())->{$handler[1]}(...array_values($args));
        } else if (is_callable($handler)) {
            return call_user_func_array($handler, $args);
        } else if (is_string($handler) && class_exists($handler)) {
            $rc = new \ReflectionClass($handler);
            if ($rc->hasMethod("__invoke")) {
                return (new $handler)(...array_values($args));
            }
        }

        throw new Exception\ConfigurationException("The callhandler was not identified as a callable.");
    }
}
