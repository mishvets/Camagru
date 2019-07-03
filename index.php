<?php
require 'application/lib/dev.php';

use application\core\Router;
//use application\controllers\Controller_account;
//use application\core\Route;

//функция для подключения класса
spl_autoload_register(function ($class) {
   $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

session_start();

$router = new Router();
$router->run();
?>
