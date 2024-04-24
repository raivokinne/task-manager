<?php

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
$router->get('/tasks/{id}', 'tasks/show.php');
$router->get('/tasks/{id}/edit', 'tasks/edit.php')->only('auth');
$router->put('/tasks/{id}/update', 'tasks/update.php')->only('auth');
$router->delete('/tasks/{id}/delete', 'tasks/delete.php')->only('auth');
$router->post('/tasks/{id}/finish', 'tasks/finish.php')->only('auth');
$router->post('/tasks/{id}/end', 'tasks/end.php')->only('auth');

$router->get('/forgot-password', 'forgot-password/create.php')->only('guest');
$router->post('/forgot-password', 'forgot-password/store.php')->only('guest');

$router->get('/teams', 'teams/index.php');
$router->get('/teams/create', 'teams/create.php')->only('auth');
$router->post('/teams', 'teams/store.php')->only('auth');
$router->get('/teams/{id}', 'teams/show.php');
$router->get('/teams/{id}/edit', 'teams/edit.php')->only('auth');
$router->put('/teams/{id}/update', 'teams/update.php')->only('auth');
$router->delete('/teams/{id}/delete', 'teams/delete.php')->only('auth');

$router->get('/projects', 'projects/index.php');
$router->get('/projects/create', 'projects/create.php')->only('auth');
$router->post('/projects', 'projects/store.php')->only('auth');
$router->get('/projects/{id}', 'projects/show.php');
$router->get('/projects/{id}/edit', 'projects/edit.php')->only('auth');
$router->put('/projects/{id}/update', 'projects/update.php')->only('auth');
$router->delete('/projects/{id}/delete', 'projects/delete.php')->only('auth');

$router->get('/profile', 'profile/index.php')->only('auth');
$router->put('/profile', 'profile/update.php')->only('auth');

$router->get('/admin', 'admin/index.php')->only('admin');
$router->get('/admin/users', 'admin/users.php')->only('admin');
$router->get('/admin/users/{id}/edit', 'admin/edit.php')->only('admin');
$router->put('/admin/users/{id}/update', 'admin/update.php')->only('admin');
$router->delete('/admin/users/{id}/delete', 'admin/delete.php')->only('admin');

$router->get('/calendar', 'calendar/index.php');
