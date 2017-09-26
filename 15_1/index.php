<?php

spl_autoload_register();

echo '<pre>';

$review = new \Models\Review();
$data = [
    'name' => 'Георгий',
    'phone' => '+79993919123',
    'text' => 'Хороший сайт',
];
$review->create($data);
print_r($data);



