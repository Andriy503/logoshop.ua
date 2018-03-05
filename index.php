<?php 
	include("include/functions/db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LogoShop</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/content.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- JS -->
	<script src="js/library/jquery.js"></script>
	<script type="text/javascript" src="js/library/jcarousellite_1.0.1.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="content">
			<!-- header  -->
			<?php include("include/header.php"); ?>

			<!-- nav -->
			<?php include("include/nav.php"); ?>

			<!-- Контент -->

			<div id="block_content">
				<?php include("include/block_content.php"); ?>
			</div>

			<div id="block_category_filter">
				<?php include("include/filters.php");
					  include("include/params_filters.php");
					  include("include/news.php");
				?>
			</div>
		</div>		

			<?php include("include/footer.php"); ?>
	</div>

</body>
</html>