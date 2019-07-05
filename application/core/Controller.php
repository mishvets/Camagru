<?php

namespace application\core;

use application\core\View;

abstract class Controller {

//    public $model;
    public $routes;
    public $view;

    public function __construct($routes) {
        $this->routes = $routes;
        $this->view = new View($routes);
        $this->model = $this->loadModel($routes['controller']);
    }

    public function loadModel($name) {
        $path = 'application\models\\'.ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }
//    function action_index()
//    {
//    }
}
?>