<?php

declare(strict_types=1);

namespace Mos\Controller;

use Nyholm\Psr7\Response;
use Nyholm\Psr7\Stream;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderView;

/**
 * Controller for the debug route.
 */
class Debug
{
    public function __invoke(): ResponseInterface
    {
        $body = renderView("layout/debug.php");

        return (new Response())
            ->withStatus(200)
            ->withBody(Stream::create($body));
    }
}
