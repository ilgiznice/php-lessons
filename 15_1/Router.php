<?php

class Router
{
    // Массив с параметрами url
    // [ entity, action, id ]
    protected $matches = [];

    // Массив с роутами
    // [ expression, controller, action ]
    protected $routes = [];

    public function get($expression, $controller, $method = 'index')
    {
        // AboutController
        $controller = "Controllers\\$controller";
        // Controllers\AboutController
        $this->routes['GET'][] = [
            'expression' => $expression,
            'controller' => new $controller,
            'method' => $method,
        ];
    }

    public function post($expression, $controller, $method = 'index')
    {
        // AboutController
        $controller = "Controllers\\$controller";
        // Controllers\AboutController
        $this->routes['POST'][] = [
            'expression' => $expression,
            'controller' => new $controller,
            'method' => $method,
        ];
    }

    public function execute()
    {
        // URL запрашиваемой страницы
        $url = $_SERVER['PATH_INFO'] ?? '/';
        // GET или POST
        $method = $_SERVER['REQUEST_METHOD'];
        // Цикл по роутам
        foreach ($this->routes[$method] as $route) {
            if (preg_match($route['expression'], $url, $this->matches)) {
                $route['controller']->{$route['method']}($this->matches);
                break;
            }
        }
    }
}