<?php

    require_once("../permadmin/auth/config.php");

    	if($_POST['loginActive'] == "0") {
    		$errMsg = '';

    		$un = $_POST['email'];
    		$pw = $_POST['password'];

    		if($un == '')
    			$errMsg = 'enter name';
    		if($pw == '')
    			$errMsg = 'enter pw';

    		if($errMsg == ''){
    			try {
    				$stmt = $connect->prepare('INSERT INTO tw_users (tw_un, tw_pw) VALUES (:un, :pw)');
    				$stmt->execute(array(
    					':un' => $un,
    					':pw' => $pw,
    					));
    				header('Location: index.php');
    				exit;
    			}
    			catch(PDOException $e) {
    				echo $e->getMessage();
    			}
    		}
    	}

 ?>
