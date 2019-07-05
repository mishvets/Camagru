<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Database;

class MainController extends Controller {

    public function indexAction() {
        $this->view->render('Main Page');
//        $db = new Database();
//
//        $params = [
//            'id' => 2,
//        ];
//
//        $data = $db->column('SELECT name FROM users WHERE id = :id', $params);
//        debug($data);


        //можно передавать данные в функцию рендера и потом через extract($$)
//        $vars = [
//            'name' => 'Misha',
//            'age' => 21,
//        ];

//        echo '<p>Main page</p>';
//        var_dump($this->routes);
    }

}

