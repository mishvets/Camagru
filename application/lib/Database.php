<?php

namespace application\lib;

use PDO;

class Database {

    protected $db;

    public function __construct() {
        $config = require 'config/database.php';
        try {
            $this->db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
        }
        catch (\PDOException $e) {
            echo 'Connection fail: ' . $e->getMessage();
        }
    }


    //
    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            //Защита от SQL иньекции. Теперь нельзя будет просто в поле поиск по id вписать и выполнить “2; DELETE FROM users”
            foreach ($params as $key => $val) {
                echo '<p>'.$key.'=>'.$val.'</p>';
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                }
                else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':'.$key, $val, $type);
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

    public function lastInsertId() {
        return $this->db->lastInsertId();
    }

}