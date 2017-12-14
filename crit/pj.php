<!-- Copyright 2017. GoodLife Music Ltd.. All Rights Reserved. -->
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

  <button class="btn btn-outline-light" id="pj_addNew">Add New</button>
  <button class="btn btn-outline-light" id="pj_delete">Delete</button>


  <hr class="permahr">
  <div class="container-fluid">
      <div class="col-xs-12">
          <a href="index.php"><img class="img-responsive avatar center-block title-centered" src="../img/permavatar.png" alt="avatar" /></a>
      </div>
  </div>
  <hr class="permahr">

  <script type="text/javascript" src="js/pj.js">

  </script>
  <?php include_once "includes/body_scripts.php"; ?>
</body>
</html>
