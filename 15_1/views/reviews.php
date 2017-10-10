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
            <h1><?= $review['id'] ?></h1>
            <h2><?= $review['name'] ?></h2>
            <h3><?= $review['phone'] ?></h3>
            <h4><?= $review['text'] ?></h4>
            <h5><?= $review['timestamp'] ?></h5>
            <?php if ($editable === true) : ?>
                <form action="handler.php" method="post">
                    <div class="form-group">
                        <label for="title">Имя</label>
                        <input type="text" class="form-control" name="name" id="title" value="<?= $review['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Телефон</label>
                        <input type="text" class="form-control" name="phone" value="<?= $review['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Сообщение</label>
                        <input type="text" class="form-control" name="text" value="<?= $review['text'] ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>">
                    <button type="submit" name="edit">Отредактировать</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
