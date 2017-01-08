<?php

require __DIR__ . "/../vendor/autoload.php";

$echoHandler = new AsyncPHP\Process\PosixHandler();
$echoHandler->start("whoami", "whoami");

$loopHandler = new AsyncPHP\Process\PosixHandler();

$loopHandler->start("loop", "php -r 'while (true) { print \".\"; sleep(1); }' > /dev/null &");
$loopHandler->running("loop");

sleep(1);

print "loop process running: " . ($loopHandler->running("loop") ? "yes" : "no") . PHP_EOL;

sleep(1);

$loopHandler->stop("loop");

sleep(1);

print "loop process running: " . ($loopHandler->running("loop") ? "yes" : "no") . PHP_EOL;
