# Process

Simple abstraction for starting and stopping processes.

## Install

```
composer require asyncphp/process
```

## Use

```php
use AsyncPHP\Process\PosixHandler;

$loop->start($id = "server", $command = "start-server.sh", $background = true);
sleep(60);
$loop->stop($id);
```

## Versioning

This library follows [Semver](http://semver.org). According to Semver, you will be able to upgrade to any minor or patch version of this library without any breaking changes to the public API. Semver also requires that we clearly define the public API for this library.

All methods, with `public` visibility, are part of the public API. All other methods are not part of the public API. Where possible, we'll try to keep `protected` methods backwards-compatible in minor/patch versions, but if you're overriding methods then please test your work before upgrading.
