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

// Срабатывает если задан параметр id(элемента)
if (isset($_REQUEST['id'])){
    $products = new \Models\Product();
    $product = $products->getOne($_REQUEST['id']);
} else {
    echo 'Не указан id';
    die();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Карточка товара</title>
</head>
<body>
    <h1><?= $product['id'] ?></h1>
    <h2><?= $product['title'] ?></h2>
    <h3><?= $product['description'] ?></h3>
    <h4><?= $product['price'] ?></h4>
    <h5><?= $product['timestamp'] ?></h5>
</body>
</html>
