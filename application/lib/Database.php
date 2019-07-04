<?php

namespace application\lib;

use PDO;

class Database {

    protected $db;

    public function __construct() {
        $config = require 'config/database.php';
//        debug($DB_DSN);
        $this->db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
    }

    public function query($sql) {
        $query = $this->db->query($sql);
        $result = $query->fetchColumn();
        debug($result);
    }

    ошибки!!!
    public row($sql) {
        $result = $this->query($sql);
        return $result->fetchAll();
    }

public row($sql) {
$result = $this->query($sql);
return $result->fetchAll();
}

}