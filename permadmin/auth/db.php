<?php

$server = 'localhost:3306';
$username = 'shutt_dbU';
$password = 'Joplin098*';
$database = 'testshutters_DB';

// try{
//      $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password)
// } catch(PDOException $e){
//     die( "connection failed: " . $e->getMessage());
// }


$mysqli = new mysqli($server, $username, $password, $database);
$result = $mysqli->query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
$row = $result->fetch_assoc();
echo htmlentities($row['_message']);

?>
