<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<?php
if ($_GET['cityName']) {
    $forecastPage = file_get_contents("https://www.weather-forecast.com/locations/".$_GET['cityName']."/forecasts/latest");
}

?>
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
    <h2 class="title-centered">what's the weather?</h2>
    <form action="#" method="GET">
      <div class="form-group">
        <label for="cityName">enter a city</label>
        <input type="text" class="form-control" id="cityName" name="cityName" placeholder="city"></input>
      </div>
      <button type="submit" class="btn btn-primary">check</button>
    </form>
    <div class="jumbotron">
        <?php $forecastPage ?>
    </div>
  </div>

  <hr class="permahr">
    <?php include_once "includes/body_scripts.php"; ?>
</body>
</html>
