<?php

use Api\Websocket\SistemaChat;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

// Incluir o Composer
require __DIR__ . '/vendor/autoload.php';

// $server: variável que irá armazenar a instância do servidor WebSocket.
// IoServer::factory(): método para criar uma instância do servidor WebSocket.
// new HttpServer(): classe que fornece funcionalidades de comunicação HTTP básicas.
// new WsServer(): classe responsável por fornecer funcionalidades WebSocket adicionais, permitindo a comunicação bidirecional em tempo real.
// new SistemaChat(): classe criada para lidar com eventos relacionados ao WebSocket, como receber mensagens, abrir conexões, fechar conexões, entre outras funcionalidades
// 8080: porta em que o servidor WebSocket será executado
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new SistemaChat()
        )
    ),
    8080
);

// Iniciar o servidor e começar a escutar as conexões.
$server->run();