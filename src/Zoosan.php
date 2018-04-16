<?php

namespace Kawanamiyuu\Zoosan;

use React\EventLoop\Factory;
use React\Http\Server as HttpServer;
use React\Socket\Server as SocketServer;

class Zoosan
{
    /**
     * @var string[]
     */
    private $handlers = [];

    /**
     * @param string[] $handlers
     */
    public function __construct(array $handlers)
    {
        foreach ($handlers as $handler) {
            $this->handlers[] = new InvokableMiddlewareInvoker($handler);
        }
    }

    /**
     * @param int $port
     */
    public function listen(int $port)
    {
        $loop = Factory::create();
        $socket = new SocketServer($port, $loop);

        $server = new HttpServer($this->handlers);
        $server->listen($socket);

        $loop->run();
    }
}

