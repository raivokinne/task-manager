<?php

function dd(...$args)
{
    echo '<pre>';
    foreach ($args as $arg) {
        var_dump($arg);
    }
    echo '</pre>';
    die;
}

function view($view, $data = [])
{
    extract($data);
    require BASE_PATH . 'web/view/' . $view . '.php';
}

function redirect($path)
{
    header('Location: ' . $path);
    exit;
}
