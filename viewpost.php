<?php require('permadmin/auth/config.php');

$stmt = $connect->prepare('SELECT postID, postTitle, postCont, postDate, postCat, postFeat, postLink, postLinkText, postDesc FROM shutt_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
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
    <title>games | <?php echo $row['postTitle'];?></title>
</head>
<body>

	<div id="wrapper">

		<h1><?php echo $row['postCat'];?></h1>
		<hr class="permahr"/>
		<p><a href="./">home</a></p>


		<?php
			echo '<div class="shutt_page_content">';
				echo '<h1>'.$row['postTitle'].'</h1>';
				echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
				echo '<p>'.$row['postCont'].'</p>';
			echo '</div>';
		?>

	</div>
  <?php include_once('includes/body_scripts.php'); ?>
</body>
</html>
