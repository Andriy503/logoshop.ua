<?php
	$login = $_POST['edit_1'];
	$password = md5($_POST['password']);
	
	$connect = new PDO("mysql:host=localhost;dbname=db_logoshop", "root", "");
	$sql_num_rows = $connect->prepare(" SELECT COUNT(*) FROM `users` WHERE `login` = '".$login."' AND `password` = '".$password."' ");
	$sql_num_rows->execute();
	$num_rows = $sql_num_rows->fetchColumn();

	if($num_rows == 1) {
		echo 'true';
	} else {
		echo 'false';
	}
?>