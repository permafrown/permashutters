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
              max_width: 40%,
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
            $postSlug = $postTitle + 'gerbil';
			try {
				//insert into database
				$stmt = $connect->prepare('INSERT INTO shutt_posts (postTitle,postSlug,postImg,postLink,postLinkText,postFeat,postCat,postDesc,postCont,postDate) VALUES (:postTitle, :postSlug, :postImg, :postLink, :postLinkText, :postFeat, :postCat, :postDesc, :postCont, :postDate)') ;
				$stmt->execute(array(
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

	<form class="shutt_post_form form-group" action='' method='post'>

		<p><label>Title</label><br />
		    <input class="form-control" type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>
            <input class="form-control" type='hidden' name='postSlug' value='<?php if(isset($postTitle)) {echo $_POST['postSlug'];}?>'>

        <p><label>Image</label><br />
		    <input class="form-control" type='url' name='postImg' value='<?php if(!empty('postImg')) {echo $_POST['postImg'];};?>'>
        </p>

        <p><label>Link</label><br />
    		<input class="form-control" type='url' name='postLink' value='<?php if(!empty('postLink')) {echo $_POST['postLink'];};?>'>
        </p>

        <p><label>Link Text</label><br />
    		<input class="form-control" type='text' name='postLinkText' value='<?php if(!empty('postLink')) {echo $_POST['postLinkText'];};?>'>
        </p>

        <p><label>Featured?</label><br />
            <input class="form-control" type='hidden' name='postFeat' value='<?php echo $_POST['postFeat'] = 0;?>'>
            <input class="form-control" type='checkbox' name='postFeat' value='<?php echo $_POST['postFeat'] = 1;?>'>
        </p>

        <p><label for "postCat">category | </label>
            <select class="form-control" name="postCat" id="postCat" class="form-control">
                <option value='games' <?php echo ($_POST['postCat'] == 'games')? "selected":""; ?>>games</option>
                <option value='fauna' <?php echo ($_POST['postCat'] == 'fauna')? "selected":""; ?>>fauna</option>
                <option value='science' <?php echo ($_POST['postCat'] == 'science')? "selected":""; ?>>science</option>
                <option value='words' <?php echo ($_POST['postCat'] == 'words')? "selected":""; ?>>words</option>
                <option value='sundry' <?php echo ($_POST['postCat'] == 'sundry')? "selected":""; ?>>sundry</option>
                <option value='media' <?php echo ($_POST['postCat'] == 'media')? "selected":""; ?>>media</option>
            </select>
        </p>

		<p><label>Brief Description | 300 words</label><br />
		    <textarea class="form-control" name='postDesc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea>
        </p>

		<p><label>Content</label><br />
	        <textarea class="form-control" name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea>
        </p>

		<p><input class="form-control btn btn-default" type='submit' name='submit' value='Submit'></p>

	</form>

</div>
    <?php include_once('../includes/body_scripts.php');?>
</body>
</html>
