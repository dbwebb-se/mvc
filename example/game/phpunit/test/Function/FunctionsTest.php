<?php

declare(strict_types=1);

namespace Mos\Functions;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for the functions in src/functions.php.
 */
class FunctionsTest extends TestCase
{
    /**
     * Test the function getRoutePath().
     */
    public function testGetRoutePath()
    {
        $res = getRoutePath();
        $this->assertEmpty($res);
    }



    /**
     * Test the function renderView().
     */
    public function testRenderView()
    {
        $res = renderView("standard.php");
        $this->assertIsString($res);
    }



    /**
     * Test the function renderView().
     */
    public function testRenderTwigView()
    {
        $res = renderTwigView("index.html");
        $this->assertIsString($res);
    }



    /**
     * Test the function url().
     */
    public function testUrl()
    {
        $res = url("/");
        $this->assertIsString($res);
    }



    /**
     * Test the function getBaseUrl().
     */
    public function testGetBaseUrl()
    {
        $res = getBaseUrl();
        $this->assertIsString($res);
    }



    /**
     * Test the function getCurrentUrl().
     */
    public function testGetCurrentUrl()
    {
        $res = getCurrentUrl();
        $this->assertIsString($res);
    }



    /**
     * Test the function destroySession().
     * @runInSeparateProcess
     */
    public function testDestroySession()
    {
        session_start();

        $_SESSION = [
            "key" => "value"
        ];

        destroySession();
        $this->assertEmpty($_SESSION);
    }
}
