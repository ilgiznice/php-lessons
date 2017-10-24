<?php

//spl_autoload_register();

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

//echo '<pre>';

$router = new Router();
// localhost/15_1/
// localhost/15_1
// /products\/(?P<id>\d+)\/view
//  Товары
$router->get('/products\/(?P<id>\d+)\/view/', 'ProductController', 'view');
$router->get('/products\/(?P<id>\d+)\/edit/', 'ProductController', 'edit');
$router->post('/products\/(?P<id>\d+)\/edit/', 'ProductController', 'edit');
$router->post('/products\/(?P<id>\d+)\/delete/', 'ProductController', 'delete');
$router->post('/products\/create/', 'ProductController', 'create');
//  Отзывы
$router->get('/reviews\/(?P<id>\d+)\/view/', 'ReviewController', 'view');
$router->get('/reviews\/(?P<id>\d+)\/edit/', 'ReviewController', 'edit');
$router->post('/reviews\/(?P<id>\d+)\/edit/', 'ReviewController', 'edit');
$router->post('/reviews\/(?P<id>\d+)\/delete/', 'ReviewController', 'delete');
$router->post('/reviews\/create/', 'ReviewController', 'create');
//  Пользователи
//  ...
//  Панель администратора
$router->get('/\/admin/', 'IndexController', 'admin');
//  Главная
$router->get('/\//', 'IndexController');
//  Вызов роутера
$router->execute();

?>

