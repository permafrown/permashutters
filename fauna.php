<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'includes/head.php';?>
  <?php include_once 'permadmin/auth/config.php';?>
  <title>fauna | permashutters</title>
</head>

<body>
  <h1 class="title_centered" style="margin-top: 10%; color: #0F0;"><small>permashutters</small>fauna</h1>
  <div class="container-fluid">
    <div class="col-xs-12">
      <a href="index.php"><img style="margin-bottom: 5%;" class="img-responsive avatar center-block title-centered" src="https://dl.dropboxusercontent.com/u/5650853/permafrown_avatar_kingdom_come_spectre.png" alt="avatar" /></a>
    </div>
  </div>
  <hr class="perma_hr">

  <div id="wrapper">

  		<h1>Blog</h1>
  		<hr />

  		<?php
  			try {

  				$stmt = $connect->query('SELECT postID, postTitle, postDesc, postDate FROM shutt_posts ORDER BY postID DESC');
  				while($row = $stmt->fetch()){

  					echo '<div>';
  						echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
  						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
  						echo '<p>'.$row['postDesc'].'</p>';
  						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';
  					echo '</div>';

  				}

  			} catch(PDOException $e) {
  			    echo $e->getMessage();
  			}
  		?>

  	</div>

  <?php include_once 'includes/shutter_menu.php';?>
  <?php include_once 'includes/body_scripts.php';?>
</body>

<footer>
  <?php include_once 'includes/botnav.php';?>
</footer>

</html>
