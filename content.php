<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php';?>
    <?php include_once 'permadmin/auth/config.php'; ?>
    <?php $postCatSel = $_GET['cat']; ?>
    <title>
        <?php
        if ($postCatSel === "") {
            echo "permashutters";
        } elseif ($postCatSel === "feat") {
            echo "featured | permashutters";
        } else {
            echo "$postCatSel | permashutters";
        }
        ?>
    </title>
</head>

<body>
    <h1 class="title_centered">
        <?php
            if (($postCatSel === "") OR ($postCatSel === "all")) {
                echo "<small>permashutters</small>";
            } elseif ($postCatSel ==="feat") {
                echo "<small>permashutters</small>featured";
            } else {
                echo "<small>permashutters</small>$postCatSel";
            }
        ?>
    </h1>
    <p><a href="./">home</a> | <a href="about.php">about</a>
      <?php if ($postCatSel === "games") {
        echo ' | <a href="./crit/playGames.php">play games</a>';
      }
      ?>
    </p>
    <hr class="perma_hr">
    <div class="container-fluid shutt_page_content">
        <?php
            if (($postCatSel === "") OR ($postCatSel === "all")) {
                include_once 'includes/all_content.php';
            } elseif ($postCatSel === "feat") {
                include_once 'includes/feat_content.php';
            } elseif ($postCatSel === "gerbil") {
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/crit/gerbil.php');
                exit;
            } elseif ($postCatSel === "test") {
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/crit/test.php');
                exit;
            } elseif (($postCatSel === "games") OR
                    ($postCatSel === "fauna") OR
                    ($postCatSel === "science") OR
                    ($postCatSel === "words") OR
                    ($postCatSel === "sundry") OR
                    ($postCatSel === "media")) {
                include_once 'includes/shutt_content.php';
            } else {
                echo "<h3>$postCatSel hain't a category, bruh</h3>
                <h3>choose one below</h3>";
            }
        ?>
    </div>
    <hr class="perma_hr">

    <?php include_once 'includes/shutter_menu.php';?>

    <?php include_once 'includes/avatar.php';?>

    <?php include_once 'includes/body_scripts.php';?>
</body>

</html>
