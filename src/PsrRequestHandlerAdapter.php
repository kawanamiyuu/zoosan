<?php

namespace Kawanamiyuu\Zoosan;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PsrRequestHandlerAdapter implements RequestHandlerInterface
{
    /**
     * @var callable
     */
    public $next;

    /**
     * @param callable $next
     */
    public function __construct(callable $next)
    {
        $this->next = $next;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $next = $this->next;
        return $next($request);
    }
}
