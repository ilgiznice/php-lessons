<?php

require_once 'products.php';

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 12</title>
</head>
<body>
<?php foreach ($products as $product) : ?>
  <div>
    <a href="view.php?id=<?= $product['id'] ?>">
      <h2><?= $product['name'] ?></h2>
    </a>
    <span><?= $product['price'] ?></span>
  </div>
<?php endforeach; ?>
<h1>Создание нового товара</h1>
<form action="products.php" method="post">
  <input type="text" name="name" placeholder="Название">
  <input type="number" name="price" placeholder="Цена">
  <input type="submit" name="submit" value="Создать">
</form>
</body>
</html>