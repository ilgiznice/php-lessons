<?php

class Router
{
    protected $action_pattern = '/(?P<entity>\w+)\/(?P<id>\d+)\/(?P<action>\w+)/';
    protected $create_pattern = '/(?P<entity>\w+)/';

    protected $views = [
        'products' => 'views/products.php',
        'reviews' => 'views/reviews.php',
    ];

    protected $matches = [];

    protected $actions = ['view', 'update'];

    protected $base = '/15_1_new';

    public function __construct(\Models\Product $products, \Models\Review $reviews)
    {
        $this->products = $products;
        $this->reviews = $reviews;
    }

    protected function getModel()
    {
        $model = $this->{$this->matches['entity']};
        if (!isset($model)) {
            throw new \Exception('Модель не найдена');
        }
        return $model;
    }

    protected function getRecord()
    {
        return $this->getModel()->getOne($this->matches['id']);
    }

    protected function createRecord()
    {
        $this->getModel()->create($_POST);
        header("Location: $this->base/index.php");
    }

    protected function updateRecord()
    {
        $this->getModel()->update($this->matches['id'], $_POST);
        header("Location: $this->base/index.php");
    }

    protected function deleteRecord()
    {
        $this->getModel()->delete($this->matches['id']);
        header("Location: $this->base/index.php");
    }

    protected function pageNotFound()
    {
        print_r('Страница не найдена');
        die();
    }

    public function execute()
    {
        $url = $_SERVER['PATH_INFO'];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($url === NULL || $url === '/') {
                $products = $this->products->getAll();
                $reviews = $this->reviews->getAll();
                include_once 'views/list.php';
            } else if (preg_match($this->action_pattern, $url, $this->matches)) {
                if (!in_array($this->matches['action'], $this->actions)) $this->pageNotFound();
                $record = $this->getRecord();
                if ($this->matches['action'] === 'update') {
                    $editable = true;

                }
                if ($this->matches['action'] === 'view') {
                    $editable = false;
                }
                return include_once $this->views[$this->matches['entity']];

            } else {
                $this->pageNotFound();
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (preg_match($this->action_pattern, $url, $this->matches)) {
                if ($this->matches['action'] === 'update') {
                    $this->updateRecord();
                }
                if ($this->matches['action'] === 'delete') {
                    $this->deleteRecord();
                }
            } else if (preg_match($this->create_pattern, $url, $this->matches)) {
                $this->createRecord();
            }
        }
    }
}