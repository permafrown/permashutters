<?php

$server = 'localhost:3306';
$username = 'shutt_dbU'@'localhost';
$password = 'Joplin098*';
$database = 'testshutters_DB';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password)
} catch(PDOException $e){
    die( "connection failed: " . $e->getMessage());
}

?>
