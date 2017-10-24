<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <link rel="stylesheet" href="/15_1/css/bootstrap.min.css">
    <base href="/15_1/">
</head>
<body>
<div class="container">
    <ul class="nav nav-pills">
        <li class="active"><a href="">Главная</a></li>
        <li><a href="admin">Панель администратора</a></li>
    </ul>
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <!-- Блок с товаром (по 3 на каждой строке, см. col-md-4) -->
            <div class="col-md-4">
                <div class="img">
                    <!-- Фото товара -->
                    <img
                        src="<?= $product['photo'] ?? '' ?>"
                        alt="Фото товара"
                        width="300px"
                    />
                </div>
                <div class="general">
                    <!-- Название -->
                    <span class="title"><?= $product['title'] ?></span>
                    <!-- Цена -->
                    <span class="price"><?= $product['price'] ?></span>
                </div>
                <!-- Описание -->
                <div class="description">
                    <p><?= $product['description'] ?></p>
                </div>
                <!-- Действия -->
                <div class="actions">
                    <!-- Добавление в корзину -->
                    <button class="btn btn-success">Добавить в корзину</button>
                    <!-- Просмотр карточки товара -->
                    <a
                        href="products/<?= $product['id'] ?>/view"
                        class="btn btn-primary"
                    >Перейти</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div
            class="col-md-6"
            style="margin-left: auto; margin-right: auto"
        >
            <form class="form-horizontal" role="form" method="POST" action="reviews/create">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="Ваше имя"
                            name="name"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Телефон</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control"
                            id="phone"
                            placeholder="Ваше номер телефона"
                            name="phone"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Сообщение</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control"
                            id="text"
                            placeholder="Ваше сообщение"
                            name="text"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>