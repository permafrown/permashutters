<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php';?>
    <?php include_once 'permadmin/auth/config.php'; ?>
    <?php $postCatSel = $_GET['cat']; ?>
    <title><?php echo $postCatSel; ?> | permashutters</title>
</head>

<body>
    <h1 class="title_centered" style="margin-top: 10%; color: #0F0;"><small>permashutters</small><?php echo $postCatSel; ?></h1>
    <div class="container-fluid">
        <div class="col-xs-12">
            <a href="index.php"><img style="margin-bottom: 5%;" class="img-responsive avatar center-block title-centered" src="https://dl.dropboxusercontent.com/u/5650853/permafrown_avatar_kingdom_come_spectre.png" alt="avatar" /></a>
        </div>
    </div>
    <hr class="perma_hr">
    <div class="container-fluid shutt_page_content">
        <?php
            if (empty($postCatSel) OR $postCatSel = "all") {
                include_once 'includes/all_content.php';
            } elseif (!empty($postCatSel)) {
                include_once 'includes/shutt_content.php';
            } else {echo "<div>select a category, bruh</div>";
            }
        ?>
    </div>
    <hr class="perma_hr">

    <?php include_once 'includes/shutter_menu.php';?>
    <?php include_once 'includes/body_scripts.php';?>
</body>

<footer>
    <?php include_once 'includes/botnav.php';?>
</footer>

</html>
