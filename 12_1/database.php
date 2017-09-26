<?php

// Срабатывает при нажатии кнопки Добавить
if (isset($_POST['add'])) {
    add($_POST);
    echo 'Товар добавлен';
}

// Срабатывает при нажатии кнопки Удалить
if (isset($_POST['delete'])) {
    delete($_POST['id']);
    echo 'Товар удален';
}

// Срабатывает при нажатии кнопки Изменить
if (isset($_POST['edit'])) {
    edit($_POST['id'], $_POST);
    echo 'Товар изменен';
}

// Редактирование записи
function edit($id, $data)
{
    $title = $data['title'];
    $price = $data['price'];

    $elements = getAll();
    $row = $id - 1;

    $elements[$row] = [$title, $price]; // Редактирует запись в полученном массиве записей

    $rows = [];
    foreach ($elements as $element) {
        // Склеиваем элементы внутри каждой записи
        $rows[] = implode("\t", $element);
    }
    $rows = implode(PHP_EOL, $rows); // Склеиваем все записи

    $result = file_put_contents('./products.csv', $rows);

    if ($result) return true;
    else return false;
}

// Удаление записи
function delete($id)
{
    $elements = getAll();
    $row = $id - 1;

    unset($elements[$row]); // Удаляет запись из полученного массива записей

    $rows = [];
    foreach ($elements as $element) {
        // Склеиваем элементы внутри каждой записи
        $rows[] = implode("\t", $element);
    }
    $rows = implode(PHP_EOL, $rows); // Склеиваем все записи

    $result = file_put_contents('./products.csv', $rows);

    if ($result) return true;
    else return false;
}

// Получение одной записи
function get($id)
{
    $row = $id - 1;
    if (isset(getAll()[$row])) {
        return getAll()[$row];
    }
    else {
        return false;
    }
}

// Получение всех записей
function getAll()
{
    $elements = [];
    $file = file_get_contents('./products.csv');
    $rows = explode(PHP_EOL, $file);
    foreach ($rows as $row)
    {
        if (strlen($row) === 0) continue;
        $element = explode("\t", $row);
        $elements[] = $element;
    }

    return $elements;
}

// Добавление в базу
function add($data)
{
   $title = $data['title'];
   $price = $data['price'];

   $row = $title . "\t" . $price . PHP_EOL;
   file_put_contents('./products.csv', $row, FILE_APPEND);
}