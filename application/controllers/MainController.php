<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        $this->view->render('Main Page');
//        echo '<p>Main page</p>';
//        var_dump($this->routes);
    }

}

