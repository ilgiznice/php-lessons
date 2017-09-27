<?php

spl_autoload_register( function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});

echo '<pre>';

$entity = new \Models\Product();
//$data = [
//    'title' => 'Парацетамол',
//    'description' => 'От жара',
//    'price' => 123.45,
//];
//$entity->create($data);
//$review->update(2, $data);
//print_r($data);

$entity->delete(1);



