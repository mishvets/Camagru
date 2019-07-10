<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    public function getPhotos() {
        $result = $this->db->row('SELECT name, photos FROM users');
        return $result;
    }
}
?>