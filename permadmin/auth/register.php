<?php
	require 'config.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
        //$hash = password_hash($password, PASSWORD_BCRYPT);
		$secretpin = $_POST['secretpin'];

		if($fullname == '')
			$errMsg = 'Enter your fullname';
		if($username == '')
			$errMsg = 'Enter username';
		if($password == '')
			$errMsg = 'Enter password';
		if($secretpin == '')
			$errMsg = 'Enter a sercret pin number';

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO pdo (fullname, username, password, secretpin) VALUES (:fullname, :username, :password, :secretpin)');
				$stmt->execute(array(
					':fullname' => $fullname,
					':username' => $username,
					':password' => $password,//$hash,
					':secretpin' => $secretpin
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
	<div>
		<div>
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<div><b>Register</b></div>
			<div>
				<form action="" method="post">
					<input type="text" name="fullname" placeholder="Fullname" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br/><br />
					<input type="text" name="secretpin" placeholder="Sercter Pin" value="<?php if(isset($_POST['secretpin'])) echo $_POST['secretpin'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="submit" name='register' value="Register" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/body_scripts.php");?>
</body>
</html>
