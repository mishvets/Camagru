<?php


namespace application\core;


use application\lib\Database;

abstract class Model {

    public $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUsers($field, $val) {
        $result = $this->db->row('SELECT * FROM users WHERE '.$field.' = :val', ['val' => $val]);
        return $result;
    }

    public function updateUsers($field, $val) {
        $this->db->query('UPDATE users SET active=1 WHERE '.$field.' = :val', ['val' => $val]);
    }
}