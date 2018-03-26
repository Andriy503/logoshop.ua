<header>
	<div id="logo">
		<a href="/" title="На головну">
			<img src="images/4.png" title="logoshop.UA" alt="application" width="50">
			<span>logoshop.UA</span>
		</a>
	</div>
	<div id="about">
		<a href="https://uk.wikipedia.org/wiki/%D0%86%D0%BD%D1%82%D0%B5%D1%80%D0%BD%D0%B5%D1%82-%D0%BC%D0%B0%D0%B3%D0%B0%D0%B7%D0%B8%D0%BD" title="Дізнатись про рекламу">Про нас</a>
		<a href="#">Зворотній зв'язок</a>
	</div>
	<?php
		if($_SESSION['auth'] == "yes"){
			// <i class="material-icons ttt">person</i>
			echo '<p id="auth_user_info" align="right">Вітання, '.$_SESSION['auth_name'].'! </p><img class="logo_sign_in" src="images/user.png" width="40" align="right">';
		} else {
			echo '
				<div id="reg_auth">
					<a href="sign_in.php" title="Увійти">
						<div class="btn">
							Увійти
						</div>
					</a>
					<a href="registration.php" title="Реєстрація">
						<div class="btn">
							Реєстрація
						</div>
					</a>
				</div>		
				';
		}
	?>
</header>