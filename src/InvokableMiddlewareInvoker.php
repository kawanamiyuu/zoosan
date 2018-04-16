<?php

namespace Kawanamiyuu\Zoosan;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class InvokableMiddlewareInvoker implements InvokableMiddlewareInterface
{
    /**
     * @var string
     */
    private $middleware;

    public function __construct(string $middleware)
    {
        $this->middleware = $middleware;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(ServerRequestInterface $request, callable $next = null): ResponseInterface
    {
        $middleware = $this->middleware;
        $invokable = new InvokableMiddlewareAdapter(new $middleware);
        return $invokable($request, $next);
    }
}
