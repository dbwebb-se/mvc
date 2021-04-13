<?php

declare(strict_types=1);

namespace Mos\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Index.
 */
class ControllerIndexTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new Index();
        $this->assertInstanceOf("\Mos\Controller\Index", $controller);
    }

    /**
     * Check that the controller returns a response.
     */
    public function testControllerReturnsResponse()
    {
        $controller = new Index();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
