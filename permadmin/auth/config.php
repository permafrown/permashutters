<?php
session_start();

// Define database
define('dbhost', 'localhost');
define('dbuser', 'shutt_dbU');
define('dbpass', 'Joplin098*');
define('dbname', 'testshutters_DB');

// Connecting database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

date_default_timezone_set('American/Toronto');

?>
