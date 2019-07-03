<?php

namespace application\core;

abstract class View {

    public $path;
    public $layout = default;




    public function __construct($routes) {
        $this->routes = $routes;
    }

}
?>