<?php

namespace application\core; //пространство имен в папке в которой лежит

//use application\controllers\AccountController;
class Router {

    protected $routes = [];
    protected $params = [];

//    public function _construct() {
////        echo 'я класс';
//    }

//    public function add() {
////        echo 'я класс';
//    }
//
//    public function match() {
////        echo 'я класс';
//    }

    public function run() {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // получаем имя контроллера
        if (!empty($routes[1]))
        {
            $controller_name = ucfirst($routes[1]);
        }

        // получаем имя экшена
        if (!empty($routes[2]))
        {
            $action_name = $routes[2];
        }

        // добавляем префиксы
        $model_name = $controller_name.'Model';
        $controller_name = $controller_name.'Controller';
        $action_name = $action_name.'Action';

        // подцепляем файл с классом модели (файла модели может и не быть)

//        $model_file = strtolower($model_name).'.php';
        $model_file = $model_name.'.php';
        $model_path = "application/models/".$model_file;
//        debug($model_path);
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
//      $controller_file = strtolower($controller_name).'.php';
        $controller_file = $controller_name.'.php';
        $controller_path = "application/controllers/".$controller_file;
        $controller_class_path = str_replace('/', '\\', substr($controller_path, 0, -4));
        if(!file_exists($controller_path))
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Router::ErrorPage404();
        }
        // создаем контроллер
        $controller = new $controller_class_path(array("controller"=>$routes[1], "action"=>$action_name));
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Router::ErrorPage404();
        }
    }

    public function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
//        header('Location:'.$host.'404');
    }
}
?>