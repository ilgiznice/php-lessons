<?php

// Хранилище имен
$names = [
    'Василий',
    'Петр',
    'Геннадий',
    'Дмитрий',
    'Александр',
    'Алексей',
];

// Хранилище фамилий
$surnames = [
    'Васечкин',
    'Петров',
    'Иванов',
];

// Хранилище адресов
$addresses = [
    'ул. Пушкина, д. 1',
    'ул. Ленина, д. 2',
    'ул. Комсомольская, д. 41',
];


// Генерирует "случайные" данные человека
function generatePerson($names, $surnames, $addresses)
{
    return [
        'name'    => getName($names),
        'surname' => getSurname($surnames),
        'address' => getAddress($addresses),
        'phone'   => generatePhone()
    ];
}

// Получение случайного имени
function getName($names)
{
    return getRandomElement($names);
}

// Получение случайного фамилии
function getSurname($surnames)
{
    return getRandomElement($surnames);
}

// Получение случайного адреса
function getAddress($addresses)
{
    return getRandomElement($addresses);
}

// Получение случайного элемента
function getRandomElement($array)
{
    $arrayCount = count($array);
    return $array[rand(0, $arrayCount - 1)];
}

// Генерация случайного номера
function generatePhone()
{
    $phone = '+7' . rand(100, 999) . rand(1000000, 9999999);
    return $phone;
}
