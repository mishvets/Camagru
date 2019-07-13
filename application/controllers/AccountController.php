<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function loginAction() {
//        $this->view->redirect("register");
        $this->view->render('Enter');
    }

    public function registerAction() {
        $this->view->render('Register page');
        if (!empty($_POST)) {
            if (!$this->model->validate(['login', 'email', 'password', 'password_c'], $_POST)) {
                $this->view->message($this->model->error);
            }
            else {
                $res = $this->model->getUsers('email', $this->model->data['email']);
                if (empty($res)) {
                    mail($this->model->data['email'], 'Registration Camagru', 'cool');
                    $this->view->message("Success. Check your mailbox");

                }
                else {
                    $this->view->message("This email have been already used.");
                }
            }
        }
    }

    public function recoveryAction() {
        $this->view->render('Recovery page');
    }
}
?>