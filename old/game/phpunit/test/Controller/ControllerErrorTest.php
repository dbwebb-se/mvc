<?php

declare(strict_types=1);

namespace Mos\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Error.
 */
class ControllerErrorTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new Error();
        $this->assertInstanceOf("\Mos\Controller\Error", $controller);
    }

    /**
     * Check the controller action.
     * @runInSeparateProcess
     */
    public function testController404Action()
    {
        $controller = new Error();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->do404();
        $this->assertInstanceOf($exp, $res);
    }



    /**
    * Check the controller action.
     * @runInSeparateProcess
     */
    public function testController405Action()
    {
        $controller = new Error();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->do405([]);
        $this->assertInstanceOf($exp, $res);
    }
}
