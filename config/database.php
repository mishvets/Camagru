<?php
//$DB_DSN = 'mysql:host=localhost;dbname=db_camagru';
//$DB_DSN = 'mysql:host=localhost';
//$DB_USER = 'root';
//$DB_PASSWORD = 'mysql9';
$DB_DSN = 'mysql:host=localhost;port=3306';
$DB_USER = 'root';
$DB_PASSWORD = 'root';
$DB_OPTIONS = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);
?>

