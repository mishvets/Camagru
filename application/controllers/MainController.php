<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {

        if (!empty($_GET)) {
            if (isset($_GET['active_c'])) {
                $res = $this->model->getUsers('code', $_GET['active_c']);
//            debug($_GET['active_c']);
                if (!empty($res) && !$res[0]['active']) {
//                    $this->model->updateUsers('active', 1,'id', $res[0]['id']);
                    $val = [
                        'set_val' => 1,
                        'where_val' => $res[0]['id'],
                    ];
                    $this->model->updateUsers('active','id', $val);
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
            else if (isset($_GET['recover'])) {
                $res = $this->model->getUsers('code', $_GET['recover']);
                if (!empty($res) && $res[0]['active'] && $res[0]['password_r']) {
                    $val = [
                        'set_val' => $res[0]['password_r'],
                        'where_val' => $res[0]['id'],
                    ];
                    $this->model->updateUsers('password', 'id', $val);
                    $val = [
                        'set_val' => 0,
                        'where_val' => $res[0]['id'],
                    ];
                    $this->model->updateUsers('password_r', 'id', $val);
                    $this->view->message("Success. You are change your password.");
                } else if (!empty($res) && $res[0]['active'] == 1) {
//                $this->view->redirect("/main/index");
                    $this->view->message("You have not activated your account.");
                } else {
                    $this->view->message("No users with this recover code");
                }
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

