<?php

include('database.php');

try {
    $this->db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
}
catch (\PDOException $e) {
    echo 'Connection fail: ' . $e->getMessage();
}

?>