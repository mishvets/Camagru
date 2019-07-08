<?php

namespace application\models;

use application\core\Model;

class Account extends Model {

    public function validate($input, $post) {
//        $rules = [
//            'email' => [
////                'pattern' => "/^((\"[^\"\f\n\r\t\v\b]+\")|([\w\!\#\$\%\&\\'\*\+\-\~\/\^\`\|\{\}]+(\.[\w\!\#\$\%\&\\'\*\+\-\~\/\^\`\|\{\}]+)*))@((\[(((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9])))\])|(((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9])))|((([A-Za-z0-9\-])+\.)+[A-Za-z\-]+))$/D",
//                'pattern' => '/@/',
//                'message' => 'Bad E-mail',
//                ],
//            'login' => [
//                'pattern' => '#^[a-z0-9]{3,15}$#',
//                'message' => 'The login must be from 3 to 15 symbols and can contain only english letter and numbers.',
//                ],
//            'password' => [
////                'pattern' => '#A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[a-z])(?=[-_a-zA-Z0-9]*?[0-9])[-_a-zA-Z0-9]{6,}z#',//Текстовое поле должно содержать как минимум один символ верхнего регистра, один нижнего регистра и одну цифру.
//                'pattern' => '#^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#',
//                'message' => 'The password must be more than 6 characters and contain at least one upper case letter, one lower case letter and one number.',
//                ],
//            ];
//        foreach ($input as $val) {
////            //Удаляет экранирование символов
////            $post[$val] = stripslashes($post[$val]);
////            //Преобразует специальные символы в HTML сущности
////            $post[$val] = htmlspecialchars($post[$val]);
////            $post[$val] = trim($post[$val]);
//            if (!preg_match($rules[$val]['pattern'], $post[$val])) {
//                $this->error = $rules[$val]['message'];
//                return false;
//            }
//        }
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
        debug($post);
        return true;
    }
}
?>