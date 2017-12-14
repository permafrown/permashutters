<!-- Copyright 2017. GoodLife Music Ltd.. All Rights Reserved. -->
<?php //include config
require_once('../permadmin/auth/config.php');

session_start();

//verify user logged in
if(empty($_SESSION['ulogin']))
{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/permadmin/auth/login.php');
    echo 'not logged in, bruh';
    exit;
}

if(isset($_GET['delpost'])) {
    try {
        $stmt = $connect->prepare("DELETE FROM prayer_journal WHERE pj_id= :pj_id");
        $stmt->execute(array(':pj_id' => $_GET['delpost']));

        header('Location: pj.php?action=deleted');
        exit;
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <?php include_once '../includes/head.php';?>
  <?php include_once '../permadmin/auth/config.php'; ?>
  <link rel="stylesheet" href="css/pj.css">
  <script language="JavaScript" type="text/javascript">
    function delpost(id, title)
    {
  	  if (confirm("delete '" + title + "'?"))
  	  {
  	  	window.location.href = 'pj.php?delpost=' + id;
  	  }
    }
    </script>
  <title>prayer journal | permashutters</title>
</head>
<body>
  <h1 class="title-centered">prayer journal | permashutters</h1>

  <hr class="permahr">
  <a class="btn btn-outline-light" id="pj_addNew" href="pj_new.php">Add New</a>
  <hr class="permahr">

  <?php
      if($_GET['action'] == "added") {
          echo '<p class="error">New entry successfully added!</p>';
      } elseif ($_GET['action'] == "deleted") {
          echo '<p class="error">Entry deleted...</p>';
      }
   ?>

  <div class="container">
      <table class="table table-striped table-dark">
      <!-- <table class="pj_table"> -->
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">action</th>
                <th scope="col">date</th>
                <th scope="col">time</th>
                <th scope="col">notes</th>
            </tr>
        </thead>
        <tbody>
            <?php
                try {
                    $stmt = $connect->query('SELECT pj_id, pj_date, pj_mins, pj_notes FROM prayer_journal ORDER BY pj_id DESC');
                    while($row = $stmt->fetch()){
                        echo '<tr>';
                        echo '<th scope="row">'.$row['pj_id'].'</th>'
                            ?>
                            <td>
                                <a href="pj_edit.php?id=<?php echo $row['pj_id'];?>">edit</a> |
                                <a href="javascript:delpost('<?php echo $row['pj_id'];?>','<?php echo $row['pj_id'];?>')">delete</a>
                            </td>
                            <?php
                            echo '<td>'.date('jS M Y', strtotime($row['pj_date'])).'</td>';
                            echo '<td>'.$row['pj_mins'].'</td>';
                            echo '<td>'.$row['pj_notes'].'</td>';
                        echo '</tr>';
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
            ?>
        </tbody>
      </table>
  </div>

  <hr class="permahr">
  <div class="container-fluid">
      <div class="col-xs-12">
          <a href="index.php"><img class="img-responsive avatar center-block title-centered" src="../img/permavatar.png" alt="avatar" /></a>
      </div>
  </div>
  <hr class="permahr">

  <script type="text/javascript" src="js/pj.js"></script>
  <?php include_once "../includes/body_scripts.php"; ?>
</body>
</html>
