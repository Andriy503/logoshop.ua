<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="sign_in/css/sign_in_style.css">
	<link rel="stylesheet" type="text/css" href="sign_in/css/font-awesome.css">
	<link rel="shortcut icon" type="image/x-icon" href="sign_in/img/sign_in.png"/>

	<script src="js/library/jquery.js"></script>

	<script type="text/javascript" src="js/library/jquery.form.js"></script>
	<script type="text/javascript" src="js/library/jquery.validate.js"></script>

</head>
<body>
	<div class="wrapper">
	<img src="sign_in/img/men.png">


	<form action="sign_in/check.php" method="post" id="form_sign_in">
		<div class="dw-input">
			<input type="text" name="edit_1" id="edit_1" placeholder="Введіть логін">
		</div>
		<div class="dw-input">
			<input type="password" name="password" id="password" placeholder="Введіть пароль">
		</div>
		<p class="in_message"></p>
			<br>
			<input type="submit" name="send-user" id="sign_in_button" value="Вхід" class="dw-submit">
			<br>
			<a href="/registration.php">Реєстрація</a><br>
			<a href="/">Повернутись</a>
	</form>

	<div class="socila">
		<i class="fa fa-vk" aria-hidden="true"></i>
		<i class="fa fa-odnoklassniki" aria-hidden="true"></i>
		<i class="fa fa-facebook" aria-hidden="true"></i>
		<i class="fa fa-google-plus" aria-hidden="true"></i>
		<i class="fa fa-twitter" aria-hidden="true"></i>
	</div>

</div>

<script type="text/javascript">

	$("#form_sign_in").validate({
		rules: {
			edit_1: {
				required: true,
				minlength: 3,
				maxlength: 20
			},
			password: {
				required: true,
				minlength: 4,
				maxlength: 30
			}
		},

		messages: {
			edit_1: {
				required: "<span class='login_in' ><br>заповніть поле!</span>",
				minlength: "<span class='login_in' ><br>поле закоротке!</span>",
				maxlength: "<span class='login_in' ><br>поле задовге!</span>"
			},
			password: {
				required: "<span class='login_in' ><br>заповніть поле!</span>",
				minlength: "<span class='login_in' ><br>поле закоротке!</span>",
				maxlength: "<span class='login_in' ><br>поле задовге!</span>"
			}
		},

		submitHandler: function(form) {
			$(form).ajaxSubmit({
				success: function(data){

					if(data == "true"){
						// $(".in_message").hide();
						// $("#edit_1").css({ "borderColor": "#2c536c", "color": "#2c536c" });
						// $("#password").css({ "borderColor": "#2c536c", "color": "#2c536c" });
						window.location.replace("/");
					} else {
						$(".in_message").slideDown(400).html("Неправильний логін або пароль!");
						$("#edit_1").css({ "borderColor": "#ff0000", "color": "#ff0000" });
						$("#password").css({ "borderColor": "#ff0000", "color": "#ff0000" });
					}

				}
			});
		}

	});		
</script>

</body>
</html>
