<?php

use Controllers\IndexController;

class Router
{
    // /products/1/view
    // products - entity
    // 1 - id
    // view - action
    protected $action_pattern = "/(?P<entity>\w+)\/(?P<id>\d+)\/(?P<action>\w+)/";

    protected $matches = [];

    public function execute()
    {
        $url = $_SERVER['PATH_INFO'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Получение списка
            // Получение одной строки
            if ($url === NULL || $url === '/') {
                // Показать главную
                (new IndexController())->index();
            } else if (preg_match($this->action_pattern, $url, $this->matches)) {
                // Показать карточку товара №1 или №5 или ...
                echo '<pre>';
                var_dump($this->matches);
            } else {
                // Показать ошибку
                print_r('Страница не найдена');
                die();
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Создание
            // Обновление
            // Удаление
        }
    }
}