<!-- Copyright 2017. GoodLife Music Ltd.. All Rights Reserved. -->
<?php //include config
require_once('../permadmin/auth/config.php');

session_start();

//verify user logged in
if(empty($_SESSION['ulogin']))
{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/permadmin/auth/login.php');
    echo 'not logged in, bruh';
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <?php include_once '../includes/head.php';?>
  <?php include_once '../permadmin/auth/config.php'; ?>
  <link rel="stylesheet" href="css/pj.css">
  <title>prayer journal | permashutters</title>
</head>
<body>
  <h1 class="title-centered">prayer journal | permashutters</h1>

  <hr class="permahr">
  <button class="btn btn-outline-light" id="pj_addNew">Add New</button>
  <button class="btn btn-outline-light" id="pj_delete">Delete</button>
  <hr class="permahr">

  <?php

  //if form has been submitted process it
  if(isset($_POST['submit'])){

      $_POST = array_map( 'stripslashes', $_POST );

      //collect form data
      extract($_POST);

      //very basic validation
      if($postTitle ==''){
          $error[] = 'Please enter the title.';
      }

      if($postDesc ==''){
          $error[] = 'Please enter the description.';
      }

      if($postCont ==''){
          $error[] = 'Please enter the content.';
      }

      if(!isset($error)){

          try {

              $postSlug = slug($postTitle);

              //insert into database
              $stmt = $connect->prepare('INSERT INTO shutt_posts (postTitle,postSlug,postImg,postLink,postLinkText,postFeat,postCat,postDesc,postCont,postDate) VALUES (:postTitle, :postSlug, :postImg, :postLink, :postLinkText, :postFeat, :postCat, :postDesc, :postCont, :postDate)') ;
              $stmt->execute(array(
                  ':postTitle' => $postTitle,
        ':postSlug' => $postSlug,
        ':postImg' => $postImg,
        ':postLink' => $postLink,
        ':postLinkText' => $postLinkText,
        ':postFeat' => $postFeat,
        ':postCat' => $postCat,
                  ':postDesc' => $postDesc,
                  ':postCont' => $postCont,
                  ':postDate' => date('Y-m-d H:i:s')
              ));

              //redirect to index page
              header('Location: index.php?action=added');
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


  <hr class="permahr">
  <div class="container-fluid">
      <div class="col-xs-12">
          <a href="index.php"><img class="img-responsive avatar center-block title-centered" src="../img/permavatar.png" alt="avatar" /></a>
      </div>
  </div>
  <hr class="permahr">

  <script type="text/javascript" src="js/pj.js"></script>
  <?php include_once "../includes/body_scripts.php"; ?>
</body>
</html>
