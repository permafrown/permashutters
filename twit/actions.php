<?php
    require_once("../permadmin/auth/config.php");
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

        if ($_POST['loginActive'] == "0") {
            try {
                $stmt = $query->prepare("SELECT * FROM tw_users WHERE tw_un = '". mysqli_real_escape_string($connect, $_POST['email'].)"' LIMIT 1");
                $stmt->execute(array(
                    ':un' => $un
                    ));
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0) {
                    $error = "That email address already exists..."
                }
                exit;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        };

        if ($error != "") {
            echo $error;
            exit()
        }

    }

 ?>
