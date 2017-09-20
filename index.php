<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'includes/head.php';?>
  <title>TESTpermashutters</title>
</head>

<body>

  <!-- START NAV -->
  <?php include_once 'includes/nav.php';?>
  <!-- END NAV -->

  <!-- MAIN TITLE -->
  <h1 class="main_title"> <span style="color: #0F0;">permashutters</span></h1>
  <h2 class="main_title tag_line">a collection of things i find interesting</h2>
  <!-- END MAIN TITLE -->

  <!-- SHUTTER MENU -->
  <hr class="perma_hr">
  <div class="column shutters">
    <a class="shutt col-xs-2 games_shutt" href="content.php?cat=games"><span class="hidden-sm-down">games</span></a>
    <a class="shutt col-xs-2 fauna_shutt" href="content.php?cat=fauna"><span class="hidden-sm-down">fauna</span></a>
    <a class="shutt col-xs-2 science_shutt" href="content.php?cat=science"><span class="hidden-sm-down">science</span></a>
    <a class="shutt col-xs-2 words_shutt" href="content.php?cat=words"><span class="hidden-sm-down">words</span></a>
    <a class="shutt col-xs-2 sundry_shutt" href="content.php?cat=sundry"><span class="hidden-sm-down">sundry</span></a>
    <a class="shutt col-xs-2 media_shutt" href="content.php?cat=media"><span class="hidden-sm-down">media</span></a>
  </div>
  <hr class="perma_hr">
  <!-- END SHUTTER MENU -->

  <!-- AVATAR -->
  <?php include_once 'includes/avatar.php';?>
  <!-- END AVATAR -->

  <!-- SCRIPTS -->
  <script src="js/jquery-3.1.1.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="js/jquery-3.1.1.min.js"><\/script>')
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/modernizr-2.7.1.min.js"></script>
  <script src="js/imagesloaded.js"></script>
  <script src="js/skrollr.js"></script>
  <script src="js/_main.js"></script>
  <script src="js/enquire.min.js"></script>
  <!-- END SCRIPTS -->

</body>

</html>
