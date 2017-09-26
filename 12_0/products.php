<?php

$products = [];

foreach (file('products.csv') as $key => $row) {
  $row_array = explode(',', $row);
  array_push($products, [
    'id' => $key,
    'name' => $row_array[0],
    'price' => $row_array[1],
  ]);
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $row = sprintf('%s,%s%s', $name, $price, PHP_EOL);
  file_put_contents('products.csv', $row, FILE_APPEND);
  header('Location: index.php');
}