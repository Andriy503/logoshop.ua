<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Реєстрація</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="sign_in/css/setting.css">
	<link rel="stylesheet" type="text/css" href="sign_in/css/font-awesome.css">
	<link rel="shortcut icon" type="image/x-icon" href="sign_in/img/sign_up.png"/>

	<script src="js/library/jquery.js"></script>

	<script type="text/javascript" src="js/library/jquery.form.js"></script>
	<script type="text/javascript" src="js/library/jquery.validate.js"></script>
</head>
<body>
	<div class="wrapper">
	<img src="../sign_in/img/men.png">
	<p class="sign_up_text_log"><strong>Профіль <span class="profile_name">(<?php echo $_SESSION['auth_name']; ?>)</span></strong></p>
	
		<form action="sign_in/setting_api.php" method="post" id="form_reg">
			<p id="reg_message"></p>
			<div id="block_form_registration">
				<div class="dw-input first_input">
					<input type="text" name="login" id="login" placeholder="логін" value="<?php echo $_SESSION['auth_login']; ?>" >
				</div>
				<div class="dw-input">
					<input type="text" name="name" id="name" placeholder="ім'я" value="<?php echo $_SESSION['auth_name']; ?>">
				</div>
				<div class="dw-input">
					<input type="text" name="sirname" id="sirname" placeholder="прізвище" value="<?php echo $_SESSION['auth_surname']; ?>">
				</div>
				<div class="dw-input">
					<input type="text" name="phone" id="phone" placeholder="номер телефону" value="<?php echo $_SESSION['auth_phone']; ?>">
				</div>
				<div class="dw-input">
					<input type="text" name="adress" id="address" placeholder="адрес доставки" value="<?php echo $_SESSION['auth_address']; ?>">
				</div>
					<br>
					<input type="submit" name="send-user" value="Оновити" class="dw-submit">
			</div>
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
	$("#form_reg").validate({
		rules: {
			login: {
				required: true,
				minlength: 3,
				maxlength: 20,
				remote: {
					type: "post",
					url: "/sign_in/validate_setting.php"
				}
			},

			name: {
				required: true,
				minlength: 2,
				maxlength: 25
			},

			sirname: {
				required: true,
				minlength: 3,
				maxlength: 30
			},

			phone: {
				required: true,
				minlength: 4,
				maxlength: 15,
				digits: true
			},

			adress: {
				required: true,
				maxlength: 100
			}

		}, 
		messages:{
			login: {
				required: "заповніть поле!",
				minlength: "поле закоротке!",
				maxlength: "поле задовге!",
				remote: "такий логін зайнятий!"
			},

			sirname: {
				required: "заповніть поле!",
				minlength: "поле закоротке!",
				maxlength: "поле задовге!"
			},

			name: {
				required: "заповніть поле!",
				minlength: "поле закоротке!",
				maxlength: "поле задовге!"
			},

			phone: {
				required: "заповніть поле!",
				digits: "введіть коректно номер",
				minlength: "поле закоротке!",
				maxlength: "поле задовге!"
			},

			adress: {
				required: "заповніть поле!",
				maxlength: "поле задовге!"
			}
		},

		submitHandler: function(form) {
			$(form).ajaxSubmit({
				success: function(data){

					if(data == "true"){
						$("#block_form_registration").fadeOut(300, function() {
							$("#reg_message").addClass("reg_message_good").fadeIn(400).html("Ви успішно оновили профіль!");
						});
					} else {
						$("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
					}
					
				}
			});
		}
	});	
</script>

</body>
</html>
