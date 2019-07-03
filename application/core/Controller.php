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
    }

//    function action_index()
//    {
//    }
}
?>