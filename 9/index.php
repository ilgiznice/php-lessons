<?php
require_once './products.php'; //подключили файл с скриптом
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Album example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/album.css" rel="stylesheet">

</head>

<body>

<div class="album text-muted">
    <div class="container">
        <div class="row">
<!--            --><?php //foreach ($products as $product) : ?>
<!--                <div class="card">-->
<!--                    <h6>--><?php //echo getName($product) ?><!--</h6>-->
<!--                    <span>Цена: --><?php //echo getPrice($product) ?><!--</span>-->
<!--                    <p class="card-text">--><?php //echo getDescription($product) ?><!--</p>-->
<!--                    <img src="--><?//= getImage($product) ?><!--" />-->
<!--                    <a href="--><?//= getLink($product) ?><!--" target="_blank">Купить</a>-->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
            <?php foreach ($products_new as $product) : ?>
                <div class="card">
                    <h6>Название: <?= $product['name'] ?></h6>
                    <span>Цена: <?= $product['price'] ?></span>
                    <p>Описание: <?= $product['description'] ?></p>
                    <img src="<?= $product['image'] ?>" alt="Фото">
                    <a href="<?= $product['link'] ?>" target="_blank">Купить</a>
                    <p>
                        Доступные цвета: <br />
                        <?php foreach ($product['colors'] as $key => $color) : ?>
                            <span><?= $key ?>: <?= $color ?>, </span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Доступные цвета: <br />
                        <?= implode(', ', $product['colors']) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</body>
</html>