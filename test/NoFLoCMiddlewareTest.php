<?php

declare(strict_types=1);

namespace AntidotTest\NoFLoC;

use Antidot\NoFLoC\NoFLoCMiddleware;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class NoFLoCMiddlewareTest extends TestCase
{
    public function testItShouldSetPermissionsPolicyHeaderAsInterestCohort(): void
    {
        $handler = $this->createMock(RequestHandlerInterface::class);
        $request = $this->createMock(ServerRequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);
        $handler->expects(self::once())
            ->method('handle')
            ->with($request)
            ->willReturn($response);
        $response->expects(self::once())
            ->method('withAddedHeader')
            ->with('Permission-Policy', 'interest-cohort=()')
            ->willReturn($response);

        $middleware = new NoFLoCMiddleware();
        $middleware->process($request, $handler);
    }
}
    