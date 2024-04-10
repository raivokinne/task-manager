<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    protected function add($method, $url, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'url' => $url,
            'controller' => $controller
        ];

        return $this;
    }

    public function get($url, $controller)
    {
        return $this->add('GET', $url, $controller);
    }

    public function post($url, $controller)
    {
        return $this->add('POST', $url, $controller);
    }

    public function put($url, $controller)
    {
        return $this->add('PUT', $url, $controller);
    }

    public function delete($url, $controller)
    {
        return $this->add('DELETE', $url, $controller);
    }

    public function patch($url, $controller)
    {
        return $this->add('PATCH', $url, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function dispatch($method, $url)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === strtoupper($method)) {
                $pattern = str_replace('/', '\/', $route['url']);
                $pattern = preg_replace('/\{([^\/]+)\}/', '(?<$1>[^\/]+)', $pattern);
                $pattern = '/^' . $pattern . '$/';
    
                if (preg_match($pattern, $url, $matches)) {
                    $parameters = [];
                    foreach ($matches as $key => $value) {
                        if (!is_int($key)) {
                            $parameters[$key] = $value;
                        }
                    }

                    Middleware::resolve(isset($route['middleware']));
    
                    $controllerPath = BASE_PATH . '/app/controllers/' . $route['controller'];
                    if (file_exists($controllerPath)) {
                        extract($parameters);
                        require $controllerPath;
                    } else {
                        $this->abort(404);
                    }
                    return;
                }
            }
        }
    
        $this->abort(404);
    }

    public function abort($code = 404)
    {
        http_response_code($code);

        require BASE_PATH . 'web/view/404.php';

        die();
    }
}
