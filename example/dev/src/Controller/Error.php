<?php

declare(strict_types=1);

namespace Mos\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderView;

/**
 * Controller for error routes.
 */
class Error
{
    use ControllerTrait;

    public function do304(): ResponseInterface
    {
        $body = renderView("layout/page.php", [
            "header" => "304",
            "message" => "Forbidden to access.",
        ]);
        return $this->response($body, 304);
    }

    public function do404(): ResponseInterface
    {
        $body = renderView("layout/page.php", [
            "header" => "404",
            "message" => "The page you are requesting is not here.",
        ]);
        return $this->response($body, 404);
    }

    public function do405(array $allowedMethods): ResponseInterface
    {
        $body = renderView("layout/page.php", [
            "header" => "405",
            "message" => "Allowed methods are: " . implode(", ", $allowedMethods),
        ]);
        return $this->response($body, 405);
    }

    public function do500(): ResponseInterface
    {
        $body = renderView("layout/page.php", [
            "header" => "500",
            "message" => "Internal error.",
        ]);
        return $this->response($body, 500);
    }
}
