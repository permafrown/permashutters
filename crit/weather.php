<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<?php
if ($_GET['cityName']) {
    $newName = ucwords($_GET['cityName']);
    $pattern = '/\s*/m';
    $replace = '';
    $properName = preg_replace($pattern, $replace, $newName);
    $forecastPage = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['cityName'])."&units=metric&appid=4765ce9620b638f468ca87597fa0cc6f");
    // $forecastPage = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$properName."&units=metric&appid=4765ce9620b638f468ca87597fa0cc6f");
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
        <input type="text" class="form-control" id="cityName" name="cityName" placeholder="enter a place"></input>
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
                echo "<p>Currently: ".$weatherArray['main']['temp']." &deg;C</p>";
                echo "<p>High: ".$weatherArray['main']['temp_max']." &deg;C  Low: ".$weatherArray['main']['temp_min']." &deg;C</p>";
                echo "<p>Relative Humidity: ".$weatherArray['main']['humidity']."%</p>";
                echo "<hr />";
                echo "<p>Barometric Pressure: ".$weatherArray['main']['pressure']." hPa at ground level</p>";
                echo "<p>Visibility: ".$weatherArray['visibility']." metres</p>";
                echo "<p>Wind: ".$weatherArray['wind']['deg']."&deg; @ ".$weatherArray['wind']['speed']." m/s</p>";
                echo "<p>Cloud Coverage: ".$weatherArray['clouds']['all']."%</p>";
                echo "<hr />";
                echo "<p>".$weatherArray['name'].", ".$weatherArray['sys']['country']." | ".$weatherArray['coord']['lon']."&deg; N ".$weatherArray['coord']['lat']."&deg; W</p>";
                $sunriseDT = new DateTime();
                $sunriseDT->setTimestamp($weatherArray['sys']['sunrise']);
                echo "<p>Sunrise ".$sunriseDT->format('@ G:i:s e P')."</p>";
                $sunsetDT = new DateTime();
                $sunsetDT->setTimestamp($weatherArray['sys']['sunset']);
                echo "<p>Sunset ".$sunsetDT->format('@ G:i:s e P')."</p>";
                echo "<hr />";
                echo "<p>Snapshot taken:</p>";
                $checkDT = new DateTime();
                $checkDT->setTimestamp($weatherArray['dt']);
                echo "<p>".$checkDT->format('l, o-m-d @ G:i:s e P')."</p>";
            } else {
                echo "Not Available";
            }
            ?>
        </div>
        <div class="jumbotron">
            <div id="map"></div>
            <script>
                    var map;
                    function initMap() {
                      map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 43.7, lng: 79.42},
                        zoom: 8
                      });
                    }
              </script>
        </div>
      </div>
    </div>
  </div>

  <hr class="permahr">
  <script type="text/javascript" src="js/weather.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXUg7be7krVpJMvpOZE9lJaiQbsbtqXSc&callback=initMap" async defer></script>
  <?php include_once "includes/body_scripts.php"; ?>
</body>
</html>
