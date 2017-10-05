<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Карточка товара</title>
    <link rel="stylesheet" href="/15_1/css/bootstrap.min.css">
    <base href="/15_1_new/">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $record['id'] ?></h1>
            <h2><?= $record['title'] ?></h2>
            <h3><?= $record['description'] ?></h3>
            <h4><?= $record['price'] ?></h4>
            <h5><?= $record['timestamp'] ?></h5>
            <?php if ($editable) : ?>
                <form action="products/<?= $record['id'] ?>/update" method="post">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?= $record['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" class="form-control" name="description" value="<?= $record['description'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="text" class="form-control" name="price" value="<?= $record['price'] ?>">
                    </div>
                    <button type="submit">Отредактировать</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
