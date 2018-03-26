<?php 
	session_start();
	$login = trim($_POST['login']);
	$name = trim($_POST['name']);
	$surname = trim($_POST['sirname']);
	$phone = trim($_POST['phone']);
	$adress = trim($_POST['adress']);

	$connect = new PDO("mysql:host=localhost;dbname=db_logoshop", "root", "");
	$sql = $connect->prepare(' UPDATE `users` SET `login` = "'.$login.'", `name` = "'.$name.'", `surname` = "'.$surname.'", `phone` = "'.$phone.'", `address` = "'.$adress.'" WHERE `login` = "'.$_SESSION['auth_login'].'" ');
	$sql->execute();

	$sql_num_rows = $connect->prepare(" SELECT COUNT(*) FROM `users` WHERE `login` = '".$login."' ");
	$sql_num_rows->execute();
	$num_rows = $sql_num_rows->fetchColumn();

	if($num_rows == 1) {
		$query = $connect->prepare(' SELECT * FROM `users` WHERE `login` = "'.$login.'" ');
		$query->execute();
		$row = $query->fetch(PDO::FETCH_ASSOC);

		$_SESSION['auth_login'] = $row["login"];
		$_SESSION['auth_name'] = $row["name"];
		$_SESSION['auth_surname'] = $row["surname"];
		$_SESSION['auth_phone'] = $row["phone"];
		$_SESSION['auth_address'] = $row["address"];

		echo "true";
	} else {
		echo "false";
	}
?>