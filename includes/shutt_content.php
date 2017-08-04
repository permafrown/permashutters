<div class="row d-inline-flex">
    <?php
      try {

        $stmt = $connect->query('SELECT postID, postTitle, postSlug, postImg, postLink, postLinkText, postFeat, postCat, postDesc, postDate FROM shutt_posts ORDER BY postDate DESC');
        while($row = $stmt->fetch()){
            echo '<div class="col">';
                echo '<div class="card">';
                    if (($row['postFeat']) != 0) {
                            echo '<div class="card-header">perma-featured</div>';
                        } else {echo '<div></div>';}
                        echo '<p>Posted on '.date('Y-m-d', strtotime($row['postDate'])).' in ';

                            $stmt2 = $connect->prepare('SELECT catTitle, catSlug FROM shutt_cats, shutt_post_cats WHERE shutt_cats.catID = shutt_post_cats.catID AND shutt_post_cats.postID = :postID');
                            $stmt2->execute(array(':postID' => $row['postID']));

                            $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                            $links = array();
                            foreach ($catRow as $cat){
                                 $links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
                            }
                            echo implode(", ", $links);

                            echo '</p>';

                    if (!empty($row['postImg'])) {
                            echo '<img class="card-img-top" src="'.$row['postImg'].'" alt="'.$row['postTitle'].' image" />';
                        } else {echo '<div></div>';}
                    echo '<div class="card-block">';
                        echo '<h3 class="card-title"><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h3>';
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
