<?php
// [Название, Цена, Описание, Ссылка к картинке, Ссылка на товар]
$products = [
    [100, 'Шапка мужская', 'Крутая шапка', '1.png', 'https://www.lamoda.ru/c/653/hats-shapki/'],
    ['Штаны женские', 100, 'Стильные штаны', '2.gif', 'https://www.lamoda.ru/c/653/hats-shapki/'],
    ['Мяч волейбольный', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, soluta?', '1.png'],
    ['Джинсы', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2.gif'],
    ['Футболка', 100, 'Lorem ipsum', '1.png'],
];
/**
 * Возвращает название товара
 *
 * @param $product
 * @return mixed
 */
function getName($product)
{
    return $product[0];
}
/**
 * Возвращает цену товара
 *
 * @param $product
 * @return mixed
 */
function getPrice($product)
{
    return $product[1];
}
/**
 * Возвращает описание товара
 *
 * @param $product
 * @return mixed
 */
function getDescription($product)
{
    return $product[2];
}

/**
 * Возвращает ссылку к картинке
 *
 * @param $products
 * @return mixed
 */

function getImage($product)
{
    return $product[3];
}

/**
 * Возвращает ссылку на продукт
 *
 * @param $product
 * @return mixed
 */

function getLink($product)
{
    return $product[4];
}

$products_new = [
    [
        'description' => 'lorem lorem',
        'image' => '1.png',
        'link' => 'http://google.com',
        'price' => 100,
        'name' => 'название1',
        'colors' => ['Белый', 'Красный', 'Чёрный'],
    ],
    [
        'name' => 'название2',
        'price' => 200,
        'description' => 'lorem lorem',
        'image' => '2.gif',
        'link' => 'http://yandex.ru',
        'colors' => ['Зелёный', 'Жёлтый', 'Розовый'],
    ],
];