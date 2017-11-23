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
                echo "<p>".$weatherArray['name'].", ".$weatherArray['country']."</p>";


                echo "Longitude: ".$weatherArray['coord']['lon']." degrees longitude\n";
                echo "Latitude: ".$weatherArray['coord']['lat']." degrees latitude\n";
                echo "ID: ".$weatherArray['weather'][0]['id']."\n<br />";
                echo "Main: ".$weatherArray['weather'][0]['main']."\n";
                echo "Description: ".$weatherArray['weather'][0]['description']."\n<br />";
                echo "Icon: ".$weatherArray['weather'][0]['icon']."\n";
                echo "Base: ".$weatherArray['base']."\n<br />";
                echo "Temp: ".$weatherArray['main']['temp']." C\n";
                echo "Pressure: ".$weatherArray['main']['pressure']." hPa at ground level\n";
                echo "Humidity: ".$weatherArray['main']['humidity']."%\n";
                echo "Min Temp: ".$weatherArray['main']['temp_min']." C\n";
                echo "Max Temp: ".$weatherArray['main']['temp_max']." C\n<br />";
                echo "Visibility: ".$weatherArray['visiblity']." metres\n";
                echo "Wind Speed: ".$weatherArray['wind']['speed']." m/s\n";
                echo "Wind Degrees: ".$weatherArray['wind']['deg']." m/s\n<br />";
                echo "Clouds: ".$weatherArray['clouds']['all']."%\n";
                echo "UNIX DateTime of Calculation: ".$weatherArray['dt']."\n<br />";
                echo "Country Code: ".$weatherArray['sys']['country']." \n";
                echo "UNIX Sunrise: ".$weatherArray['sys']['sunrise']." UTC\n";
                echo "UNIX Sunset: ".$weatherArray['sys']['sunset']." UTC\n<br />";
                echo "City ID: ".$weatherArray['id']." \n<br />";
                echo "City Name: ".$weatherArray['name']." \n<br />";

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
