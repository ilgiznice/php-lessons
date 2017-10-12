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
    public function execute($method, $action, $id = null)
    {
        $_review = new Review();
        if ($method === 'GET') {
            if ($action === 'view' || $action === 'edit') {
                // Отдаём views/reviews.php
                // Получаем отзыв по ID
                $review = $_review->getOne($id);
                if (!$review) {
                    print_r('Отзыв не найден');
                    die();
                }
                // По-умолчанию не редактируемый
                $editable = false;
                if ($action === 'edit') {
                    // Если действие = edit
                    // То добавляем возможность изменить
                    $editable = true;
                }
                include_once dirname(__FILE__) . '/../views/reviews.php';
            }
        } else if ($method === 'POST') { // Если POST запрос
            if ($action === 'edit') {
                // Если действие = обновить
                $_review->update($id, $_POST);
            } else if ($action === 'delete') {
                // Если действие = удалить
                $_review->delete($id);
            } else if ($action === 'create') {
                // Если действие = создать
                $_review->create($_POST);
            }
            header('Location: /15_1/');
        }
    }
}