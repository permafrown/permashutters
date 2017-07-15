<?php

$server = 'localhost:3306';
$username = 'shutt_dbU';
$password = 'Joplin098*';
$database = 'testshutters_D';

// try{
//      $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password)
// } catch(PDOException $e){
//     die( "connection failed: " . $e->getMessage());
// }
//
//
// $mysqli = new mysqli($server, $username, $password, $database);
// $result = $mysqli->query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
// $row = $result->fetch_assoc();
// echo htmlentities($row['_message']);
//

$link = mysql_connect($server, $username, $password);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!mysql_select_db($database)) {
    die('Could not select database: ' . mysql_error());
}
// $result = mysql_query('SELECT user_name FROM shutt_users');
// if (!$result) {
//     die('Could not query:' . mysql_error());
// }
// echo mysql_result($result, 0); // outputs first user's user_ID

?>
