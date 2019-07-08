<?php

namespace application\core;

use application\core\View;

abstract class Controller {

//    public $model;
    public $routes;
    public $view;
    public $acl;

    public function __construct($routes) {
        $this->routes = $routes;
        //$_SESSION['authorise']['id'] = 1;
        if (!$this->checkAcl()) {
            View::errorCode(403);
        }
        $this->view = new View($routes);
        $this->model = $this->loadModel($routes['controller']);
    }

    public function loadModel($name) {
        $path = 'application\models\\'.ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl() {
        if(file_exists('application/acl/'.$this->routes['controller'].'.php')){
            $this->acl = require 'application/acl/'.$this->routes['controller'].'.php';
        }
        else {
            View::errorCode(404);
        }
        //условие на каждую группу 'all', 'authorize', 'guest', 'admin'
        if ($this->isAcl('all')) {
            return true;
        }
        else if (isset($_SESSION['authorise']['id']) && $this->isAcl('authorize')) {
            return true;
        }
        else if (!isset($_SESSION['authorise']['id']) && $this->isAcl('guest')) {
            return true;
        }
        else if (isset($_SESSION['admin']['id']) && $this->isAcl('admin')) {
            return true;
        }
        return false;
    }

    public function isAcl($key) {
        return in_array($this->routes['action'], $this->acl[$key]);
    }
//    function action_index()
//    {
//    }
}
?>