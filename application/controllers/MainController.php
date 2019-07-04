<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Database;

class MainController extends Controller {

    public function indexAction() {
        $db = new Database();
        $db->query('SELECT name FROM users WHERE id = 1');

        $this->view->render('Main Page');

        //можно передавать данные в функцию рендера и потом через extract($$)
//        $vars = [
//            'name' => 'Misha',
//            'age' => 21,
//        ];

//        echo '<p>Main page</p>';
//        var_dump($this->routes);
    }

}

