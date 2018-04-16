<?php

namespace Kawanamiyuu\Zoosan;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class VoidRequestHandler implements RequestHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        throw new \BadMethodCallException('this handler is never called.');
    }
}
