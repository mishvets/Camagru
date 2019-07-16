<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {

        if (!empty($_GET)) {
            $res = $this->model->getUsers('active_cod', $_GET['active_c']);
//            debug($_GET['active_c']);
            if (!empty($res) && !$res[0]['active']) {
                $this->model->updateUsers('id', $res[0]['id']);
//                $this->view->redirect("/main/index");
                $this->view->message("Success. You are active your account.");
            }
            else if (!empty($res) && $res[0]['active'] == 1) {
//                $this->view->redirect("/main/index");
                $this->view->message("This account have been activated earlier.");
            }
            else {
                $this->view->message("No users with this activation code");
            }
        }

        $result = $this->model->getUsers('active', 1);
        //можно передавать данные в функцию рендера и потом через extract($$)
        $vars = [
            'login' => $result,
        ];
        $this->view->render('Main Page', $vars);
//        $db = new Database();
//
//        $params = [
//            'id' => 2,
//             'name' => 'Ivan',
//        ];
//
//        $data = $db->column('SELECT name FROM users WHERE id = :id AND name = :name', $params);
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

