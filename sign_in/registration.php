<?php
	session_start();
	if(!empty($_SESSION['erno'])){
		echo $_SESSION['erno'];
		unset($_SESSION['erno']);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/sign_in_style.css">
	 <link rel="shortcut icon" type="image/x-icon" href="img/street.png"/>
</head>
<body>
	<form action="check.php" method="post">
		<label>NEw_login: <input type="text" name="login_1"></label>
		<label>NEw_Password: <input type="password" name="password_1"></label>
		<input type="submit" name="send-auth" value="Реєстрація">
	</form>
</body>
</html>