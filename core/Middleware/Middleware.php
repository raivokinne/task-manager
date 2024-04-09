<?php

namespace Core\Middleware;

class Middleware
{
    const Map = [
        'auth' => Guest::class,
        'guest' => Auth::class
    ];
}
