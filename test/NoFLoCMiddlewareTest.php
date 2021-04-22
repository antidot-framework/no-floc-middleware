<?php

declare(strict_types=1);

namespace AntidotTest\NoFLoC;

use Antidot\NoFLoC\NoFLoCMiddleware;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class NoFLoCMiddlewareTest extends TestCase
{
    public function testItShouldSetPermissionsPolicyHeaderAsInterestCohort(): void
    {
        $handler = $this->createMock(RequestHandlerInterface::class);
        $request = $this->createMock(ServerRequestInterface::class);
        $request->expects($this->once())
            ->method('withHeader')
            ->with('Permission-Policy', 'interest-cohort=()')
            ->willReturn($request);

        $middleware = new NoFLoCMiddleware();
        $middleware->process($request, $handler);
    }
}
    