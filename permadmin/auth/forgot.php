<?php
	require 'config.php';

	if(isset($_POST['forgotpass'])) {
		$errMsg = '';

		// Getting data from FROM
		$secretpin = $_POST['secretpin'];

		if(empty($secretpin))
			$errMsg = 'Please enter your secret pin to view your password.';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT password, secretpin FROM pdo WHERE secretpin = :secretpin');
				$stmt->execute(array(
					':secretpin' => $secretpin
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if($secretpin == $data['secretpin']) {
					$viewpass = 'Your password is: ' . $data['password'] . '<br><a href="login.php">Login Now</a>';
				}
				else {
					$errMsg = 'Sercet pin not matched.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
<head><title>Forgot Password</title></head>
	<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/head.php");?>
<body>
	<div>
		<div>
			<?php
				if(isset($errMsg)){
					echo '<div>'.$errMsg.'</div>';
				}
			?>
			<div><b>Forgot Password</b></div>
			<?php
				if(isset($viewpass)){
					echo '<div>'.$viewpass.'</div>';
				}
			?>
			<div>
				<form action="" method="post">
					<input type="text" name="secretpin" placeholder="Secret Pin" autocomplete="off" class="box"/><br /><br />
					<input type="submit" name='forgotpass' value="Check" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/includes/body_scripts.php");?>
</body>
</html>
