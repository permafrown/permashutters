<?php require('permadmin/auth/config.php');

$stmt = $connect->prepare('SELECT postID, postTitle, postCont, postDate FROM shutt_posts WHERE postID = :postID');
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
    <title>Blog - <?php echo $row['postTitle'];?></title>
</head>
<body>

	<div id="wrapper">

		<h1>Blog</h1>
		<hr />
		<p><a href="./">Blog Index</a></p>


		<?php
			echo '<div>';
				echo '<h1>'.$row['postTitle'].'</h1>';
				echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
				echo '<p>'.$row['postCont'].'</p>';
			echo '</div>';
		?>

	</div>
  <?php include_once('includes/body_scripts.php'); ?>
</body>
</html>
