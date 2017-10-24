<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 10.10.17
 * Time: 18:25
 */

namespace Controllers;

use Models\Review;

class ReviewController
{
    public function __construct()
    {
        // Вызывается при инициализации
        $this->review = new Review();
    }

    public function view($params)
    {
        $id = $params['id'];
        $review = $this->review->getOne($id);
        if (!$review) {
            print_r('Отзыв не найден');
            die();
        }
        $editable = false;
        include_once dirname(__FILE__) . '/../views/reviews.php';
    }

    public function edit($params)
    {
        $id = $params['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $review = $this->review->getOne($id);
            if (!$review) {
                print_r('Отзыв не найден');
                die();
            }
            // Делаем товар редактируемым
            $editable = true;
            // Отдаём views/products.php
            include_once dirname(__FILE__) . '/../views/reviews.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->review->update($id, $_POST);
            header('Location: /15_1/');
        }
    }

    public function delete($params)
    {
        $id = $params['id'];
        $this->review->delete($id);
        header('Location: /15_1/');
    }

    public function create()
    {
        $this->review->create($_POST);
        header('Location: /15_1/');
    }
}