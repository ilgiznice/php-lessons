<?php

require './quest.php';

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
<form action="index.php" method="post">
    <div>
        <?= $question ?>
    </div>
    <div>
        <?php foreach ($answers as $answer) : ?>
            <input
                    type="radio"
                    name="answer"
                    value=<?= json_encode($answer) ?>
            >
            <?= $answer['text'] ?>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="submit" value="Отправить">
    <div>
        <?= $result ?>
    </div>
</form>
</body>
</html>