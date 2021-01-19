<?php

$app->add(new Tuupola\Middleware\JwtAuthentication([
    'secure' => false,
    'regexp' => '/(.*)/',
    'header' => 'X-Valland-Token',
    'realm' => 'Protected',
    'secret' => '*senhaaqui@=',
    'error' => function ($response, $arguments) {
        $data['status'] = 'error';
        $data['message'] = 'Não foi possível autenticar a requisição!';
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));