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

    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            //Защита от SQL иньекции. Теперь нельзя будет просто в поле поиск по id вписать и выполнить “2; DELETE FROM users”
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
//        $query = $this->db->query($sql);
//        $result = $query->fetchColumn();
//        debug($result);
//        return $query;
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

}