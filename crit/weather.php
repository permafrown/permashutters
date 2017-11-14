<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <?php include_once '../includes/head.php';?>
    <?php include_once '../permadmin/auth/config.php'; ?>
  <title>weather | permashutters</title>
</head>
<body>
  <h1 class="title-centered">weather | permashutters</h1>
  <hr class="permahr">
  <div class="container">
    <h2 class="title-centered">what's the weather?</h2>
    <p>enter your city name</p>
    <form action="#" method="POST">
      <input type="text" name="cityName" placeholder="city"></input>
      <input type="submit" name="submit">check</input>
    </form>
  </div>

  <hr class="permahr">
    <?php include_once "includes/body_scripts.php"; ?>
</body>
</html>
