<?php

    if ( !empty($_POST['u/n']) && !empty($_POST['p/w'])):
        echo $_POST['u/n'];
        die();
    endif;

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Bevan|Cinzel|Cinzel+Decorative|EB+Garamond|Lato|Libre+Baskerville|Montserrat|Overlock|Overlock+SC|Poiret+One|Roboto+Condensed|Source+Code+Pro|Source+Sans+Pro|Source+Serif+Pro|Tangerine" rel="stylesheet">
    <link rel="shortcut icon" href="../../favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/animate-master/animate.css">
    <link rel="stylesheet" href="../../css/shutters.css">
    <link rel="stylesheet" href="../../css/shutt_page_content.css">
    <link rel="stylesheet" href="../../css/main.css">
    <title>permaLOGIN</title>
</head>

<body>

    <h1 class="title_centered" style="margin-top: 2.5%; color: #0F0;"><small>perma</small>LOGIN</h1>

    <form action="login.php" method="POST">
        <input type="text" placeholder="enter username" name="u/n">
        <input type="password" placeholder="enter password" name="p/w">

        <input type="submit">

    <p><a href="index.php">back</a></p>
    <p>or</p>
    <p><a href="reg.php">register</a></p>




<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="../../js/_main.js"></script>
</body>
</html>
