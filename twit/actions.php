<?php
    // require_once("../permadmin/auth/config.php");
    include("functions.php");

    // if ($_GET['action'] == 'loginSignup') {
    //
    //     $error = "";
    //
    //     if (!$_POST['email']) {
    //         $error = "email required...";
    //     } else if (!$_POST['password']) {
    //         $error = "password required...";
    //     } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    //         $error = "Not a valid email address...";
    //     }
    //
    //     if ($_POST['loginActive'] == "0") {
    //         console.log("login Active");
    //     };
    //
    //     if ($error != "") {
    //         echo $error;
    //         exit()
    //     }
    //
    // }

    if($_GET['action'] == 'loginSignup') {
        $error = '';

        $un = $_POST['email'];
        $pw = $_POST['password'];

        if($un == '')
            $error = 'enter email';
        if($pw == '')
            $error = 'enter pw';

        if($error == ''){
            $query = $con->prepare("SELECT * FROM tw_users WHERE tw_un = ?");
            $query->bindValue(1, $un);
            $query->execute();

            if($query->rowCount() > 0) {
                $error = 'user exists...';
                exit();
            } else {
                echo 'email OK!!';
            }
            // try {
            //     $stmt = $connect->prepare('INSERT INTO tw_users (tw_un, tw_pw) VALUES (:un, :pw)');
            //     $stmt->execute(array(
            //         ':un' => $un,
            //         ':pw' => $pw,
            //         ));
            //     header('Location: index.php');
            //     exit;
            // }
            // catch(PDOException $e) {
            //     echo $e->getMessage();
            // }
        } else {
            echo $error;
            exit();
        }
    }



 ?>
