<?php

namespace Kawanamiyuu\Zoosan;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;

class InvokableMiddlewareAdapter implements InvokableMiddlewareInterface
{
    /**
     * @var MiddlewareInterface
     */
    private $middleware;

    /**
     * @param MiddlewareInterface $middleware
     */
    public function __construct(MiddlewareInterface $middleware)
    {
        $this->middleware = $middleware;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(ServerRequestInterface $request, callable $next = null): ResponseInterface
    {
        // final middleware will be invoked without a next handler
        if ($next === null) {
            return $this->middleware->process($request, new VoidRequestHandler);
        }

        return $this->middleware->process($request, new PsrRequestHandlerAdapter($next));
    }
}
