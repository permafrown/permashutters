<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <?php include_once '../includes/head.php';?>
    <?php include_once '../permadmin/auth/config.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/weather.css" />
  <title>weather | permashutters</title>
</head>
<body>
  <h1 class="title-centered">weather | permashutters</h1>
  <hr class="permahr">
  <div class="container">
    <div class="row">
      <h2 class="title-centered">what's the weather?</h2>
    </div>
    <div class="row">
      <p>enter your city name</p>
    </div>
    <div class="row">
      <form action="#" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" id="cityName" name="cityName" placeholder="city"></input>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">check</button>
      </form>
    </div>
    <div class="row">
      <div class="jumbotron">
        <p>content</p>
      </div>
    </div>
  </div>

  <hr class="permahr">
    <?php include_once "includes/body_scripts.php"; ?>
</body>
</html>
