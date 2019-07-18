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
                    $to=$this->model->data['email'];
                    $subject="Registration Camagru";
                    $body="Hi, ".$this->model->data['login']." <br><br>Click here to activate your account: <br><br>http://localhost:8100/main/index?active_c=".$this->model->data['password_c'];
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                    mail($to,$subject,$body,$headers);
//                    mail($this->model->data['email'], 'Registration Camagru', "http://localhost:8100/main/index?active_c=".$this->model->data['password_c']);

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

                $to=$this->model->data['email'];
                $subject="Recover password Camagru";
                $body="Hi, ".$res[0]['login']." <br><br>Click here to reset your password: <br><br>http://localhost:8100/main/index?recover=".$this->model->data['password_c'];
                $from = 'mshvets@e1r1p6.unit.ua';
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
//                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                mail($to,$subject,$body,$headers);
//                mail($this->model->data['email'], 'Recover password Camagru', "Hi ".$res[0]['login'].". Reset your password, and we'll get you on your way. To change your Camagry password, click the link below: http://localhost:8100/main/index?recover=".$this->model->data['password_c']);

                echo (json_encode('Success. Check your mailbox.'));
            }
        }

    }
}
?>