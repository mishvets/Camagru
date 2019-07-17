<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function loginAction()
    {
        if (!isset($_POST['access'])) {
            $this->view->render('Enter');
        }
        if (!empty($_POST)) {
            if ($this->model->enter($_POST)) {
                echo("OK");
            } else {
                echo($this->model->error);
            }
        }
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
    }

    public function recoveryAction() {
        if (!isset($_POST['access'])) {
            $this->view->render('Recovery page');
        }
        if (!empty($_POST)) {
            if (!($res = $this->model->recov($_POST))) {
                echo ($this->model->error);
            }
            else {
                $val = [
                    'set_val' => $this->model->data['password_c'],
                    'where_val' => $res[0]['id'],
                ];
                $this->model->updateUsers('code', 'id', $val);
                $val = [
                    'set_val' => $this->model->data['password'],
                    'where_val' => $res[0]['id'],
                ];
                $this->model->updateUsers('password_r', 'id', $val);
                mail($this->model->data['email'], 'Recover password Camagru', "Hi ".$res[0]['login'].". Reset your password, and we'll get you on your way. To change your Camagry password, click the link below: http://localhost:8100/main/index?recover=".$this->model->data['password_c']);
                echo (json_encode('Success. Check your mailbox.'));
            }
        }

    }
}
?>