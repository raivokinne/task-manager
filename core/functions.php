<?php
function dd(...$args)
{
    foreach ($args as $arg) {
        var_dump($arg);
    }
}

function view($view, $data = [])
{
    extract($data);
    return require BASE_PATH . 'web/view/' . $view . '.php';
}
