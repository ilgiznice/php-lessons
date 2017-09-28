<?php

spl_autoload_register( function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});

if (isset($_POST['edit'])) {
    $products = new \Models\Product();
    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
    ];
    $products->update($_POST['id'], $data);
    header('Location: index.php');
}

if (isset($_POST['delete'])) {
    $products = new \Models\Product();
    $products->delete($_POST['id']);
    header('Location: index.php');
}
