<?php
	require 'config.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$uname = $_POST['uname'];
		$ulogin = $_POST['ulogin'];
		$upw = $_POST['upw'];
        $uemail = $_POST['uemail'];
        $ureg = $_POST['ureg'];
        //$hash = password_hash($password, PASSWORD_BCRYPT);

		if($uname == '')
			$errMsg = 'enter name';
		if($ulogin == '')
			$errMsg = 'enter un';
		if($upw == '')
			$errMsg = 'enter pw';
        if($uemail == '')
			$errMsg = 'enter email';


		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO shutt_users (user_name, user_login, user_pw, user_email, user_reg) VALUES (:uname, :ulogin, :upw, :uemail, :ureg)');
				$stmt->execute(array(
					':uname' => $uname,
					':ulogin' => $ulogin,
					':upw' => $upw,//$hash,
                    ':uemail' => $uemail,
                    ':ureg' => $ureg
					));
				header('Location: register.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="login.php">login</a>';
	}
?>

<html>
<head><title>Register</title></head>
	<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/head.php");?>
<body>
	<div class="auth_page">
		<div>
			<?php
				if(isset($errMsg)){
					echo '<div>'.$errMsg.'</div>';
				}
			?>
			<div><b>Register</b></div>
			<div>
				<form action="" method="post">
					<input type="text" name="uname" placeholder="name" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="text" name="ulogin" placeholder="username" value="<?php if(isset($_POST['ulogin'])) echo $_POST['ulogin'] ?>" autocomplete="off" class="box"/><br /><br/>
					<input type="password" name="upw" placeholder="password" value="<?php if(isset($_POST['upw'])) echo $_POST['upw'] ?>" class="box" /><br/><br />
                    <input type="email" name="uemail" placeholder="email" value="<?php if(isset($_POST['uemail'])) echo $_POST['uemail'] ?>" class="box" /><br/><br />
                    <input type="hidden" name="ureg" value="<?php echo time(); ?>" class="box" />
					<br /><br />
					<input type="submit" name='register' value="register" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/body_scripts.php");?>
</body>
</html>
