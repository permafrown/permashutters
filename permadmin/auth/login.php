<?php
	require 'config.php';

	if(isset($_POST['login'])) {
		$errMsg = '';

		// Get data from FORM
		$ulogin = $_POST['ulogin'];
		$upw = $_POST['upw'];

		if($ulogin == '')
			$errMsg = 'enter un';
		if($upw == '')
			$errMsg = 'enter pw';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT user_name, user_login, user_pw, user_email FROM shutt_users WHERE user_login = :ulogin, user_pw = :upw');
				$stmt->execute(array(
                    ':ulogin' => $ulogin,
                    ':upw' => $upw
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($data == false){
					$errMsg = "user $ulogin not found.";
				}
				else {
					if($upw == $data['upw']) {
						$_SESSION['uname'] = $data['uname'];
						$_SESSION['ulogin'] = $data['ulogin'];
						$_SESSION['upw'] = $data['upw'];
						$_SESSION['uemail'] = $data['uemail'];

						header('Location: ../index.php');
						exit;
					}
					else
						$errMsg = 'pw no match.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
<head><title>Login</title></head>
	<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/head.php");?>
<body>
	<div>
		<div>
			<?php
				if(isset($errMsg)){
					echo '<div>'.$errMsg.'</div>';
				}
			?>
			<div>
				<form action="" method="post">
					<input type="text" name="ulogin" value="<?php if(isset($_POST['ulogin'])) echo $_POST['ulogin'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="upw" value="<?php if(isset($_POST['upw'])) echo $_POST['upw'] ?>" autocomplete="off" class="box" /><br/><br />
					<input type="submit" name='login' value="login" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/body_scripts.php");?>
</body>
</html>
