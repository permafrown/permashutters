<div class="row d-inline-flex">
    <?php
      try {

        $stmt = $connect->query('SELECT postID, postTitle, postImg, postLink, postLinkText, postFeat, postCat, postDesc, postDate FROM shutt_posts ORDER BY postID DESC');
        while($row = $stmt->fetch()){
            echo '<div class="col">';
                echo '<div class="card">';
                echo '<div class="card-header">perma-featured</div>';
                if (!empty('postImg')) {
                echo '<img class="card-img-top" src="'.$row['postImg'].'" alt="'.$row['postTitle'].' image" />';
              } else {echo '<div></div>';}
                  echo '<div class="card-block">';
                    echo '<h3 class="card-title"><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h3>';
                    echo '<p class="card-text">'.$row['postDesc'].'</p>';
                  echo '</div>';
                    if (!empty('postLink')) {
                      echo '<div class="card-block">';
                        echo '<a href="'.$row['postLink'].'" class="card-link" target="_blank">'.$row['postLinkText'].'</a>';
                      echo '</div>';
                    } else {echo '<div></div>';}
                    echo '<div class="card-footer text-muted">this has been perma-featured</div>';
                echo '</div>';
            echo '</div>';
        }
      } catch(PDOException $e) {
          echo $e->getMessage();
      }
    ?>
</div>
