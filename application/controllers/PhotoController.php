<?php

namespace application\controllers;

use application\core\Controller;

class PhotoController extends Controller {

    public function creationAction() {
        if (!isset($_POST['act'])) {
            $this->view->render('Create Photo');
        }
        else if (!empty($_POST) && $_POST['act'] === 'create') {
            if($this->model->createImg($_POST)) {
                echo (json_encode("Done!"));
                //ввод в БД;
            }
            else {
                echo (json_encode($this->model->error));
            }
        }
        else if (!empty($_POST) && $_POST['act'] === 'upload') {
//            echo "OK";
//            debug($_FILES);
            if ($this->model->uploadPhoto($_FILES)) {
                echo (json_encode("OK"));
//                echo $_FILES['upload']['tmp_name'];
                //ввод в БД;
            } else {
                echo(json_encode($this->model->error));
            }
        }
//        var_dump($_POST);
    }
}
//label, который привязан к input.
//потом идет проверка x.addElementListener('change', function)
//если там что-то поменялось, то вытягиваем файл getElemById('x').files[0]
//и потом через сорс выводим