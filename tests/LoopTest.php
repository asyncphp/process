<?php

namespace AsyncPHP\Process\Tests;

use AsyncPHP\Process\PosixHandler;
use PHPUnit_Framework_TestCase;

class LoopTest extends PHPUnit_Framework_TestCase
{
    public function testLoop()
    {
        $loop = new PosixHandler();
        $loop->start("loop", "php -r 'while (true) { sleep(1); }'", true);

        $this->assertTrue($loop->running("loop"));

        $loop->stop("loop");

        $this->assertFalse($loop->running("loop"));
    }
}
