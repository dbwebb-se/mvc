<?php

declare(strict_types=1);

namespace Mos\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Form.
 */
class ControllerFormTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new Form();
        $this->assertInstanceOf("\Mos\Controller\Form", $controller);
    }

    /**
     * Check the controller action.
     * @runInSeparateProcess
     */
    public function testControllerViewAction()
    {
        $controller = new Form();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->view();
        $this->assertInstanceOf($exp, $res);
    }



    /**
    * Check the controller action.
     * @runInSeparateProcess
     */
    public function testControllerProcessAction()
    {
        $controller = new Form();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->process();
        $this->assertInstanceOf($exp, $res);
    }
}
