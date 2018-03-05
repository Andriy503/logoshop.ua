<?php
	session_start();
	if (!empty($_SESSION['error'])){
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="sign_in/css/sign_in_style.css">
	<link rel="stylesheet" type="text/css" href="sign_in/css/font-awesome.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/street.png"/>
</head>
<body>
	<div class="wrapper">
	<img src="sign_in/img/men.png">
	<form action="sign_in/check.php" method="post">
		<div class="dw-input">
			<input type="text" name="login" id="edit_1" placeholder="Введіть логін">
		</div>
		<div class="dw-input">
			<input type="password" name="password" placeholder="Введіть пароль">
		</div>
			<br>
			<input type="submit" name="send-user" value="Вхід" class="dw-submit">
			<br>
			<a href="sign_in/registration.php">Реєстрація</a>
	</form>
	<div class="socila">
		<i class="fa fa-vk" aria-hidden="true"></i>
		<i class="fa fa-odnoklassniki" aria-hidden="true"></i>
		<i class="fa fa-facebook" aria-hidden="true"></i>
		<i class="fa fa-google-plus" aria-hidden="true"></i>
		<i class="fa fa-twitter" aria-hidden="true"></i>
	</div>
</div>
</body>
</html>
