<?php require('permadmin/auth/config.php');

$stmt = $connect->prepare('SELECT postID, postTitle, postSlug, postCont, postDate, postCat, postFeat, postLink, postLinkText, postDesc FROM shutt_posts WHERE postSlug = :postSlug');
$stmt->execute(array(':postSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('includes/head.php'); ?>
    <title><?php echo $row['postCat'], " | ", $row['postTitle'];?></title>
</head>
<body>
	<h1><?php echo $row['postCat'], " | ", $row['postTitle'];?></h1>
	<p><a href="./">home</a> | <a href="content.php?cat=<?php echo $row['postCat'];?>">back</a></p>
	<hr class="perma_hr">
	<div id="wrapper">
		<?php
			echo '<div class="shutt_page_content">';
				echo '<p>Posted on '.date('Y-m-d @ H:i:s', strtotime($row['postDate'])).'</p>';
				echo '<p>'.$row['postCont'].'</p>';
			echo '</div>';
		?>
	</div>
	<hr class="perma_hr">
	<?php include_once('includes/avatar.php'); ?>
  <?php include_once('includes/body_scripts.php'); ?>
</body>

<footer>
    <?php include_once('includes/botnav.php');?>
</footer>

</html>
