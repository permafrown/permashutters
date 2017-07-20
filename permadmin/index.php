<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<?php
    session_start();

//verify user logged in
    if(empty($_SESSION['ulogin']))
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/permadmin/auth/login.php');
        echo 'not logged in, bruh';
        exit;
    }

//show message from add / edit page
    if(isset($_GET['delpost'])){

    	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
    	$stmt->execute(array(':postID' => $_GET['delpost']));

    	header('Location: index.php?action=deleted');
    	exit;
    }
?>
<?php include_once('auth/config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/head.php");?>
<?php include_once("js/delpost.js");?>
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
<div class="authmenu" id=menu-wrapper>
    <?php include_once("menu.php");?>
    <?php
    //show message from add / edit page
        if(isset($_GET['action'])){
            echo '<h3>Post '.$_GET['action'].'.</h3>';
        }
    ?>
    <table>
        <tr>
            <th>title</th>
            <th>date</th>
            <th>action</th>
        </tr>
        <?php
            try {
                $stmt = $connect->query('SELECT postID, postTitle, postDate FROM shutt_posts ORDER BY postID DESC');
                while($row = $stmt->fetch()){
                    echo '<tr>';
                    echo '<td>'.$row['postTitle'].'</td>';
                    echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
                    ?>
                    <td>
                        <a href="edit-post.php?id=<?php echo $row['postID'];?>">edit</a> |
                        <a href="javascript:delpost('<?php echo row['postID'];?>','<?php echo $row['postTitle'];?>')">delete</a>
                    </td>
                    <?php
                    echo '</tr>';
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>
    </table>

    <p><a href='add-post.php'>add post</a></p>
</div>

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
