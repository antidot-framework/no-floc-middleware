# Antidot NO FLoC Middleware

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/antidot-framework/no-floc-middleware/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/antidot-framework/no-floc-middleware/?branch=1.x.x)
[![Code Coverage](https://scrutinizer-ci.com/g/antidot-framework/no-floc-middleware/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/antidot-framework/no-floc-middleware/?branch=1.x.x)
[![Infection MSI](https://badge.stryker-mutator.io/github.com/antidot-framework/no-floc-middleware/1.x.x)](https://infection.github.io)
[![Type Coverage](https://shepherd.dev/github/antidot-framework/no-floc-middleware/coverage.svg)](https://shepherd.dev/github/antidot-framework/no-floc-middleware)
[![Build Status](https://scrutinizer-ci.com/g/antidot-framework/no-floc-middleware/badges/build.png?b=master)](https://scrutinizer-ci.com/g/antidot-framework/no-floc-middleware/build-status/1.x.x)

PSR-15 middleware to opting your Website out of Google's FLoC Network

## Installation

Using [composer](https://getcomposer.org/download/)

````
composer require antidot-fw/no-floc-middleware
````

### Using [Laminas config Aggregator](https://docs.laminas.dev/laminas-config-aggregator/)

it install the library automatically

## Usage

In Antidot, Mezzio or any other PSR-15 middleware application, add it to the global pipeline.

````php
<?php

declare(strict_types=1);

use Antidot\Application\Http\Application;
use Antidot\Application\Http\Middleware\ErrorMiddleware;
use Antidot\Application\Http\Middleware\RouteDispatcherMiddleware;
use Antidot\Application\Http\Middleware\RouteNotFoundMiddleware;
use Antidot\Logger\Application\Http\Middleware\ExceptionLoggerMiddleware;
use Antidot\Logger\Application\Http\Middleware\RequestLoggerMiddleware;
+use Antidot\NoFLoC\NoFLoCMiddleware;

return static function (Application $app) : void {
+    $app->pipe(NoFLoCMiddleware::class)
    $app->pipe(ErrorMiddleware::class);
    $app->pipe(ExceptionLoggerMiddleware::class);
    $app->pipe(RequestLoggerMiddleware::class);
    $app->pipe(RouteDispatcherMiddleware::class);
    $app->pipe(RouteNotFoundMiddleware::class);
};

````
