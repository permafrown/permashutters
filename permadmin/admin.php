<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Bevan|Cinzel|Cinzel+Decorative|EB+Garamond|Lato|Libre+Baskerville|Montserrat|Overlock|Overlock+SC|Poiret+One|Roboto+Condensed|Source+Code+Pro|Source+Sans+Pro|Source+Serif+Pro|Tangerine" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/animate-master/animate.css">
    <link rel="stylesheet" href="../css/shutters.css">
    <link rel="stylesheet" href="../css/shutt_page_content.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>TESTpermashuttersADMIN</title>
</head>
<body>

<!-- MAIN TITLE -->
    <h1 class="title_centered" style="margin-top: 2.5%; color: #0F0;">permADMIN</h1>
<!-- END MAIN TITLE -->

<!-- LARGE SCREEN SUBMENU -->
    <hr class="permahr hidden-sm-down">
    <h2 class="submenu hidden-sm-down"><a href="../index.php">home</a> | <a href="../games.php">games</a> | <a href="../fauna.php">fauna</a> | <a href="../science.php">science</a> | <a href="../words.php">words</a> | <a href="../sundry.php">sundry</a> | <a href="../media.php">media</a> | <a href="../about.php">about</a></h2>
    <hr class="permahr hidden-sm-down">
<!-- END LARGE SCREEN SUBMENU -->
<!-- CMS -->
<?php
    if ( !empty ( $_GET )) {
    $post = $_GET['p'];
    $cat = $_GET['cat'];
    }

    echo $post;

?>
<!-- END CMS -->
<!-- SMALL SCREEN SUBMENU -->
    <hr class="permahr hidden-md-up">
    <h2 class="submenu hidden-md-up"><a href="../index.php">home</a></h2>
    <h2 class="submenu hidden-md-up"><a href="../about.php">about</a></h2>
    <hr class="permahr hidden-md-up">
<!-- END SMALL SCREEN SUBMENU -->

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="../js/_main.js"></script>

<!-- END SCRIPTS -->

</body>
</html>
