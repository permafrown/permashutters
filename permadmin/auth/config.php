<?php
session_start();

// Define database
define('dbhost', 'localhost');
define('dbuser', '');
define('dbpass', '');
define('dbname', '');

// Connecting database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

date_default_timezone_set('American/Toronto');

include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/functions.php");

?>
