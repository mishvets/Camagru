<?php

namespace application\controllers;

use application\core\Controller;

class PhotoController extends Controller {

    public function creationAction() {
        if (!isset($_POST['access'])) {
            $this->view->render('Create Photo');
        }
        else if (!empty($_POST)) {
            if($this->model->createImg($_POST)) {
                echo "Done!";
                //ввод в БД;
            }
            else {
                echo ($this->model->error);
            }
        }
//        if (!empty($_FILE)) {
            echo "OK";
//            debug($_FILES);
            if ($this->model->uploadPhoto($_FILES)) {
                echo $_FILES['upload']['tmp_name'];
                //ввод в БД;
            } else {
                echo($this->model->error);
            }
        }
//    }

}


//label, который привязан к input.
//потом идет проверка x.addElementListener('change', function)
//если там что-то поменялось, то вытягиваем файл getElemById('x').files[0]
//и потом через сорс выводим