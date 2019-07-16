<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function loginAction() {
        $this->view->render('Enter');

//        echo json_encode($_POST);
//
//        if (!empty($_POST)) {
//          if (!$this->model->validate($_POST)) {
////                $this->view->message($this->model->error);
//                echo ($this->model->error);
//
//            }
//            else {
//                $res = $this->model->getUsers('email', $this->model->data['email']);
//                if (empty($res)) {
//                    mail($this->model->data['email'], 'Registration Camagru', 'cool');
////                    $this->view->message("Success. Check your mailbox.");
//                    echo json_encode('Success. Check your mailbox.');
//                }
//                else {
////                  message = "This email have been already used.";
//                    echo json_encode("This email have been already used.");
//                }
//            }
//        }
////        else {
////            echo json_encode($_POST);
////        }
    }

    public function registerAction() {
        if (!isset($_POST['access'])) {
            $this->view->render('Register page');
        }
        if (!empty($_POST)) {
            if (!$this->model->validate($_POST)) {
                echo ($this->model->error);
            }
            else {
                $res = $this->model->getUsers('email', $this->model->data['email']);
                if (empty($res)) {
                    $this->model->addUser($this->model->data);
                    mail($this->model->data['email'], 'Registration Camagru', "http://localhost:8100/main/index?active_c=".$this->model->data['password_c']);
                    echo (json_encode('Success. Check your mailbox.'));
                }
                else {
                    echo json_encode('This email have been already used.');
                }
            }
        }

//        if (!empty($_GET)) {
//            $res = $this->model->getUsers('active_cod', $_GET['active_c']);
//            if (!empty($res) && !$res[0]['active']) {
//                $this->model->updateUsers('id', $res[0]['id']);
//                $this->view->redirect("/main/index");
//                $this->view->message("Success. You are active your account.");
//            }
//            else if (!empty($res) && $res[0]['active'] == 1) {
////                $this->view->redirect("/main/index");
//                $this->view->message("This account have been activated earlier.");
//            }
//        }

    }

    public function recoveryAction() {
        $this->view->render('Recovery page');

    }
}
?>