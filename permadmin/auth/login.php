<!DOCTYPE html>
<html>
<head>
    <?php include_once('../../includes/head.php'); ?>
    <title>permaLOGIN</title>
</head>

<body>

    <h1 class="title_centered" style="margin-top: 2.5%; color: #0F0;"><small>perma</small>LOGIN</h1>

    <form action="login.php" method="POST">
        <input type="text" placeholder="enter username" name="u/n">
        <input type="password" placeholder="enter password" name="p/w">

        <input type="submit">


    <?php include_once('../../includes/body_scripts.php'); ?>
</body>
</html>
