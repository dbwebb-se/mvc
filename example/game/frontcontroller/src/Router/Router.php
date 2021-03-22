<?php

declare(strict_types=1);

namespace Mos\Router;

/**
 * Class Router.
 */
class Router
{
    public static function dispatch(string $method, string $path): void
    {
        if ($method === "GET" && $path === "/") {
            // /  slash, being the index page
            $data = [
                "header" => "Index page",
                "message" => "Hello, this is the index page, rendered as a layout.",
            ];
            $body = \Mos\renderView("layout/page.php", $data);
            \Mos\sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session") {
            // /session
            $body = \Mos\renderView("layout/session.php");
            \Mos\sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session/destroy") {
            // /session/destroy
            \Mos\destroySession();
            \Mos\redirectTo(\Mos\url("/session"));
            return;
        } else if ($method === "GET" && $path === "/debug") {
            // /debug
            $body = \Mos\renderView("layout/debug.php");
            \Mos\sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/some/where") {
            // /  slash, being the index page
            $data = [
                "header" => "Rainbow page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = \Mos\renderView("layout/page.php", $data);
            \Mos\sendResponse($body);
            return;
        }

        // 404
        $data = [
            "header" => "404",
            "message" => "The page you are requesting is not here. You may also checkout the HTTP response code, it should be 404.",
        ];
        $body = \Mos\renderView("layout/page.php", $data);
        \Mos\sendResponse($body, 404);
    }
}
