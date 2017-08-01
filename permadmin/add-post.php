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
    <?php include_once('../includes/head.php');?>
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
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="./">Blog Admin Index</a></p>

	<h2>Add Post</h2>

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
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

				//insert into database
				$stmt = $connect->prepare('INSERT INTO shutt_posts (postTitle,postImg,postLink,postLinkText,postFeat,postCat,postDesc,postCont,postDate) VALUES (:postTitle, :postImg, :postLink, :postLinkText, :postFeat, :postCat, :postDesc, :postCont, :postDate)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
                    ':postImg' => $postImg,
                    ':postLink' => $postLink,
                    ':postLinkText' => $postLinkText,
                    ':postFeat' => $postFeat,
                    ':postCat' => $postCat,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postDate' => date('Y-m-d H:i:s')
				));

				//redirect to index page
				header('Location: index.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form class="shutt_post_form" action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

        <p><label>Image</label><br />
		<input type='text' name='postImg' value='<?php echo $_POST['postImg'];?>'></p>

        <p><label>Link</label><br />
		<input type='text' name='postLink' value='<?php echo $_POST['postLink'];?>'></p>

        <p><label>Link Text</label><br />
		<input type='text' name='postLinkText' value='<?php echo $_POST['postLinkText'];?>'></p>

        <p><label>Featured?</label><br />
		<input type='text' name='postFeat' value='<?php echo $_POST['postFeat'];?>'></p>

        <p><label>Category</label><br />
		<input type='text' name='postCat' value='<?php echo $_POST['postCat'];?>'></p>

        <p><label>category</label><br />
        <select name="postCat" id="postCat" class="form-control">
            <!-- NEED FIX HERE -->
        </select>

                while ( $row = $connect->fetch() )
                {
                   echo '<option value="'.$row['postCat'].'">'.$row['postCat'].'</option>';
                }

                echo '</select>';
            ?>
        </p>

		<p><label>Brief Description | 300 words</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>
    <?php include_once('../includes/body_scripts.php');?>
</body>
</html>
