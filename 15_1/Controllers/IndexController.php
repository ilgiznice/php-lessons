<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 05.10.17
 * Time: 19:28
 */

namespace Controllers;

use Models\Product;
use Models\Review;

class IndexController
{
    public function index()
    {
        // 1) Получить все товары
        // 2) Получить все отзывы
        // 3) Вывести страницу list.php
        $products = (new Product())->getAll(); // 1 шаг
        $reviews = (new Review())->getAll(); // 2 шаг
        include_once dirname(__FILE__) . '/../views/list.php'; // 3 шаг
    }
}