<?php

//spl_autoload_register();

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

$products = new \Models\Product();
$reviews = new \Models\Review();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/15_1/css/bootstrap.min.css">
    <base href="/15_1/">
</head>
<body>
<div class="container">
    <h1>Товары</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Название</td>
                        <td>Описание</td>
                        <td>Цена</td>
                        <td>Дата создания</td>
                        <td>Перейти</td>
                        <td>Редактировать</td>
                        <td>Удалить</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($products->getAll() as $product) : ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['title'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['timestamp'] ?></td>
                        <td>
                            <a href="view.php?id=<?= $product['id'] ?>">
                                Перейти
                            </a>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $product['id'] ?>">
                                Редактировать
                            </a>
                        </td>
                        <td>
                            <form action="handler.php" method="POST">
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= $product['id'] ?>"
                                >
                                <button type="submit" name="delete">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>

