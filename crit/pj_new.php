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
  <a class="btn btn-outline-light" id="pj_back" href="pj.php">Back</a>
  <hr class="permahr">

  <?php

  //if form has been submitted process it
  if(isset($_POST['pj_submit'])){

      $_POST = array_map( 'stripslashes', $_POST );

      //collect form data
      extract($_POST);

      //very basic validation
      if($pj_notes ==''){
          $error[] = 'Please enter some notes.';
      }

      if($pj_mins ==''){
          $error[] = 'Please enter the number of minutes.';
      }

      if(!isset($error)){

          try {

              //insert into database
              $stmt = $connect->prepare('INSERT INTO prayer_journal (pj_date, pj_mins, pj_notes) VALUES (:pj_date, :pj_mins, :pj_notes)') ;
              $stmt->execute(array(
                  ':pj_date' => date('Y-m-d H:i:s'),
                  ':pj_mins' => $pj_mins,
                  ':pj_notes' => $pj_notes,
              ));

              //redirect to index page
              header('Location: pj.php?action=added');
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
    <p>
        <?php
        if (!empty($_POST)) {
            print_r($_POST);
        }

         ?>
    </p>

    <?php
        if($_GET[action] == "added") {
            echo '<p class="error">New entry successfully added!</p>';
        }
     ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="pj_date_input">Date for new Entry</label>
            <input type="datetime" class="form-control" id="pj_date_input" name="pj_date" placeholder="<?php echo date('Y-m-d H:i:s') ?>"
                value="<?php echo date('Y-m-d H:i:s') ?>" required>
        </div>
        <div class="form-group">
            <label for="pj_mins_input">Number of Minutes Spent</label>
            <input type="number" class="form-control" id="pj_mins_input" name="pj_mins" placeholder="20" value="20" required />
        </div>
        <div class="form-group">
            <label for="pj_notes_input">Notes</label>
            <textarea class="form-control" id="pj_notes_input" rows="3" name="pj_notes" placeholder="Please add notes here..." required>
                <?php if(isset($error)){ echo $_POST['pj_notes'];}?>
            </textarea>
        </div>
        <button type="submit" class="btn btn-outline-light" name="pj_submit" value="submit">submit</button>
    </form>


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
