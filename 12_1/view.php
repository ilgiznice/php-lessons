<?php

require_once './database.php';

// Срабатывает если задан параметр id(элемента)
if (isset($_REQUEST['id'])){
    $product = get($_REQUEST['id']);
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
    <title>Document</title>
</head>
<body>
    <h1><?php echo $product[0] ?></h1>
    <h5>Цена: <?php echo $product[1] ?></h5>
</body>
</html>
