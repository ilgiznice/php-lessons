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
    public function execute($method, $action, $id)
    {
        $_product = new Product();
        if ($method === 'GET') {
            if ($action === 'view' || $action === 'edit') {
                // Отдаём views/products.php
                // Получаем товар по ID
                $product = $_product->getOne($id);
                if (!$product) {
                    print_r('Товар не найден');
                    die();
                }
                // По-умолчанию не редактируемый
                $editable = false;
                if ($action === 'edit') {
                    // Если действие = edit
                    // То добавляем возможность изменить
                    $editable = true;
                }
                include_once dirname(__FILE__) . '/../views/products.php';
            }
        } else if ($method === 'POST') { // Если POST запрос
            if ($action === 'edit') {
                // Если действие = обновить
                $_product->update($id, $_POST);
            } else if ($action === 'delete') {
                // Если действие = удалить
                $_product->delete($id);
            } else if ($action === 'create') {
                // Если действие = создать
                $_product->create($_POST);
            }
            header('Location: /15_1/');
        }
    }
}