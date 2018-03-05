<?php
	$connect = mysqli_connect("127.0.0.1", "root", "", "test");
	session_start();
		if (isset($_POST['send-user'])){

			$login = mysqli_real_escape_string($connect, trim($_POST['login']));
			$password = mysqli_real_escape_string($connect, trim($_POST['password']));

				if (!empty($login) && !empty($password)){
					$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' ");
					$rows = $query->fetch_assoc();
				if (!empty($rows)){
					echo 'Вітаю!'.'<br>';
					echo 'id = '.$rows['id'].'<br>';
					echo 'login = '.$rows['login'].'<br>';
					echo 'password = '.$rows['password'].'<br>';
				} else{ echo "Такого користувача не існує!" ; }

				} else {
					echo header("Location: index.php");
					$_SESSION['error'] = "Заповніть всі поля!";
				}
		}

if (isset($_POST['send-auth'])){

	$login_1 = mysqli_real_escape_string($connect, trim($_POST['login_1']));
	$password_1 = mysqli_real_escape_string($connect, trim($_POST['password_1']));

		if (!empty($login_1) && !empty($password_1)){
		 	$query_1 = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login_1' ");
			 $rows = $query_1->fetch_assoc();
		if (empty($rows)){
		 	$query = mysqli_query($connect, " INSERT INTO `users` (`login`, `password`) VALUES ('$login_1', '$password_1')" );
		echo "Користувач ".$login_1.' успішно зареєстрований';

	} else{echo "Такий користувач зареєстрованй!";}
	}else { 
		header("Location: registration.php"); 
		$_SESSION['erno'] = 'ВСі поля зaповни!';


	}

	}




?>