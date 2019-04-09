<?php

use Swoole\WebSocket\Server;

class WebSocket
{
    public $server = null;
    public $ip = '0.0.0.0';
    public $port = 9501;

    public function __construct()
    {
        $this->server = new Server($this->ip, $this->port);
        $this->server->on('request', [$this, 'onRequest']);
        $this->server->on('message', [$this, 'onMessage']);
        $this->server->on('open', [$this, 'onOpen']);
        $this->server->on('close', [$this, 'onClose']);
        $this->server->start();
    }

    public function onRequest($request, $response)
    {
        print_r([
            'callback' => 'onRequest',
            'request' => $request,
            'response' => $response,
        ]);
    }

    public function onMessage(Server $server, $frame)
    {
        print_r([
            'callback' => 'onMessage',
            'request' => $frame,
        ]);
    }

    public function onOpen(Server $server, $request)
    {
        print_r([
            'callback' => 'onOpen',
            'request' => $request,
        ]);
    }

    public function onClose(Server $server, $fd)
    {
        print_r([
            'callback' => 'onClose',
            'fd' => $fd,
        ]);
    }
}

$tcpServer = new WebSocket();
