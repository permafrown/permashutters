<?php

// $server = 'localhost:3306';
// $username = 'shutt_dbU';
// $password = 'Joplin098*';
// $database = 'testshutters_DB';
$SERVER_NAME = 'localhost:3306';
/* DB Name
 * Enter the name of your database below.
 */
//define($DB_NAME, 'testshutters_DB');
$DB_NAME = 'testshutters_DB';
/* DB Username
 * Enter the username of the user with access to the database below.
 */
//define($DB_USER, 'shutt_dbU');
$DB_USER = 'shutt_dbU';
/* DB Password
 * Enter the above user's password below.
 */
//define($DB_PASS, 'Joplin098*');
$DB_PASS = 'Joplin098*';
//SALT Information

/* Site Key
 * Enter your site key below.
 */
//define($SITE_KEY, 'tIVLEabZMrxm!%4ZHJWnXAjxbPt4mYGtyb!@$%&^%VQJsxGjOIdej#OT3EhCpxqC5Bu6KSOJM$$##VJV9jLF5uWiiFXm1G');
$SITE_KEY = 'tIVLEabZMrxm!%4ZHJWnXAjxbPt4mYGtyb!@$%&^%VQJsxGjOIdej#OT3EhCpxqC5Bu6KSOJM$$##VJV9jLF5uWiiFXm1G';
/* NONCE SALT
 * Enter your NONCE SALT below.
 */
//define($NONCE_SALT, 'fxmAMC5TiY2_)(eh2DfbOOX4*&F73ldggm8KZP35N48t3OVbTaoOpaOlLydef#_+kvusgNgafnuujTPdazfzqpDy');
$NONCE_SALT = 'fxmAMC5TiY2_)(eh2DfbOOX4*&F73ldggm8KZP35N48t3OVbTaoOpaOlLydef#_+kvusgNgafnuujTPdazfzqpDy';
/* AUTH SALT
 * Enter your AUTH SALT below.
 */
//define($AUTH_SALT, 'g)(*)Um9SXCqWWvSDm6&^&k3iwMqPghWzTgqMSiy)(&*&RaAoMdbyLNuRdvH(gwL0fA7Umlmy4ZvH04r2xjp7KH2ahNNc');
$AUTH_SALT = 'g)(*)Um9SXCqWWvSDm6&^&k3iwMqPghWzTgqMSiy)(&*&RaAoMdbyLNuRdvH(gwL0fA7Umlmy4ZvH04r2xjp7KH2ahNNc';
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

//$link = mysql_connect($server, $username, $password);
$link = mysql_connect($SERVER_NAME, $DB_USER, $DB_PASS);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!mysql_select_db($database)) {
    die('Could not select database: ' . mysql_error());
}
$result = mysql_query('SELECT user_name FROM shutt_users');
if (!$result) {
    die('Could not query:' . mysql_error());
}
echo mysql_result($result, 0); // outputs first user's user_ID

?>
