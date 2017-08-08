<?php //include config
require_once('auth/config.php');

session_start();

//verify user logged in
if(empty($_SESSION['ulogin']))
{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/permadmin/auth/login.php');
    echo 'not logged in, bruh';
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
          tinymce.init({
              forced_root_block_attrs: {
                  'class': 'card-text',
              },
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
  <?php include_once('../includes/head.php');?>
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="./">home</a></p>

	<h2>Edit Post</h2>


	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postID ==''){
			$error[] = 'This post is missing a valid id!.';
		}

		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		if(!isset($error)){

			try {
                // $postSlug = slug($postTitle);
				//insert into database
                $stmt = $connect->prepare('UPDATE shutt_posts SET postTitle = :postTitle, postSlug = :postSlug, postImg = :postImg, postLink = :postLink, postLinkText = :postLinkText, postFeat = :postFeat, postCat = :postCat, postDesc = :postDesc, postCont = :postCont, postDate = :postDate WHERE postID = :postID');
				$stmt->execute(array(
                    ':postID' => $postID,
					':postTitle' => $postTitle,
                    ':postSlug' => $postSlug,
                    ':postImg' => $postImg,
                    ':postLink' => $postLink,
                    ':postLinkText' => $postLinkText,
                    ':postFeat' => $postFeat,
                    ':postCat' => $postCat,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postDate' => date('Y-m-d H:i:s')
				));

                // // delete all items with the current postID
                // $stmt = $connect->prepare('DELETE FROM shutt_post_cats WHERE postID = :postID');
                // $stmt->execute(array(':postID' => $postID));
                //
                // if(is_array($catID)){
                //     foreach($_POST['catID'] as $catID){
                //         $stmt = $connect->prepare('INSERT INTO shutt_post_cats (postID, catID) VALUES (:postID, :catID)');
                //         $stmt->execute(array(
                //             ':postID' => $postID,
                //             ':catID' => $catID
                //         ));
                //     }
                // }

				//redirect to index page
				header('Location: index.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $connect->prepare('SELECT postID, postTitle, postSlug, postImg, postLink, postLinkText, postFeat, postCat, postDesc, postCont FROM shutt_posts WHERE postID = :postID') ;
			$stmt->execute(array(':postID' => $_GET['id']));
			$row = $stmt->fetch();

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form class="shutt_post_form" action='' method='post'>
		<input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php echo $row['postTitle'];?>'></p>
        <input type='hidden' name='postSlug' value='<?php {echo $row['postSlug'];}?>'>

        <p><label>Image</label><br />
        <input type='text' name='postImg' value='<?php echo $row['postImg'];?>'></p>

        <p><label>Link</label><br />
        <input type='text' name='postLink' value='<?php echo $row['postLink'];?>'></p>

        <p><label>Link Text</label><br />
        <input type='text' name='postLinkText' value='<?php echo $row['postLinkText'];?>'></p>

        <p><label>Featured?</label><br />
        <input type='hidden' name='postFeat' value='<?php echo $row['postFeat'] = 0;?>'></p>
        <input type='checkbox' name='postFeat' value='<?php echo $row['postFeat'] = 1;?>'></p>

        <p><label for "postCat">category | </label>
            <select class="form-control" name="postCat" id="postCat" class="form-control">
                <option value='games' <?php echo ($_POST['postCat'] == 'games')? "selected":""; ?>>games</option>
                <option value='fauna' <?php echo ($_POST['postCat'] == 'fauna')? "selected":""; ?>>fauna</option>
                <option value='science' <?php echo ($_POST['postCat'] == 'science')? "selected":""; ?>>science</option>
                <option value='words' <?php echo ($_POST['postCat'] == 'words')? "selected":""; ?>>words</option>
                <option value='sundry' <?php echo ($_POST['postCat'] == 'sundry')? "selected":""; ?>>sundry</option>
                <option value='media' <?php echo ($_POST['postCat'] == 'media')? "selected":""; ?>>media</option>
            </select>
            <?php echo " | current category = " $row['postCat']; ?>
        </p>

		<p><label>Brief Description | 300 words</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php echo $row['postDesc'];?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php echo $row['postCont'];?></textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form>

</div>
    <?php include_once('../includes/body_scripts.php');?>
</body>
</html>
