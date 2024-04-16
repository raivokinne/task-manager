<?php

session_start();
const BASE_PATH = __DIR__ . '/../';
require __DIR__ . '/../vendor/autoload.php';
require BASE_PATH . 'core/functions.php';
$config = require BASE_PATH . 'config/database.php';

use Database\Database;

Database::connect($config);

use Core\Router;

$router = new Router();

$method = $_SERVER['REQUEST_METHOD'];
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include __DIR__ . '/../routes/web.php';

$router->dispatch($method, $url);
