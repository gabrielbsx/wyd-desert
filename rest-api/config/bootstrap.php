<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../vendor/autoload.php';

$container = new Container;

$settings = require_once __DIR__ . '/../app/settings.php';
$settings($container);

AppFactory::setContainer($container);
$app = AppFactory::create();

$middleware = require_once __DIR__ . '/../app/middleware.php';
$middleware($app);

#require_once __DIR__ . '/../app/jwt.php';

require_once __DIR__ . '/../app/routes.php';

$app->run();