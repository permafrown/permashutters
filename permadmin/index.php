<!-- Copyright 2016. GoodLife Music Ltd.. All Rights Reserved. -->
<?php include_once('auth/config.php');?>
<?php
    session_start();

//verify user logged in
    if(empty($_SESSION['ulogin']))
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/permadmin/auth/login.php');
        echo 'not logged in, bruh';
        exit;
    }

//show message from add / edit page
    if(isset($_GET['delpost'])){

    	$stmt = $connect->prepare('DELETE FROM shutt_posts WHERE postID = :postID') ;
    	$stmt->execute(array(':postID' => $_GET['delpost']));

    	header('Location: index.php?action=deleted');
    	exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/head.php");?>
<script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("delete '" + title + "'?"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
	  }
  }
  </script>
    <title>ADMINpermashutters</title>
</head>
<body>

<!-- MAIN TITLE -->
    <h1 class="title_centered" style="margin-top: 2.5%; color: #8e44ad;text-shadow: 4px 4px 2px rgba(0, 255, 0, 0.5);">permADMIN</h1>
<!-- END MAIN TITLE -->

<!-- LARGE SCREEN SUBMENU -->
    <hr class="permahr hidden-sm-down">
    <h2 class="submenu hidden-sm-down"><a href="../index.php">home</a> | <a href="../content.php?cat=games">games</a> | <a href="../content.php?cat=fauna">fauna</a> | <a href="../content.php?cat=science">science</a> | <a href="../content.php?cat=words">words</a> | <a href="../content.php?cat=sundry">sundry</a> | <a href="../content.php?cat=media">media</a> | <a href="../about.php">about</a> | <a href="auth/logout.php">logout</a></h2>
    <hr class="permahr hidden-sm-down">
<!-- END LARGE SCREEN SUBMENU -->
<!-- CMS -->
<h2 class="title_centered">
    <?php
        if(isset($errMsg)){
            echo '<div style="color:#FF0000;text-align:center;font-size:18px;">'.$errMsg.'</div>';
        }
    ?>
</h2>
<div class="admin_menu" id=menu-wrapper>
    <?php include_once("menu.php");?>
    <?php
    //show message from add / edit page
        if(isset($_GET['action'])){
            echo '<h2 class="submenu action_message">Post '.$_GET['action'].'.</h2>';
        }
    ?>

    <p><a href='add-post.php'>add post</a></p>

    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>date</th>
            <th>category</th>
            <th>action</th>
        </tr>
        <?php
            try {
                $stmt = $connect->query('SELECT postID, postTitle, postDate, postCat FROM shutt_posts ORDER BY postID DESC');
                while($row = $stmt->fetch()){
                    echo '<tr>';
                    echo '<td>'.$row['postID'].'</td>';
                    echo '<td>'.$row['postTitle'].'</td>';
                    echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
                    echo '<td>'.$row['postCat'].'</td>';
                    ?>
                    <td>
                        <a href="edit-post.php?id=<?php echo $row['postID'];?>">edit</a> |
                        <a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">delete</a>
                    </td>
                    <?php
                    echo '</tr>';
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>
    </table>
</div>

<!-- END CMS -->
<!-- SMALL SCREEN SUBMENU -->
    <hr class="permahr hidden-md-up">
    <h2 class="submenu hidden-md-up"><a href="../index.php">home</a></h2>
    <h2 class="submenu hidden-md-up"><a href="../about.php">about</a></h2>
    <h2 class="submenu hidden-md-up"><a href="auth/logout.php">logout</a></h2>
    <hr class="permahr hidden-md-up">
<!-- END SMALL SCREEN SUBMENU -->

<!-- RANDOM STATS-->
<hr class="permahr">
<h2 class="submenu"><?php echo 'logged in as: ' . ($_SESSION['ulogin']);?></h2>
<h2 class="submenu"><?php echo date(DATE_RFC2822);?></h2>
<h2 class="submenu"><?php echo 'america/toronto';?></h2>
<h2 class="submenu"><?php echo time();?></h2>
<!-- END RANDOM STATS -->




<!-- SCRIPTS -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/body_scripts.php");?>

<!-- END SCRIPTS -->

</body>
</html>
