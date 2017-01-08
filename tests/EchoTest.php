<?php

namespace AsyncPHP\Process\Tests;

use AsyncPHP\Process\PosixHandler;
use PHPUnit_Framework_TestCase;

class EchoTest extends PHPUnit_Framework_TestCase
{
    public function testEcho()
    {
        $echo = new PosixHandler();

        ob_start();
        $echo->start("echo", "whoami");
        $name = trim(ob_get_contents());
        ob_end_clean();

        $this->assertEquals(trim(`whoami`), $name);
        $this->assertFalse($echo->running("echo"));
    }
}
