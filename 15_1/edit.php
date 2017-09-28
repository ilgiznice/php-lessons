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
    <title>Редактирование товара</title>
    <link rel="stylesheet" href="/15_1/css/bootstrap.min.css">
    <base href="/15_1/">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="handler.php" method="post">
                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= $product['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <input type="text" class="form-control" name="description" value="<?= $product['description'] ?>">
                </div>
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="text" class="form-control" name="price" value="<?= $product['price'] ?>">
                </div>
                <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>">
                <button type="submit" name="edit">Отредактировать</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
