<?php
	require 'config.php';
	session_destroy();

	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
?>
