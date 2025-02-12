<?php
$host = '';
$user = '';
$pass = '';
$name = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$name;charset=$charset";

$opt = [
  PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES=>false,
];
