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
<form action="homework.php" method="POST">
    <input type="text" name="firstname" placeholder="Имя" required>
    <input type="text" name="lastname" placeholder="Фамилия" required>
    <input type="text" name="email" placeholder="E-mail" required>
    <input type="text" name="phone" placeholder="Телефон" required>
    <p>О себе</p>
    <textarea name="about" id="about" cols="30" rows="10"></textarea>
    <p>Пол</p>
    <input type="radio" name="gender" value="male" checked>Мужской
    <input type="radio" name="gender" value="female">Женский
    <p>Возраст</p>
    <input type="number" name="age">
    <p>Хобби</p>
    <select name="hobby" id="hobby">
        <option value="sport">Спорт</option>
        <option value="photos">Фотографии</option>
        <option value="programming">Программирование</option>
    </select>
    <input type="submit" value="Отправить" name="submit">
</form>
</body>
</html>

<?php

function fieldIsset($field) {
    if (isset($field) && !empty($field)) {
        return true;
    }
    return false;
}

function emailCorrect($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail ($email) указан верно.\n";
    } else {
        echo 'E-mail введён неверно';
    }
}

function ageCorrect($age) {
    if ($age >= 18 && $age <= 99) {
        print_r('Возраст корректный');
    } else {
        print_r('Возраст некорректный');
    }
}

function aboutCorrect($about) {
    if (strlen($about) < 10 || strlen($about) > 30) {
        print_r('О себе слишком короткое или слишком длинное');
    } else {
        print_r('О себе корректное');
    }
}

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $hobby = $_POST['hobby'];

    if (fieldIsset($firstname)) {
        print_r('Имя задано');
    }
    emailCorrect($email);
    ageCorrect($age);
    if (fieldIsset($about)) {
        aboutCorrect($about);
    }
}

