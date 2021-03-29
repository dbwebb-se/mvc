<?php

declare(strict_types=1);

namespace Mos\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\{
    destroySession,
    renderView,
    url
};

/**
 * Controller for the session routes.
 */
class Session
{
    public function index(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = renderView("layout/session.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }



    public function destroy(): ResponseInterface
    {
        destroySession();

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/session"));
    }
}
