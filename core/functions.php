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
    require BASE_PATH . 'view/' . $view . '.php';
}

function redirect($path)
{
    header('Location: ' . $path);
    exit;
}

function csrf()
{
    return "<input type='hidden' name='_token' value='" . bin2hex(random_bytes(32)) . "'>";
}

function csrf_verify($token)
{
    return hash_equals($token, $_POST['_token']);
}

function csrf_token()
{
    return csrf();
}

function method($method)
{
    return "<input type='hidden' name='_method' value='$method'>";
}
