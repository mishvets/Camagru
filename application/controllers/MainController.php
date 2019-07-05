<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        $result = $this->model->getPhotos();
        //можно передавать данные в функцию рендера и потом через extract($$)
        $vars = [
            'photos' => $result,
        ];
        $this->view->render('Main Page', $vars);
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

