<?php 

	include("include/functions/db_connect.php");

// GET запит на вибірку по моделях
	    if(isset($_GET['brand']) && isset($_GET['type'])){
	    	$brand = $_GET['brand'];
	    	$type = $_GET['type'];
	    }

// GET запит на сортування
		if(isset($_GET['sort'])){
			$sorting = $_GET['sort'];

			switch ($sorting) {
				case 'price-asc':
					$sorting = "price ASC";
					$sort_name = "Від дешевих до дорогих";
					break;
				case 'price-desc':
					$sorting = "price DESC";
					$sort_name = "Від дорогих до дешевих";
					break;
				case 'popular':
					$sorting = "count DESC";
					$sort_name = "Популярні";
					break;
				case 'news':
					$sorting = "date_time ASC";
					$sort_name = "Новинки";
					break;
				case 'brand':
					$sorting = "brand";
					$sort_name = "Від А по Я";
					break;

				default:
					$sorting = "id DESC";
					break;
			}
	    }
// GET запит на пошук по параметрах
	    if(isset($_GET['send_filters_search'])){

	    	if(!empty($_GET['start_price']) || !empty($_GET['end_price'])){
	    		$start_price = $_GET['start_price'];
	    		$end_price = $_GET['end_price'];

	    		if (!empty($_GET['brand'])) {
	    			$check_brand = implode(",", $_GET['brand']);
	    		}

	    	}
	    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LogoShop</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/content.css">
	<link rel="stylesheet" type="text/css" href="js/library/track/jQuery/trackbar.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- JS -->
	<script src="js/library/jquery.js"></script>
	<script type="text/javascript" src="js/library/jcarousellite_1.0.1.js"></script>
	<script type="text/javascript" src="js/library/jquery.cookie-1.4.1.min.js"></script>
	<script type="text/javascript" src="js/library/track/jQuery/jquery.trackbar.js"></script>
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

