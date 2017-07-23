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
    <div class="container-fluid d-inline-flex shutt_page_content">

        <?php
          try {

            $stmt = $connect->query('SELECT postID, postTitle, postImg, postDesc, postDate FROM shutt_posts ORDER BY postID DESC');
            while($row = $stmt->fetch()){

              echo '<div class="row justify-content-center align-items-center">';
                echo '<div class="col-xs-5">';
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

        <?php
        echo '<div class="row justify-content-center align-items-center">';
            echo '<div class="col-xs-5">';
                echo '<div class="card">';
                    echo '<div class="card-header">perma-featured</div>';
                    echo '<img class="card-img-top" src="https://i.ytimg.com/vi/PI-1KTy0pOA/maxresdefault.jpg" alt="FC5 Announce Trailer" />';
                    echo '<div class="card-block">';
                        echo '<h3 class="card-title">far cry 5 announce trailer</h3>';
                        echo '<p class="card-text">can\'t wait for this game</p>';
                    echo '</div>';
                    echo '<ul class="list-group list-group-flush">';
                        echo '<li class="list-group-item">item 001</li>';
                        echo '<li class="list-group-item">item 002</li>';
                        echo '<li class="list-group-item">item 003</li>';
                    echo '</ul>';
                    echo '<div class="card-block">';
                        echo '<a href="https://www.youtube.com/watch?v=Kdaoe4hbMso" class="card-link">trailer</a>';
                        echo '<a href="#" class="card-link">un autre link</a>';
                    echo '</div>';
                    echo '<div class="card-footer text-muted">this has been perma-featured</div>';
                echo '</div>';
            echo '</div>';
            ?>
            <div class="col-xs-5">
                <div class="card shutt_card">
                    <div class="card-header">perma-featured</div>
                    <img class="card-img-top" src="https://ubistatic19-a.akamaihd.net/ubicomstatic/en-us/global/search-thumbnail/fc5-wideart-table-search_thumnail_290060.jpg"
                        alt="FC5 Official Site" />
                    <div class="card-block">
                        <h3 class="card-title">far cry 5 official site</h3>
                        <p class="card-text">check it out to follow updates, etc.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">item 001</li>
                        <li class="list-group-item">item 002</li>
                        <li class="list-group-item">item 003</li>
                    </ul>
                    <div class="card-block">
                        <a href="https://far-cry.ubisoft.com/game/en-ca/home/" class="card-link">site</a>
                        <a href="#" class="card-link">un autre link</a>
                    </div>
                    <div class="card-footer text-muted">this has been perma-featured</div>
                </div>
            </div>
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
