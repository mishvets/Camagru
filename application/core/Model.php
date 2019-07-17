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

    public function updateUsers($set_field, $where_field, $val) {
//        $this->db->query('UPDATE users SET '.$set_field.'='.$set_val.' WHERE '.$where_field.' = :val', ['val' => $where_val]);
        $this->db->query('UPDATE users SET '.$set_field.' = :set_val WHERE '.$where_field.' = :where_val', $val);
    }
}