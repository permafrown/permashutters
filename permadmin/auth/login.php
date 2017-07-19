<?php
	require 'config.php';

    date_default_timezone_set('America/Toronto');

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
				$stmt = $connect->prepare('SELECT user_name, user_login, user_pw, user_email FROM shutt_users WHERE user_login = :ulogin');
				$stmt->execute(array(
                    ':ulogin' => $ulogin
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($data == false){
					$errMsg = "user $ulogin not found.";
				}
				else {
					if($upw == $data['user_pw']) {
						$_SESSION['uname'] = $data['user_name'];
						$_SESSION['ulogin'] = $data['user_login'];
						$_SESSION['upw'] = $data['user_pw'];
						$_SESSION['uemail'] = $data['user_email'];

						header('Location: http://' . $_SERVER['HTTP_HOST'] . '/permadmin/index.php');
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
	<div class="auth_page">
		<div>
			<p><?php
				if(isset($errMsg)){
					echo '<div>'.$errMsg.'</div>';
				}
			?></p>
			<div>
                <p>login, bruh</p>
				<form action="" method="post">
					<input type="text" name="ulogin" value="u/n<?php if(isset($_POST['ulogin'])) echo $_POST['ulogin'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="upw" value="p/w<?php if(isset($_POST['upw'])) echo $_POST['upw'] ?>" autocomplete="off" class="box" /><br/><br />
					<input type="submit" name='login' value="go" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/body_scripts.php");?>
</body>
</html>
