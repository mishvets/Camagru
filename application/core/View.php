<?php

namespace application\core;

class View {

    public $path;
    public $routes;
    public $layout = 'default';

    public function __construct($routes) {
        $this->routes = $routes;
        $this->path = $this->routes['controller'].'/'.$routes['action'];
    }

    public function render($title, $vars = []) { //$vars не обязательная переменная за счет того, что инициализирована как пустой массив
        extract($vars);//позволит разложить массив на переменные
        //буферезированное считывание
        if(file_exists('application/views/'.$this->path.'.php')){
            ob_start();
            require 'application/views/'.$this->path.'.php';
            $content = ob_get_clean();
            require 'application/views/layouts/'.$this->layout.'.php';
        }
        else {
            self::errorCode(404);
//            echo 'View not found: '. $this->path;
        }
    }

    public static function errorCode($code) {
        http_response_code($code);
        if (file_exists('application/views/errors/'.$code.'.php')) {
            require 'application/views/errors/'.$code.'.php';
        }
        exit;
    }

    public function redirect($url) {
        header('Location: '.$url);
        exit;
    }

    public function message($text) {
        echo "<script type='text/javascript'>alert('$text');</script>";
    }
}
?>