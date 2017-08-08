<pre><?php print_r($_POST); ?></pre>
<?php
    require_once('auth/config.php');
     ?>
<html>
<head>
    <?php include_once('../includes/head.php');?>
    <title>test input</title>
</head>
<body>
    <form method="post">
        <p>
            <input type="text" name="post_title" />
        </p>
        <p>
            <textarea name="post_content"></textarea>
        </p>
        <p>
            <label>categories</label>
            <label for="post_category">games</label>
            <input type="checkbox" name="post_category[games]" value="games" />
            <label for="post_category">fauna</label>
            <input type="checkbox" name="post_category[fauna]" value="fauna" />
        </p>
        <p>
            <input type="submit" value="submit" />
        </p>
    </form>
    <?php include_once('../includes/body_scripts.php');?>
</body>
</html>
