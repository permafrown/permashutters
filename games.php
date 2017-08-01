<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php';?>
    <?php include_once 'permadmin/auth/config.php'; ?>
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
        <div class="row d-inline-flex">
        <!-- <div class="row justify-content-center align-items-center"> -->
            <!-- <div class="col-xs-5"> -->

            <?php
              try {

                $stmt = $connect->query('SELECT postID, postTitle, postImg, postDesc, postDate FROM shutt_posts ORDER BY postID DESC');
                while($row = $stmt->fetch()){
                    echo '<div class="col">';
                        echo '<div class="card">';
                        echo '<div class="card-header">perma-featured</div>';
                        echo '<img class="card-img-top" src="" alt="'.$row['postTitle'].' image" />';
                          echo '<div class="card-block">';
                            echo '<h3 class="card-title"><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h3>';
                            echo '<p class="card-text">'.$row['postDesc'].'</p>';
                          echo '</div>';
                    echo '<div class="card-block">';
                      echo '<a href="#" class="card-link">'.$row['postTitle'].'</a>';
                      echo '<a href="#" class="card-link">'.$row['postID'].'</a>';
                    echo '</div>';
                    echo '<div class="card-footer text-muted">this has been perma-featured</div>';
                    echo '</div>';
                    echo '</div>';
                }
              } catch(PDOException $e) {
                  echo $e->getMessage();
              }
            ?>

            <!-- </div> -->
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
