<?php

require_once 'products.php';

$id = $_GET['id'];

if (!isset($id)) {
  print_r('ID не указан');
  die;
}

$product = null;

foreach ($products as $_product) {
  if ($_product['id'] == $id) {
    $product = $_product;
  }
}

?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php if (isset($product)) : ?>
  <h2><?= $product['name'] ?></h2>
  <h3><?= $product['price'] ?></h3>
<?php endif; ?>
<a href="index.php">Вернуться</a>
</body>
</html>
