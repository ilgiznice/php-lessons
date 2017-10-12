<?php

use Controllers\IndexController;

class Router
{
    // /products/1/view
    // products - entity
    // 1 - id
    // view - action
    protected $action_pattern = "/(?P<entity>\w+)\/(?P<id>\d+)\/(?P<action>\w+)/";
    // /products/create
    // products - entity
    // create - action
    protected $create_pattern = "/(?P<entity>\w+)\/(?P<action>\w+)/";

    protected $matches = [];

    public function execute()
    {
        $url = $_SERVER['PATH_INFO'] ?? null;
        $method = $_SERVER['REQUEST_METHOD'];
        // Получение списка
        // Получение одной строки
        if ($url === NULL || $url === '/') {
            // Показать главную
            (new IndexController())->index();
        } else if (preg_match($this->action_pattern, $url, $this->matches)) {
            // Показать карточку товара №1 или №5 или ...
            $entity = $this->matches['entity'];
            $action = $this->matches['action'];
            $id = $this->matches['id'];
            // GET /products/1/edit -> Отдавать страницу
            // POST /products/1/edit -> Редактировать товар
            if ($entity === 'products') {
                $controller = new \Controllers\ProductController();
                $controller->execute($method, $action, $id);
            } else if ($entity === 'reviews') {
                $controller = new \Controllers\ReviewController();
                $controller->execute($method, $action, $id);
            }
        } else if (preg_match($this->create_pattern, $url, $this->matches)) {
            // Создать товар или отзыв или ...
            $entity = $this->matches['entity'];
            $action = $this->matches['action'];
            // POST /products/create -> Создать товар
            // POST /reviews/create -> Создать отзыв
            if ($entity === 'products') {
                $controller = new \Controllers\ProductController();
                $controller->execute($method, $action);
            } else if ($entity === 'reviews') {
                $controller = new \Controllers\ReviewController();
                $controller->execute($method, $action);
            }
        } else {
            // Показать ошибку
            print_r('Страница не найдена');
            die();
        }
    }
}