<?php 
	$login = trim($_POST['login']);
	$password = trim(md5($_POST['password']));
	$name = trim($_POST['name']);
	$surname = trim($_POST['sirname']);
	$phone = trim($_POST['phone']);
	$adress = trim($_POST['adress']);

	$ip = $_SERVER['REMOTE_ADDR'];

	$connect = new PDO("mysql:host=localhost;dbname=db_logoshop", "root", "");
	$sql = $connect->prepare(" INSERT INTO `users` (`login`, `password`, `name`, `surname`, `phone`, `address`, `datetime`, `ip`) VALUES ('".$login."', '".$password."', '".$name."', '".$surname."', ".$phone.", '".$adress."', NOW(), '".$ip."' ) ");
	$sql->execute();

	$sql_num_rows = $connect->prepare(" SELECT COUNT(*) FROM `users` WHERE `login` = '".$login."' ");
	$sql_num_rows->execute();
	$num_rows = $sql_num_rows->fetchColumn();

	if($num_rows == 1){
		echo "true";	
	} else {
		echo "Помилка на сервері повторіть пізніше!";
	}
	
?>

