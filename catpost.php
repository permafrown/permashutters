<?php require('permadmin/auth/config.php');


$stmt = $connect->prepare('SELECT catID,catTitle FROM shutt_cats WHERE catSlug = :catSlug');
$stmt->execute(array(':catSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['catID'] == ''){
    header('Location: ./');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once('includes/head.php');
</head>
<body>

    <div id="wrapper">

        <h1>Blog</h1>
        <p>Posts in <?php echo $row['catTitle'];?></p>
        <hr />
        <p><a href="./">Blog Index</a></p>

        <?php
        try {

            $stmt = $connect->prepare('
                SELECT
                    shutt_posts.postID, shutt_posts.postTitle, shutt_posts.postSlug, shutt_posts.postDesc, shutt_posts.postDate
                FROM
                    shutt_posts,
                    shutt_post_cats
                WHERE
                     shutt_posts.postID = shutt_post_cats.postID
                     AND shutt_post_cats.catID = :catID
                ORDER BY
                    postID DESC
                ');
            $stmt->execute(array(':catID' => $row['catID']));
            while($row = $stmt->fetch()){

                echo '<div>';
                    echo '<h1><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></h1>';
                    echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).' in ';

                        $stmt2 = $db->prepare('SELECT catTitle, catSlug    FROM shutt_cats, shutt_post_cats WHERE shutt_cats.catID = shutt_post_cats.catID AND shutt_post_cats.postID = :postID');
                        $stmt2->execute(array(':postID' => $row['postID']));

                        $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                        $links = array();
                        foreach ($catRow as $cat)
                        {
                            $links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
                        }
                        echo implode(", ", $links);

                    echo '</p>';
                    echo '<p>'.$row['postDesc'].'</p>';
                    echo '<p><a href="'.$row['postSlug'].'">Read More</a></p>';
                echo '</div>';

            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        ?>

    </div>

<?php include_once('includes/body_scripts.php');
</body>
</html>
