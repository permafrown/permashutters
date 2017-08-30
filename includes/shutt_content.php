<div class="row d-inline-flex">
    <?php
    try {
        $sql = "SELECT postID, postTitle, postSlug, postImg, postLink, postLinkText, postFeat, postCat, postDesc, postCont, postDate " .
        "FROM shutt_posts " .
        "WHERE postCat = :postCatSel " .
        "ORDER BY postDate DESC";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':postCatSel', $postCatSel, PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch()){
            echo '<div class="col">';
                echo '<div class="card">';
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
                    if (!empty($row['postCont'])) {
                          echo '<div class="card-block">';
                            echo '<a href="viewpost.php?id='.$row['postSlug'].'">more...</a>';
                          echo '</div>';
                        } else {echo '<div></div>';}
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
