<?php


namespace application\core;


use application\lib\Database;

abstract class Model {

    public $db;

    public function __construct() {
        $this->db = new Database();
    }
}