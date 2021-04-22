<?php

declare(strict_types=1);

namespace Antidot\NoFLoC;

final class ConfigProvider
{
    /**
     * @return array<string, array<string, array<string, string>>>
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'invokables' => [
                    NoFLoCMiddleware::class => NoFLoCMiddleware::class,
                ]
            ]
        ];
    }
}
