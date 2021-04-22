<?php

declare(strict_types=1);

namespace AntidotTest\NoFLoC;

use Antidot\NoFLoC\ConfigProvider;
use Antidot\NoFLoC\NoFLoCMiddleware;
use PHPUnit\Framework\TestCase;

final class ConfigProviderTest extends TestCase
{

    public function testItShouldReturnLaminasCompatibleConfigArray(): void
    {
        $configProvider = new ConfigProvider();
        $this->assertSame([
            'dependencies' => [
                'invokables' => [
                    NoFLoCMiddleware::class => NoFLoCMiddleware::class,
                ]
            ]
        ], $configProvider())

;    }
}
