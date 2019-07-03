<?php

namespace application\core;

abstract class Controller {

//    public $model;
//    public $view;
    public $routes;

    public function __construct($routes) {
//        $this->view = new View();
//        echo '<p>Hi</p>';
        $this->routes = $routes;
    }

//    function action_index()
//    {
//    }
}
?>