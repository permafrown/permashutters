<?php
session_start();

include_once("cred.php");

// Define database
define('dbhost', $DB_HOST);
define('dbuser', $DB_UN);
define('dbpass', $DB_PW);
define('dbname', $DB_NAME);

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
