<?php

class Router
{
    public function __construct(\Models\Product $products, \Models\Review $reviews)
    {
        $this->products = $products;
        $this->reviews = $reviews;
    }

    protected function handleGet($url)
    {
        if ($url === '' || $url === '/index.php') {
            $products = $this->products->getAll();
            $reviews = $this->reviews->getAll();
            include_once 'views/list.php';
        }
    }

    public function execute()
    {
        $url_src = $_SERVER['REQUEST_URI'];
        $url = str_replace('/15_1/index.php', '', $url_src);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // GET /products -> Выводим список всех товаров
            $this->handleGet($url);
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // POST /products/create -> Создать новый товар
        }
    }
}