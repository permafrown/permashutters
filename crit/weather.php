<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<?php
if ($_GET['cityName']) {
    $newName = ucwords($_GET['cityName']);
    $pattern = '/\s*/m';
    $replace = '';
    $properName = preg_replace($pattern, $replace, $newName);
    $forecastPage = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$properName."&units=metric&appid=4765ce9620b638f468ca87597fa0cc6f");
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
                echo "<p>".$weatherArray['weather'][0]['main']."</p>";
                echo "<p>".$weatherArray['weather'][0]['description']."</p>";
                echo "<p>Currently: ".$weatherArray['main']['temp']." C</p>";
                echo "<p>High of: ".$weatherArray['main']['temp_max']." | Low of: ".$weatherArray['main']['temp_min']."</p>";
                echo "<p>Relative Humidity: ".$weatherArray['main']['humidity']."%</p>";
                echo "<hr />";
                echo "<p>Barometric Pressure: ".$weatherArray['main']['pressure']." hPa at ground level</p>";
                echo "<p>Visibility: ".$weatherArray['visiblity']." metres</p>";
                echo "<p>Wind: ".$weatherArray['wind']['speed']." m/s ".$weatherArray['wind']['deg']." degrees</p>";
                echo "<p>Clouds: ".$weatherArray['clouds']['all']."%</p>";
                echo "<hr />";
                echo "<p>".$weatherArray['name'].", ".$weatherArray['sys']['country']."</p>";
                echo "<p>".$weatherArray['coord']['lon']." degrees longitude :".$weatherArray['coord']['lat']." degrees latitude</p>";
                $checkDT = new DateTime();
                $checkDT->setTimestamp($weatherArray['dt']);
                echo "<p>".$checkDT->format('l, o-m-d @ G:i:s e P')."</p>";
                $sunriseDT = new DateTime();
                $sunriseDT->setTimestamp($weatherArray['sys']['sunrise']);
                echo "<p>Sunrise ".$sunriseDT->format('@ G:i:s e P')."</p>";
                $sunsetDT = new DateTime();
                $sunsetDT->setTimestamp($weatherArray['sys']['sunset']);
                echo "<p>Sunset ".$sunsetDT->format('@ G:i:s e P')."</p>";
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
