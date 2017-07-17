<?php
/*
 * db config
 */

// database Connection variables
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'shutt_dbU'); // Database user. ex. root ( if your on local server)
define('PASSWORD', 'Joplin098*'); // Database user password  (if password is not set for user then keep it empty )
define('DATABASE', 'testshutters_DB'); // Database Database name

function DB()
{
    try {
        $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
        return $db;
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}
?>