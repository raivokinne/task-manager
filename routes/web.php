<?php

$router->get('/', 'pages/index.php');

$router->get('/login', 'auth/index.php');
$router->get('/register', 'auth/create.php');
$router->get('/logout', 'auth/logout.php');
$router->post('/register', 'auth/store.php');
$router->post('/login', 'auth/login.php');

$router->get('/search', 'search/index.php');

$router->get('/tasks', 'tasks/index.php');
$router->get('/tasks/create', 'tasks/create.php');
$router->post('/tasks', 'tasks/store.php');
$router->get('/tasks/{id}', 'tasks/show.php');
$router->get('/tasks/{id}/edit', 'tasks/edit.php');
$router->post('/tasks/{id}/update', 'tasks/update.php');
$router->post('/tasks/{id}/destroy', 'tasks/destroy.php');

$router->get('/forgot-password', 'forgot-password/index.php');
$router->post('/forgot-password', 'forgot-password/store.php');

