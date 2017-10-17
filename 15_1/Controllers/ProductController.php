<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 10.10.17
 * Time: 18:24
 */

namespace Controllers;

use Models\Product;

class ProductController
{
    public function __construct()
    {
        // Вызывается при инициализации
        $this->product = new Product();
    }

    public function view($params)
    {
        $id = $params['id'];
        $product = $this->product->getOne($id);
        if (!$product) {
            print_r('Товар не найден');
            die();
        }
        $editable = false;
        include_once dirname(__FILE__) . '/../views/products.php';
    }

    public function edit($params)
    {
        $id = $params['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $product = $this->product->getOne($id);
            if (!$product) {
                print_r('Товар не найден');
                die();
            }
            // Делаем товар редактируемым
            $editable = true;
            // Отдаём views/products.php
            include_once dirname(__FILE__) . '/../views/products.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->product->update($id, $_POST);
            header('Location: /15_1/');
        }
    }

    public function delete($params)
    {
        $id = $params['id'];
        $this->product->delete($id);
        header('Location: /15_1/');
    }

    public function create()
    {
        $this->product->create($_POST);
        header('Location: /15_1/');
    }
}