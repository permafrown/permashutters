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
  <div class="container-fluid shutt_page_content">
      <div class="row d-inline-flex">
          <?php
          $postCatSel = "games";
          try {
              $stmt = $connect->query('SELECT postID, postTitle, postSlug, postImg, postLink, postLinkText, postFeat, postCat, postDesc, postDate ' .
              'FROM shutt_posts ' .
              'WHERE postCat = '$postCatSel' ' .
              'ORDER BY postDate DESC');
              // $stmt->bindParam(':postCatSel', $postCatSel, PDO::PARAM_STR);
              while($row = $stmt->fetch()){
                  echo '<div class="col">';
                      echo '<div class="card">';
                          echo '<div>' . $postCatSel . '</div>';
                          if (($row['postFeat']) != 0) {
                                  echo '<div class="card-header">perma-featured</div>';
                              } else {echo '<div></div>';}
                          echo '<p>Posted on '.date('Y-m-d @ H:i:s', strtotime($row['postDate'])).' in ' .$row['postCat'].'</p>';
                          if (!empty($row['postImg'])) {
                                  echo '<img class="card-img-top" src="'.$row['postImg'].'" alt="'.$row['postTitle'].' image" />';
                              } else {echo '<div></div>';}
                          echo '<div class="card-block">';
                              echo '<h3 class="card-title"><a href="viewpost.php?id='.$row['postSlug'].'">'.$row['postTitle'].'</a></h3>';
                              echo '<p class="card-text">'.$row['postDesc'].'</p>';
                          echo '</div>';
                          if (!empty($row['postLink'])) {
                                  echo '<div class="card-block">';
                                      echo '<a href="'.$row['postLink'].'" class="card-link" target="_blank">'.$row['postLinkText'].'</a>';
                                  echo '</div>';
                              } else {echo '<div></div>';}
                          if (($row['postFeat']) != 0) {
                                  echo '<div class="card-footer text-muted">this has been perma-featured</div>';
                              } else {echo '<div></div>';}
                      echo '</div>';
                  echo '</div>';
              }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
          ?>
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
