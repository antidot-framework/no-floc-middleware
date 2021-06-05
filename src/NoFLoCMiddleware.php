<?php

declare(strict_types=1);

namespace Antidot\NoFLoC;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class NoFLoCMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        $response->withAddedHeader('Permission-Policy', 'interest-cohort=()');

        return $response;
    }
}
