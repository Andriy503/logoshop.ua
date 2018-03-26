<?php
	$login = $_POST['edit_1'];
	$password = md5($_POST['password']);
	
	$connect = new PDO("mysql:host=localhost;dbname=db_logoshop", "root", "");
	$sql_num_rows = $connect->prepare(" SELECT COUNT(*) FROM `users` WHERE `login` = '".$login."' AND `password` = '".$password."' ");
	$sql_num_rows->execute();
	$num_rows = $sql_num_rows->fetchColumn();


	if($num_rows == 1) {
		$sql = "  ";
		$query = $connect->prepare(" SELECT * FROM `users` WHERE `login` = '".$login."' AND `password` = '".$password."' ");
		$query->execute();

		// while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
		// 	$main_login = $row['login'];
		// 	$main_password = $row['password'];
		// 	$name = $row['name'];
		// 	$surname = $row['surname'];
		// 	$phone = $row['phone'];
		// 	$address = $row['address'];
		// }

		$row = $query->fetch(PDO::FETCH_ASSOC);

		session_start();
		$_SESSION['auth'] = 'yes';
		$_SESSION['auth_login'] = $row['login'];
		$_SESSION['auth_password'] = $row['password'];
		$_SESSION['auth_name'] = $row['name'];
		$_SESSION['auth_surname'] = $row['surname'];
		$_SESSION['auth_phone'] = $row['phone'];
		$_SESSION['auth_address'] = $row['address'];

		echo 'true';
	} else {
		echo 'false';
	}
?>