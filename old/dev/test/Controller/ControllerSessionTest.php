<?php

declare(strict_types=1);

namespace Mos\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Session.
 */
class ControllerSessionTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new Session();
        $this->assertInstanceOf("\Mos\Controller\Session", $controller);
    }

    /**
     * Check that the controller returns a response.
     * @runInSeparateProcess
     */
    public function testControllerReturnsResponse()
    {
        session_start();
        $controller = new Session();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->index();
        $this->assertInstanceOf($exp, $res);
    }



    /**
     * Destroy the session.
     * @runInSeparateProcess
     */
    public function testDestroySession()
    {
        session_start();
        $controller = new Session();

        $_SESSION = [
            "key" => "value"
        ];

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->destroy();
        $this->assertInstanceOf($exp, $res);
        $this->assertEmpty($_SESSION);
    }
}
