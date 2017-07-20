<?php
    session_start();
    if(empty($_SESSION['ulogin']))
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/permadmin/auth/login.php');
        echo 'not logged in, bruh';
        exit;
    }
?>
<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/head.php");?>
    <title>ADMINTESTpermashutters</title>
</head>
<body>

<!-- MAIN TITLE -->
    <h1 class="title_centered" style="margin-top: 2.5%; color: #8e44ad;text-shadow: 4px 4px 2px rgba(0, 255, 0, 0.5);">permADMIN</h1>
<!-- END MAIN TITLE -->

<!-- WELCOME -->

<h2 class="submenu">
    <?php
    echo ($_SESSION['ulogin']);
    ?>
</h2>
<h2 class="submenu">
    <?php
    echo date(DATE_RFC7231);
    ?>
</h2>
<h2 class="submenu">
    <?php
    echo 'america/toronto';
    ?>
</h2>
<h2 class="submenu">
    <?php
    echo time();
    ?>
</h2>

<!-- END WELCOME -->
<!-- LARGE SCREEN SUBMENU -->
    <hr class="permahr hidden-sm-down">
    <h2 class="submenu hidden-sm-down"><a href="../index.php">home</a> | <a href="../games.php">games</a> | <a href="../fauna.php">fauna</a> | <a href="../science.php">science</a> | <a href="../words.php">words</a> | <a href="../sundry.php">sundry</a> | <a href="../media.php">media</a> | <a href="../about.php">about</a> | <a href="auth/logout.php">logout</a></h2>
    <hr class="permahr hidden-sm-down">
<!-- END LARGE SCREEN SUBMENU -->
<!-- CMS -->
<h2 class="title_centered">
    <?php
        if(isset($errMsg)){
            echo '<div style="color:#FF0000;text-align:center;font-size:18px;">'.$errMsg.'</div>';
        }
    ?>
    <?php
        if ( !empty ( $_GET )) {
            $post = $_GET['p'];
            $cat = $_GET['cat'];
        }
        if ( empty ( $post ) && empty ( $cat) ) {
            echo 'home';
        } elseif ( !empty ( $post )) {
            echo 'single post page';
        } elseif ( !empty ( $cat )) {
            echo 'category page';
        }
    ?>
</h2>
<p class="submenu">UNIX time | <?php echo time(); ?> </p>

<!-- END CMS -->
<!-- SMALL SCREEN SUBMENU -->
    <hr class="permahr hidden-md-up">
    <h2 class="submenu hidden-md-up"><a href="../index.php">home</a></h2>
    <h2 class="submenu hidden-md-up"><a href="../about.php">about</a></h2>
    <h2 class="submenu hidden-md-up"><a href="auth/logout.php">logout</a></h2>
    <hr class="permahr hidden-md-up">
<!-- END SMALL SCREEN SUBMENU -->

<!-- SCRIPTS -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/body_scripts.php");?>

<!-- END SCRIPTS -->

</body>
</html>
