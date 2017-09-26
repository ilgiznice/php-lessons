<?php

/*require_once './Build.php';
require_once './Shop.php';
require_once './House.php';*/



spl_autoload_register();

/*$house = new House();
$house->number = 404;
//$house->close();

$house1 = new House();
$house1->number = 301;
//$house1->open();

$houses = [$house, $house1];

echo '<pre>';
print_r($houses);

$houses[0]->close();*/


$house = new Build\House();
$house1 = new Build\Build();
$house2 = new Build\Shop();
//$house = new House();
//$house->number = 301;
$house->open();





