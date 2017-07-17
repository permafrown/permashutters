<?php
$server = 'localhost';
$username = 'shutt_dbU';
$password = 'Joplin098*';
$database = 'testshutters_DB';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}