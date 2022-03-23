<?php

declare(strict_types=1);

namespace Mos\Controller;

use Psr\Http\Message\ResponseInterface;

/**
 * Show how one can through exceptions to result in a error page with
 * a http status code.
 */
class SimulateError extends ControllerBase
{
    use ControllerTrait;

    public function handle(string $status): ResponseInterface
    {
        switch ($status) {
            case 304:
                throw new \Mos\Framework\Router\Exception\ForbiddenException(
                    "It is not allowed to acces this page."
                );
            break;
            case 404:
                throw new \Mos\Framework\Router\Exception\NotFoundException(
                    "The page is not here."
                );
            break;
            case 500:
                throw new \Mos\Framework\Router\Exception\InternalErrorException(
                    "Internal error."
                );
            break;
        }
    }

    public function noGetAccess(): ResponseInterface
    {
        return $this->response(renderView("layout/page.php", [
            "header" => "No GET access page",
            "message" => "This path is only accessable by POST, PUT, PATCH or DELETE.",
        ]));
    }
}
