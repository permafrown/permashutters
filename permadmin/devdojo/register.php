<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	// Enter the new user in the database
	$sql = "INSERT INTO shutt_users (name, username, password, email, date) VALUES (:user_name, :user_login, :user_pw, :user_email, :user_reg)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':user_name', $_POST['name']);
	$stmt->bindParam(':user_login', $_POST['username']);
	$stmt->bindParam(':user_pw', password_hash($_POST['password'], PASSWORD_BCRYPT));
	$stmt->bindParam(':user_email', $_POST['email']);
	$stmt->bindParam(':user_reg', $_POST['date']);

	if( $stmt->execute() ):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="/">Your App Name</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<span>or <a href="login.php">login here</a></span>

	<form action="register.php" method="POST">
		
		<input type="text" placeholder="name" name="name"><br>
		<input type="text" placeholder="username" name="username"><br>
		<input type="password" placeholder="password" name="password"><br>
		<!--<input type="password" placeholder="confirm pw" name="confirm_password"><br>-->
		<input type="text" placeholder="email" name="email"><br>
		<input type="hidden" name="date" value="<?php echo time(); ?>" /><br><br>
		<input type="submit">

	</form>

</body>
</html>