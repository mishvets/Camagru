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
    }
}
?>