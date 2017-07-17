<?php
/*
 * Page index.php
 * */

// Start Session
session_start();

// Database connection
require __DIR__ . '/database.php';
$db = DB();

// Application library ( with shuttLib class )
require __DIR__ . '/lib/library.php';
$app = new shuttLib();

$login_error_message = '';
$register_error_message = '';

// check Login request
if (!empty($_POST['btnLogin'])) {

    $ulogin = trim($_POST['ulogin']);
    $upassword = trim($_POST['upassword']);

    if ($ulogin == "") {
        $login_error_message = 'Username field is required!';
    } else if ($upassword == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $user_id = $app->Login($ulogin, $upassword); // check user login
        if($user_id > 0)
        {
            $_SESSION['user_id'] = $user_id; // Set Session
            header("Location: profile.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Invalid login details!';
        }
    }
}

// check Register request
if (!empty($_POST['btnRegister'])) {
    if ($_POST['uname'] == "") {
        $register_error_message = 'invalid name';
    } else if ($_POST['uemail'] == "") {
        $register_error_message = 'invalid email';
    } else if ($_POST['ulogin'] == "") {
        $register_error_message = 'invalid username';
    } else if ($_POST['upassword'] == "") {
        $register_error_message = 'invalid password';
    } else if (!filter_var($_POST['uemail'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'invalid email';
    } else if ($app->isuemail($_POST['uemail'])) {
        $register_error_message = 'invalid email';
    } else if ($app->isulogin($_POST['ulogin'])) {
        $register_error_message = 'invalid username';
    } else {
        $user_id = $app->Register($_POST['uname'], $_POST['uemail'], $_POST['ulogin'], $_POST['upassword']);
        // set session and redirect user to the profile page
        $_SESSION['user_id'] = $user_id;
        header("Location: profile.php");
    }
}
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        PHP Login Registration System with PDO Connection using SHA-256 Cryptographic Hash Algorithm to store Password
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 well">
                    <h4>Register</h4>
                    <?php
            if ($register_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $register_error_message . '</div>';
            }
            ?>
                        <form action="index.php" method="post">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="uname" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="uemail" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="ulogin" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="upassword" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="date" value="<?php echo time(); ?>" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btnRegister" class="btn btn-primary" value="Register" />
                            </div>
                        </form>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5 well">
                    <h4>Login</h4>
                    <?php
            if ($login_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
            }
            ?>
                        <form action="index.php" method="post">
                            <div class="form-group">
                                <label for="">Username/Email</label>
                                <input type="text" name="ulogin" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="upassword" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btnLogin" class="btn btn-primary" value="Login" />
                            </div>
                        </form>
                </div>
            </div>
        </div>

    </body>

    </html>