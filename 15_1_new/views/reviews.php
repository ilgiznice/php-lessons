<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Карточка отзыва</title>
    <link rel="stylesheet" href="/15_1/css/bootstrap.min.css">
    <base href="/15_1_new/">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $record['id'] ?></h1>
            <h2><?= $record['name'] ?></h2>
            <h3><?= $record['phone'] ?></h3>
            <h4><?= $record['text'] ?></h4>
            <h5><?= $record['timestamp'] ?></h5>
            <?php if ($editable) : ?>
                <form action="reviews/<?= $record['id'] ?>/update" method="post">
                    <div class="form-group">
                        <label for="title">Имя</label>
                        <input type="text" class="form-control" name="name" id="title" value="<?= $record['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Телефон</label>
                        <input type="text" class="form-control" name="phone" value="<?= $record['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Сообщение</label>
                        <input type="text" class="form-control" name="text" value="<?= $record['text'] ?>">
                    </div>
                    <button type="submit">Отредактировать</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
