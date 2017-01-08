# Process

[![Build Status](https://travis-ci.org/asyncphp/process.svg?branch=master)](https://travis-ci.org/asyncphp/process)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/asyncphp/process/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/asyncphp/process/?branch=master)

Simple abstraction for starting and stopping processes.

## Installation

```
composer require asyncphp/process
```

## Usage

```php
use AsyncPHP\Process\PosixHandler;

$loop->start($id = "server", $command = "start-server.sh", $background = true);
sleep(60);
$loop->stop($id);
```

## Compatibility

This library uses `exec` and `ps` to start and find processes. It will not work on systems where `exec` has been disabled, or where `ps -e/E` does not return the environment variables of a process. I've tested on macOS Sierra and Ubuntu Trusty `14.04`.

## Versioning

This library follows [Semver](http://semver.org). According to Semver, you will be able to upgrade to any minor or patch version of this library without any breaking changes to the public API. Semver also requires that we clearly define the public API for this library.

All methods, with `public` visibility, are part of the public API. All other methods are not part of the public API. Where possible, we'll try to keep `protected` methods backwards-compatible in minor/patch versions, but if you're overriding methods then please test your work before upgrading.
