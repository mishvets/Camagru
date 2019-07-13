<?php

namespace application\models;

use application\core\Model;

class Account extends Model {

    public function validate($input, $post) {

        $this->data = ;
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
            $this->error = 'Bad E-mail';
            return false;
        }
        else if (!preg_match('#^[a-z0-9]{3,15}$#', $post['login'])) {
            $this->error = 'The login must be from 3 to 15 symbols and can contain only english letter and numbers.';
            return false;
        }
        else if (!preg_match('#^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#', $post['password'])) {
            $this->error = 'The password must be more than 6 characters and contain at least one upper case letter, one lower case letter and one number.';
            return false;
        }
        else if (strcmp($post['password'], $post['password_c'])){
            $this->error = 'Passwords are not the same.';
            return false;
        }
        if (!mail('shmisha@i.ua', 'Sub', 'lol')) {
            $this->error = 'not send';
            return false;
        }
        debug($post);
        return true;
    }
}
?>