<div class="row d-inline-flex">
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
            echo '</div>';
            echo '<div class="card-footer text-muted">this has been perma-featured</div>';
            echo '</div>';
            echo '</div>';
        }
      } catch(PDOException $e) {
          echo $e->getMessage();
      }
    ?>
</div>
