<?php

    include("functions.php");

    if ($_GET['action'] == 'loginSignup') {

        $error = "";

        if (!$_POST['email']) {
            $error = "email required...";
        } else if (!$_POST['password']) {
            $error = "password required...";
        } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $error = "Not a valid email address...";
        }

        if ($error != "") {
            echo $error;
        }

        if ($_POST['loginActive'] == "0");
            echo "Sign user up";
    }

 ?>
