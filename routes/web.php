<?php

$router->get('/', 'pages/index.php');

$router->get('/login', 'session/create.php');
$router->get('/register', 'register/create.php');
$router->get('/logout', 'session/destroy.php');
$router->post('/register', 'register/store.php');
$router->post('/login', 'session/store.php');

$router->get('/search', 'search/index.php');

$router->get('/tasks', 'tasks/index.php');
$router->get('/tasks/create', 'tasks/create.php');
$router->post('/tasks', 'tasks/store.php');
$router->get('/tasks/{id}', 'tasks/show.php');
$router->get('/tasks/{id}/edit', 'tasks/edit.php');
$router->post('/tasks/{id}/update', 'tasks/update.php');
$router->post('/tasks/{id}/destroy', 'tasks/destroy.php');

$router->get('/forgot-password', 'forgot-password/create.php');
$router->post('/forgot-password', 'forgot-password/store.php');

$router->get('/teams', 'teams/index.php');

