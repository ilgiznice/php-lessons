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
    <ul class="nav nav-pills">
        <li class="active"><a href="">Главная</a></li>
        <li><a href="admin">Панель администратора</a></li>
    </ul>
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
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['title'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['timestamp'] ?></td>
                        <td>
                            <a href="products/<?= $product['id'] ?>/view">
                                Перейти
                            </a>
                        </td>
                        <td>
                            <a href="products/<?= $product['id'] ?>/edit">
                                Редактировать
                            </a>
                        </td>
                        <td>
                            <form action="products/<?= $product['id'] ?>/delete" method="POST">
                                <button type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Форма для создания товара -->
            <form action="products/create" method="POST">
                <input type="text" name="title" placeholder="Название">
                <input type="text" name="description" placeholder="Описание">
                <input type="text" name="price" placeholder="Цена">
                <button type="submit">Создать</button>
            </form>
        </div>
    </div>
    <h1>Отзывы</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Имя</td>
                    <td>Телефон</td>
                    <td>Сообщение</td>
                    <td>Дата создания</td>
                    <td>Перейти</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($reviews as $review) : ?>
                    <tr>
                        <td><?= $review['id'] ?></td>
                        <td><?= $review['name'] ?></td>
                        <td><?= $review['phone'] ?></td>
                        <td><?= $review['text'] ?></td>
                        <td><?= $review['timestamp'] ?></td>
                        <td>
                            <a href="reviews/<?= $review['id'] ?>/view">
                                Перейти
                            </a>
                        </td>
                        <td>
                            <a href="reviews/<?= $review['id'] ?>/edit">
                                Редактировать
                            </a>
                        </td>
                        <td>
                            <form action="reviews/<?= $review['id'] ?>/delete" method="POST">
                                <button type="submit">Удалить</button>
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