<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {
//можно передавать данные в функцию рендера и потом через extract($$)
//        $vars = [
//            'name' => 'Misha',
//            'age' => 21,
//        ];
        $this->view->render('Main Page');
//        echo '<p>Main page</p>';
//        var_dump($this->routes);
    }

}

