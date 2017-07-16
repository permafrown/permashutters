<?php

$server = 'localhost:3306';
$username = 'shutt_dbU';
$password = 'Joplin098*';
$database = 'testshutters_DB';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        } catch(PDOException $e) {
            die( "connection failed: " . $e->getMessage());
    }

$result = mysql_query('SELECT user_name FROM shutt_users');
if (!$result) {
    die('Could not query:' . mysql_error());
}
echo mysql_result($result, 0); // outputs first user's user_ID

?>
