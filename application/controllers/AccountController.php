<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function loginAction() {
//        $this->view->redirect("register");
        $this->view->render('Enter');
    }

    public function registerAction() {
        if (!empty($_POST)) {
//            debug($_POST);
            if (!$this->model->validate(['login', 'email', 'password'], $_POST)) {
                $this->view->message($this->model->error);
            }
            else {
                $this->view->message("Success");
            }
        }
        $this->view->render('Register page');
    }

    public function recoveryAction() {
        $this->view->render('Recovery page');
    }
}
?>