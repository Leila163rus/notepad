<?php
$host = 'localhost:3306';
$user = 'root';
$pass = '7948227';
$name = 'php';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$name;charset=$charset";

$opt = [
  PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES=>false,
];