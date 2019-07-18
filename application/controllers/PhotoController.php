<?php

namespace application\controllers;

use application\core\Controller;

class PhotoController extends Controller {

    public function creationAction() {
        $this->view->render('Create Photo');
    }

}

