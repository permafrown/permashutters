<?php

$server = 'localhost:3306';
$username = 'permafrown_DB';
$password = 'Joplin098*34tMy@$5!';
$database = 'testshutters_DB';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password)
} catch(PDOException $e){
    die( "connection failed: " . $e->getMessage());
}

?>
