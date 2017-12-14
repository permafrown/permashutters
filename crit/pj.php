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

// pj_del($id) {
//     try {
//         $stmt = connect->prepare("DELETE FROM prayer_journal WHERE id=':id'");
//         $stmt->execute(array(
//             ':id' => $id
//         ));
//         header('Location: pj.php?action=deleted');
//         exit;
//     } catch(PDOException $e) {
//         echo $e->getMessage();
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <?php include_once '../includes/head.php';?>
  <?php include_once '../permadmin/auth/config.php'; ?>
  <link rel="stylesheet" href="css/pj.css">
  <title>prayer journal | permashutters</title>
</head>
<body>
  <h1 class="title-centered">prayer journal | permashutters</h1>

  <hr class="permahr">
  <a class="btn btn-outline-light" id="pj_addNew" href="pj_new.php">Add New</a>
  <hr class="permahr">

  <div class="container">
      <table class="pj_table">
          <tr>
              <th>date</th>
              <th>time</th>
              <th>notes</th>
          </tr>
          <?php
              try {
                  $stmt = $connect->query('SELECT pj_date, pj_mins, pj_notes FROM prayer_journal ORDER BY pj_id DESC');
                  while($row = $stmt->fetch()){
                      echo '<tr>';
                      echo '<td>'.date('jS M Y', strtotime($row['pj_date'])).'</td>';
                      echo '<td>'.$row['pj_mins'].'</td>';
                      echo '<td>'.$row['pj_notes'].'</td>';
                      ?>
                      <td>
                          <a href="pj_edit.php?id=<?php $row['pj_id'];?>">edit</a> |
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
