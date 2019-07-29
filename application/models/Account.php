<?php

namespace application\models;

use application\core\Model;

class Account extends Model {

    public $data;

    public function enter($post) {
        $this->data = [
            'email' => $this->test_input($post['email']),
            'password' => $this->test_input($post['password']),
        ];
        $res = $this->getUsers('email', $this->data['email']);
        if (!empty($res)) {
            if (password_verify($this->data['password'], $res[0]['password'])) {
                return true;
            }
            else {
                $this->error = 'Not correct password.';
                return false;
            }
        }
        else {
            $this->error = 'No users with this email.';
            return false;
        }
    }

    public function validate($post) {
        $this->data = [
            'email' => $this->test_input($post['email']),
            'login' => $this->test_input($post['login']),
            'password' => $this->test_input($post['password']),
            'password_c' => $this->test_input($post['password_c']),
            ];
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)){
            $this->error = 'Bad E-mail';
            return false;
        }
        else if (!preg_match('#^[a-zA-Z0-9]{3,15}$#', $this->data['login'])) {
            $this->error = 'The login must be from 3 to 15 symbols and can contain only english letter and numbers.';
            return false;
        }
        else if (stristr($this->data['login'], 'admin')) {
            $this->error = 'You are not allowed use "admin" in login.';
            return false;
        }
        else if (!preg_match('#^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#', $this->data['password'])) {
            $this->error = 'The password must be more than 6 characters and contain at least one upper case letter, one lower case letter and one number.';
            return false;
        }
        else if (strcmp($this->data['password'], $this->data['password_c'])){
            $this->error = 'Passwords are not the same.';
            return false;
        }
        return true;
    }

    public function recov($post) {
        $this->data = [
            'email' => $this->test_input($post['email']),
            'password' => $this->test_input($post['password']),
            'password_c' => $this->test_input($post['password_c']),
        ];
        $res = $this->getUsers('email', $this->data['email']);
//        debug($res);
        if (!empty($res)) {
            if (!preg_match('#^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#', $this->data['password'])) {
                $this->error = 'The password must be more than 6 characters and contain at least one upper case letter, one lower case letter and one number.';
                return false;
            }
            else if (strcmp($this->data['password'], $this->data['password_c'])){
                $this->error = 'Passwords are not the same.';
                return false;
            }
        }
        else {
            $this->error = 'No users with this email.';
            return false;
        }
        $this->data['password_c'] = bin2hex(random_bytes(32));
        $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);
//        debug($this->data);
        return $res;
    }

    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

//    public function sendMail($to, ){
//        $to=$this->model->data['email'];
//        $subject="Recover password Camagru";
////                $from = 'info@phpgang.com';
//        $body="Hi, ".$res[0]['login']." <br><br>Click here to reset your password: <br><br>http://localhost:8100/main/index?recover=".$this->model->data['password_c']."   <br/> <br/>--<br>PHPGang.com<br>Solve your problems.";
////                $headers = "From: " . strip_tags($from) . "\r\n";
////                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
//        $headers = "MIME-Version: 1.0\r\n";
//        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//        mail($to,$subject,$body,$headers);
//    }

    public function addUser($data) {
        $this->data['password_c'] = bin2hex(random_bytes(32));
        $data['password_c'] = $this->data['password_c'];
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO users(login, email, password, code) VALUES (:login, :email, :password, :password_c)", $data);
    }

//    public function updateUsers($field, $val) {
//        $this->db->query('UPDATE users SET active=1 WHERE '.$field.' = :val', ['val' => $val]);
//    }
}
?>