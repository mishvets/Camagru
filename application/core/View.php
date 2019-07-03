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

    public function render($title, $vars = []) {

        //буферезированное считывание
        if(file_exists('application/views/'.$this->path.'.php')){
            ob_start();
            require 'application/views/'.$this->path.'.php';
            $content = ob_get_clean();
            require 'application/views/layouts/'.$this->layout.'.php';
        }
        else {
            echo 'View not found: '. $this->path;
        }
    }
}
?>