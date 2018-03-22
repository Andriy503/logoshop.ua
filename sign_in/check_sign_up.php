<?php 
	$login = $_POST['login'];
	$password = md5($_POST['password']);
	$name = $_POST['name'];
	$surname = $_POST['sirname'];
	$phone = $_POST['phone'];
	$adress = $_POST['adress'];

	$ip = $_SERVER['REMOTE_ADDR'];

	if($phone == ""){
		$phone = 0;
	}

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

