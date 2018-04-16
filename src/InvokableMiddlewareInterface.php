<?php

namespace Kawanamiyuu\Zoosan;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface InvokableMiddlewareInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param callable|null          $next
     *
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, callable $next = null): ResponseInterface;
}
