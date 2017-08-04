<?php //include config
require_once('auth/config.php');

session_start();

//verify user logged in
if(empty($_SESSION['ulogin']))
{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/permadmin/auth/login.php');
    echo 'not logged in, bruh';
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once('../includes/head.php');?>
  <title>Admin - Edit Category</title>
</head>
<body>

<div id="wrapper">

    <?php include('menu.php');?>
    <p><a href="categories.php">Categories Index</a></p>

    <h2>Edit Category</h2>


    <?php

    //if form has been submitted process it
    if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        //collect form data
        extract($_POST);

        //very basic validation
        if($catID ==''){
            $error[] = 'This post is missing a valid id!.';
        }

        if($catTitle ==''){
            $error[] = 'Please enter the title.';
        }

        if(!isset($error)){

            try {

                $catSlug = slug($catTitle);

                //insert into database
                $stmt = $connect->prepare('UPDATE shutt_cats SET catTitle = :catTitle, catSlug = :catSlug WHERE catID = :catID') ;
                $stmt->execute(array(
                    ':catTitle' => $catTitle,
                    ':catSlug' => $catSlug,
                    ':catID' => $catID
                ));

                //redirect to index page
                header('Location: categories.php?action=updated');
                exit;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

    ?>


    <?php
    //check for any errors
    if(isset($error)){
        foreach($error as $error){
            echo $error.'<br />';
        }
    }

        try {

            $stmt = $connect->prepare('SELECT catID, catTitle FROM shutt_cats WHERE catID = :catID') ;
            $stmt->execute(array(':catID' => $_GET['id']));
            $row = $stmt->fetch();

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

    ?>

    <form action='' method='post'>
        <input type='hidden' name='catID' value='<?php echo $row['catID'];?>'>

        <p><label>Title</label><br />
        <input type='text' name='catTitle' value='<?php echo $row['catTitle'];?>'></p>

        <p><input type='submit' name='submit' value='Update'></p>

    </form>

</div>
    <?php include_once('../includes/body_scripts.php');?>
</body>
</html>
</pre>

<p>In admin/index.php the delete code on line 9 will need to include the deletion of categories added to the deleted posts in the shutt_post_cats table:</p>

<pre lang="php">
if(isset($_GET['delpost'])){

    $stmt = $connect->prepare('DELETE FROM shutt_posts WHERE postID = :postID') ;
    $stmt->execute(array(':postID' => $_GET['delpost']));

    //delete post categories.
    $stmt = $connect->prepare('DELETE FROM shutt_post_cats WHERE postID = :postID');
    $stmt->execute(array(':postID' => $_GET['delpost']));

    header('Location: index.php?action=deleted');
    exit;
}
