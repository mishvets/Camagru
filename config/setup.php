<?php

include('database.php');

try {
    $this->db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
//    $this->db->query("USE camagru");
}
catch (\PDOException $e) {
    echo 'Connection fail: ' . $e->getMessage();
}

try {
    $this->db->query("USE camagru");
}
catch (\PDOException $e) {
    $this->db->query("CREATE DATABASE camagru");
    $this->db->query("USE camagru");
    echo 'Connection fail: ' . $e->getMessage();
}

$req = explode( ";".PHP_EOL, file_get_contents('application/lib/database_create.sql'));
foreach ($req as $val) {
    $this->db->query(str_replace(PHP_EOL, ' ', $val));
}

$adm = [
    "login"=>"ash",
    "email"=>"wq@lol.com",
    "password" => "qweQWE1",
    "password_c" => "qweQWE1",
];

$result = $this->db->query("SELECT * FROM users WHERE login = 'admin'");
if (empty($result->fetchAll(PDO::FETCH_ASSOC))) {
    $this->db->query("INSERT INTO users(login, email, password, code, active) VALUES ('admin', 'admin', 'admpwd', 'none', '2')");
}
?>

