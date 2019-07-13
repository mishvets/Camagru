<?php

namespace application\models;

use application\core\Model;

class Account extends Model {

    public $data;

    public function validate($input, $post) {
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
        else if (!preg_match('#^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#', $this->data['password'])) {
            $this->error = 'The password must be more than 6 characters and contain at least one upper case letter, one lower case letter and one number.';
            return false;
        }
        else if (strcmp($this->data['password'], $this->data['password_c'])){
            $this->error = 'Passwords are not the same.';
            return false;
        }
//        if (!mail($this->data['email'], 'Sub', 'lol')) {
//            $this->error = 'not send';
//            return false;
//        }
        return true;
    }

    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getUsers($field, $val) {
//        debug('SELECT id FROM users WHERE '.$field.' = :val');
        $result = $this->db->row('SELECT id FROM users WHERE '.$field.' = :val', ['val' => $val]);
        return $result;
    }
}
?>