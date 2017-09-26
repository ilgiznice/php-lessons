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

<form action="/12_1/index.php" method="post">
    <input type="text" name="title" value="<?php echo $product[0] ?? '' ?>">
    <input type="text" name="price" value="<?php echo $product[1] ?? '' ?>">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
    <button type="submit" name="edit">Сохранить</button>
</form>

</body>
</html>
