<?php

namespace Kawanamiyuu\Zoosan;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use function RingCentral\Psr7\stream_for;

class HelloWorldMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        return $response
            ->withHeader('Content-Type', 'text/html')
            ->withBody(stream_for('<p>Hello world</p>'));
    }
}
