<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<?php require_once ('perma_couch/cms.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'includes/head.php';?>
  <title>games | permashutters</title>
</head>
<body>
  <h1 class="title_centered" style="margin-top: 10%; color: #0F0;"><small>permashutters</small>games</h1>
  <div class="container-fluid">
    <div class="col-xs-12">
      <a href="index.php"><img style="margin-bottom: 5%;" class="img-responsive avatar center-block title-centered" src="https://dl.dropboxusercontent.com/u/5650853/permafrown_avatar_kingdom_come_spectre.png" alt="avatar" /></a>
    </div>
  </div>
  <hr class="perma_hr">
  <div class="container-fluid shutt_page_content">
      <div class="col-xs-12">
        <a href="https://www.youtube.com/watch?v=Kdaoe4hbMso">
          <div class="button shutt_butt" id="button001">
              <p>Far Cry 5 Announce Trailer</p>
          </div>
        </a>
        <a href="https://far-cry.ubisoft.com/game/en-ca/home/">
          <div class="button shutt_butt" id="button002">
              <p>Far Cry 5 Website</p>
          </div>
        </a>
      </div>
  </div>
  <hr class="perma_hr">
    <?php include_once 'includes/shutter_menu.php';?>
    <?php include_once 'includes/body_scripts.php';?>
</body>

<footer>
    <?php include_once 'includes/botnav.php';?>
</footer>

</html>
<?php COUCH::invoke(); ?>
