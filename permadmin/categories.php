<?php
require_once('auth/config.php');

session_start();

//verify user logged in
if(empty($_SESSION['ulogin']))
{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/permadmin/auth/login.php');
    echo 'not logged in, bruh';
    exit;
}

//show message from add / edit page
if(isset($_GET['delcat'])){

    $stmt = $connect->prepare('DELETE FROM shutt_cats WHERE catID = :catID') ;
    $stmt->execute(array(':catID' => $_GET['delcat']));

    header('Location: categories.php?action=deleted');
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once('../includes/head.php');?>
      <script language="JavaScript" type="text/javascript">
  function delcat(id, title)
  {
      if (confirm("Are you sure you want to delete '" + title + "'"))
      {
          window.location.href = 'categories.php?delcat=' + id;
      }
  }
  </script>
</head>
<body>

    <div id="wrapper">

    <?php include('menu.php');?>

    <?php
    //show message from add / edit page
    if(isset($_GET['action'])){
        echo '<h3>Category '.$_GET['action'].'.</h3>';
    }
    ?>

    <table>
    <tr>
        <th>Title</th>
        <th>Action</th>
    </tr>
    <?php
        try {

            $stmt = $connect->query('SELECT catID, catTitle, catSlug FROM shutt_cats ORDER BY catTitle DESC');
            while($row = $stmt->fetch()){

                echo '<tr>';
                echo '<td>'.$row['catTitle'].'</td>';
                ?>

                <td>
                    <a href="edit-category.php?id=<?php echo $row['catID'];?>">Edit</a> |
                    <a href="javascript:delcat('<?php echo $row['catID'];?>','<?php echo $row['catSlug'];?>')">Delete</a>
                </td>

                <?php
                echo '</tr>';

            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    ?>
    </table>

    <p><a href='add-category.php'>Add Category</a></p>

</div>
    <?php include_once('../includes/body_scripts.php');?>
</body>
</html>
