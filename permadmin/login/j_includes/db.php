<?php
// Our database class
if(!class_exists('shuttDatabase')){
	class shuttDatabase {

		/**
		 * Connects to the database server and selects a database
		 *
		 * PHP4 compatibility layer for calling the PHP5 constructor.
		 *
		 * @uses shuttDatabase::__construct()
		 *
		 */
		function shuttDatabase() {
			return $this->__construct();
		}

		/**
		 * Connects to the database server and selects a database
		 *
		 * PHP5 style constructor for compatibility with PHP5. Does
		 * the actual setting up of the connection to the database.
		 *
		 */
		function __construct() {
			$this->connect();
		}

		/**
		 * Connect to and select database
		 *
		 * @uses the constants defined in config.php
		 */
		// function connect() {
		// 	$link = mysql_connect('localhost', DB_USER, DB_PASS);
        //
		// 	if (!$link) {
		// 		die('Could not connect: ' . mysql_error());
		// 	}
        //
		// 	$db_selected = mysql_select_db(DB_NAME, $link);
        //
		// 	if (!$db_selected) {
		// 		die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
		// 	}
		// }

        function connect() {
            try {
            $conn = new PDO("mysql:host=($db_host);dbname=($db_name)", DB_USER, DB_PASS);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->query('SELECT * FROM shutt_users');

            while($row = $query->fetch(PDO::FETCH_OBJ)) {
                $results[] = $row;
            }

            print_r($results);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        }
		/**
		 * Clean the array using mysql_real_escape_string
		 *
		 * Cleans an array by array mapping mysql_real_escape_string
		 * onto every item in the array.
		 *
		 * @param array $array The array to be cleaned
		 * @return array $array The cleaned array
		 */
}
}
//Instantiate our database class
$jdb = new shuttDatabase;
?>
