<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<?php
if ($_GET['cityName']) {
    $newName = ucwords($_GET['cityName']);
    $pattern = '/\s*/m';
    $replace = '';
    $properName = preg_replace($pattern, $replace, $newName);
    $forecastPage = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$properName."&appid=4765ce9620b638f468ca87597fa0cc6f");
    $weatherArray = json_decode($forecastPage, true);
} else {
    echo '<style type="text/css"> .jumbotron {display: none;}</style>';
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
    <form method="GET">
      <div class="form-group">
        <label for="cityName">enter a city</label>
        <input type="text" class="form-control" id="cityName" name="cityName" placeholder="city"></input>
      </div>
      <button type="submit" class="btn btn-primary">check</button>
    </form>
      <div class="jumbotron">
        <h2 class="title-centered">Right now, the weather in <?php echo $newName ?> is...</h2>
        <div class="alert alert-info" role="alert">
            <?php
            if ($weatherArray != "") {
                echo $weatherArray['coord']['lon'];
                echo $weatherArray['coord']['lat'];
                echo $weatherArray['weather'][0]['id'];
                echo $weatherArray['weather'][0]['main'];
                echo $weatherArray['weather'][0]['description'];
                echo $weatherArray['weather'][0]['icon'];
                echo $weatherArray['base'];
                echo $weatherArray['main']['temp'];
            } else {
                echo "Not Available";
            }
            ?>
        </div>
      </div>
    </div>
  </div>

  <hr class="permahr">
  <script type="text/javascript" src="js/weather.js"></script>
    <?php include_once "includes/body_scripts.php"; ?>
</body>
</html>
