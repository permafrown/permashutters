<?php

require('db.php');

    if ( !empty($_POST['un']) & !empty($_POST['pw']))
        //enter users into DB
        $sql = "INSERT INTO shutt_users (uun, ulogin, upw, uemail, ureg) VALUES (:user_name, :user_login, :user_pw, :user_email, :user_reg)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':user_name', $_POST['uun']);
        $stmt->bindParam(':user_login', $_POST['ulogin']);
        $stmt->bindParam(':user_pw', $_POST['upw']);
        $stmt->bindParam(':user_email', $_POST['uemail']);
        //$stmt->bindParam(':user_reg', $_POST['ureg']);

        if( $stmt->execute() ):
            $message = ('success');
        else:
            $message = ('fail');
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
    <link rel="stylesheet" href="../../css/shutters.css">
    <link rel="stylesheet" href="../../css/shutt_page_content.css">
    <link rel="stylesheet" href="../../css/main.css">
    <title>permaREG</title>
</head>

<body>

    <h1 class="title_centered" style="margin-top: 2.5%; color: #0F0;"><small>perma</small>REG</h1>

    <form action="reg.php" method="POST">
        <input type="text" placeholder="enter your name" name="uun">
        <input type="text" placeholder="enter your username" name="ulogin">
        <input type="password" placeholder="enter p1assword" name="upw">1
        <input type="password" placeholder="confirm password" name="upw">
        <input type="email" placeholder="enter your email" name="uemail">
        <input type="email" placeholder="confirm your email" name="uemail">

        <input type="submit"><br>


    <p><a href="index.php">back</a> or <a href="login.php">login</a></p>



<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="../../js/_main.js"></script>
</body>
</html>
