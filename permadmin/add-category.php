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
    <title>admin - add cat</title>
</head>
<body>

<div id="wrapper">

    <?php include('menu.php');?>
    <p><a href="categories.php">Categories Index</a></p>

    <h2>Add Category</h2>

    <?php

    //if form has been submitted process it
    if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        //collect form data
        extract($_POST);

        //very basic validation
        if($catTitle ==''){
            $error[] = 'Please enter the Category.';
        }

        if(!isset($error)){

            try {

                // $catSlug = slug($catTitle);

                //insert into database
                $stmt = $connect->prepare('INSERT INTO shutt_cats (catTitle,catSlug) VALUES (:catTitle, :catSlug)') ;
                $stmt->execute(array(
                    ':catTitle' => $catTitle,
                    ':catSlug' => $catSlug
                ));

                //redirect to index page
                header('Location: categories.php?action=added');
                exit;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

    //check for any errors
    if(isset($error)){
        foreach($error as $error){
            echo '<p class="error">'.$error.'</p>';
        }
    }
    ?>

    <form action='' method='post'>

        <p><label>Title</label><br />
        <input type='text' name='catTitle' value='<?php if(isset($error)){ echo $_POST['catTitle'];}?>'></p>

        <p><input type='submit' name='submit' value='Submit'></p>

    </form>
        <?php include_once('../includes/body_scripts.php');?>

    </body>
    </html>
