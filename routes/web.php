<?php

$router = new \Core\Router();

$router->get('/', 'pages/index.php');

$router->get('/login', 'session/create.php')->only('guest');
$router->get('/register', 'register/create.php')->only('guest');
$router->get('/logout', 'session/destroy.php')->only('auth');
$router->post('/register', 'register/store.php')->only('guest');
$router->post('/login', 'session/store.php')->only('guest');

$router->get('/search', 'search/index.php');

$router->get('/tasks', 'tasks/index.php');
$router->get('/tasks/create', 'tasks/create.php')->only('auth');
$router->post('/tasks', 'tasks/store.php')->only('auth');
$router->get('/tasks/{task}', 'tasks/show.php');
$router->get('/tasks/{task}/edit', 'tasks/edit.php')->only('auth');
$router->post('/tasks/{task}/update', 'tasks/update.php')->only('auth');
$router->post('/tasks/{task}/destroy', 'tasks/destroy.php')->only('auth');

$router->get('/forgot-password', 'forgot-password/create.php')->only('guest');
$router->post('/forgot-password', 'forgot-password/store.php')->only('guest');

$router->get('/teams', 'teams/index.php');

$router->get('/calendar', 'calendar/index.php');
