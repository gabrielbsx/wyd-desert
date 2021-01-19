<?php

use app\Controllers\Game;

$app->get('/', Game::class . ':index');
$app->post('/register', Game::class . ':register');
$app->post('/login', Game::class . ':login');
$app->get('/serverinfo', Game::class . ':serverinfo');
$app->post('/account', Game::class . ':account');
$app->post('/donate', Game::class . ':donate');
$app->post('/alterpass', Game::class . ':alterpass');
$app->post('/droplist', Game::class . ':droplist');