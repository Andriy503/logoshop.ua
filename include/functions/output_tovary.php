<ul id="block_tovar_grid">
<?php 
class showContents{

	function showAllUserGrid($sorting = "", $brand = "", $type = "", $start_price = "", $end_price, $check_brand) {
		
		if($brand && $type){
			$mini_sql = " AND `brand` = '$brand' AND `type_category` = '$type' ";
			$sql_num_rows = Connect::$connect->prepare(" SELECT COUNT(*) FROM `tovary` WHERE `brand` = '$brand' AND `type_category` = '$type' ");
			$sql_num_rows->execute();
			$num_rows = $sql_num_rows->fetchColumn();
		} else {
			$mini_sql = "";
			$sql_num_rows = Connect::$connect->prepare(" SELECT COUNT(*) FROM `tovary` ");
			$sql_num_rows->execute();
			$num_rows = $sql_num_rows->fetchColumn();	
		}

		if($check_brand) {
			$access_check_brand = " AND `brand_id` IN ($check_brand) ";
		} 

		if($start_price || $end_price){
			$price_diapaz = " AND  `price` BETWEEN $start_price AND $end_price ";
		} 

		if($num_rows > 0) {
			// перевірка чи потрібно сорутвати поля
			if($sorting != ""){
				$main_sort = " ORDER BY ". $sorting;
			} else {
				$main_sort = "";
			}

			if($access_check_brand || $end_price) {
				Connect::$sql = " SELECT COUNT(*) FROM `tovary` WHERE `visible` = '1' $mini_sql $access_check_brand $price_diapaz $main_sort ";
				$query = Connect::$connect->prepare(Connect::$sql);
				$query->execute();
				$num_rows = $query->fetchColumn();
				if(!$num_rows > 0){
					echo "<h1 class='not_found'>По даних критеріях товар не знайдено :(</h1>";
				}
			}

			$N = 15;
			if(!isset($_GET['page'])) {
				$page = 0;
			} else {
				$page = $_GET['page'];
			}
			$records = $page * $N;

			Connect::$sql = " SELECT * FROM `tovary` WHERE `visible` = '1' $mini_sql $access_check_brand $price_diapaz $main_sort LIMIT ".$records.", $N ";
			$query = Connect::$connect->prepare(Connect::$sql);
			$query->execute();
		} else {
			echo "<h1 class='not_found2'>Немає товарів! :(</h1>";
			return;
		}
		
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			// Адаптує картинку під розміри 
			if ($row['image_src'] != "" && file_exists('images/tovary/'.$row["image_src"])){
				$img_path = 'images/tovary/'.$row["image_src"];
				$max_width = 130;
				$max_height = 300;
				list($width, $heigth) = getimagesize($img_path);
				$ratioh = $max_height / $max_width;
				$ratiow = ($max_width / $width);
				$ratio = min($ratioh, $ratiow);
				$width = intval($ratio*$width);
				$heigth = intval($ratio*$heigth);
			} else {
				$img_path = "images/tovary/no_name.png";
				$width = 130;
				$height = 300;
			}

			echo '
			 	<li>
			 		<div class="block_img_grid">
			 			<img src="'.$img_path.'" width="'.$width.'" heigth="'.$heigth.'"/>
			 		</div>
			 		<p class="block_name_grid"><a href="#">'.$row['name'].'</a></p>
			 		<ul class="block_revies_count_grid">
			 			<li><i class="material-icons">remove_red_eye</i><p>0</p></li>
			 			<li><i class="material-icons">comment</i><p>0</p></li>
			 		</ul>

			 		<a class="add_basket" title="В корзину"></a>
			 		<p class="block_price_grid"><strong>'.$row['price'].'</strong> грн.</p>
			 		<div class="block_mini_features_grid">'.$row['mini_features'].'
			 		</div>
			 	</li>
			 ';
		}
		// // Посторінковий вивід

		$url_parce = parse_url($_SERVER['REQUEST_URI']);
		$tt = implode("", $url_parce);
		if(strlen($tt) < 19){
			echo "<ul class='nav_pages'>";
			// ************
				$url_parce = parse_url($_SERVER['REQUEST_URI']);
				foreach ($url_parce as $key => $value) {
					if($key == "query"){
						$blocker_array_url = explode("=", $value);
						if($blocker_array_url[1] == 0){
							$id = "main_page_nav";
						}
					}
				}
			// ************

			echo "Сторінка:<li><a href='index.php?page=0' class='cls' id=".$id." > 1 </a></li>";
			for ($i=15, $ii=2, $jod=1; $i < $num_rows; $i=$i+15, $ii++, $jod++) { 
					if(1 == 1 ) {$cls = "cls"; }			
					if($_GET['page'] == $jod) {$other_id = "different_pages_navigates";}
					echo "<li><a href='index.php?page=".$jod." ' class=$cls id=".$other_id." > $ii </a></li>";
					$other_id = "";
					$id = "";
				}
			echo "</ul>";
		}
	}
}

$ext_class = new showContents();
$ext_class->showAllUserGrid($sorting, $brand, $type, $start_price, $end_price, $check_brand);

?>
</ul>

<ul id="block_tovar_list">
<?php
class showContentsList{
	function showAllUserList($sorting = "", $brand, $type, $start_price = "", $end_price, $check_brand) {

		if($brand && $type){
			$mini_sql = " AND `brand` = '$brand' AND `type_category` = '$type' ";
			$sql_num_rows = Connect::$connect->prepare(" SELECT COUNT(*) FROM `tovary` WHERE `brand` = '$brand' AND `type_category` = '$type' ");
			$sql_num_rows->execute();
			$num_rows = $sql_num_rows->fetchColumn();	
		} else {
			$mini_sql = "";
			$sql_num_rows = Connect::$connect->prepare(" SELECT COUNT(*) FROM `tovary` ");
			$sql_num_rows->execute();
			$num_rows = $sql_num_rows->fetchColumn();	
		}

		if($check_brand) {
			$access_check_brand = " AND `brand_id` IN ($check_brand) ";
		} 

		if($start_price || $end_price){
			$price_diapaz = " AND  `price` BETWEEN $start_price AND $end_price ";
		} 
		
		if($num_rows > 0) {
			if($sorting != ""){
				$main_sort = " ORDER BY ". $sorting;
			} else {
				$main_sort = "";
			}

			if($access_check_brand || $end_price) {
				Connect::$sql = " SELECT COUNT(*) FROM `tovary` WHERE `visible` = '1' $mini_sql $access_check_brand $price_diapaz $main_sort ";
				$query = Connect::$connect->prepare(Connect::$sql);
				$query->execute();
				$num_rows = $query->fetchColumn();
				if(!$num_rows > 0){
					echo "<h1 class='not_found'>По даних критеріях товар не знайдено :(</h1>";
				}
			}

			$N = 8;
			if(!isset($_GET['page'])) {
				$page = 0;
			} else {
				$page = $_GET['page'];
			}
			$records = $page * $N;

			Connect::$sql = " SELECT * FROM `tovary` WHERE `visible` = '1' $mini_sql $access_check_brand $price_diapaz $main_sort LIMIT ".$records.", $N";
			$query = Connect::$connect->prepare(Connect::$sql);
			$query->execute();
		} else {
			echo "<h1 class='not_found2'>Немає товарів! :(</h1>";
			return;
		}
		
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			// Адаптує картинку під розміри 
			if ($row['image_src'] != "" && file_exists('images/tovary/'.$row["image_src"])){
				$img_path = 'images/tovary/'.$row["image_src"];
				$max_width = 100;
				$max_height = 100;
				list($width, $heigth) = getimagesize($img_path);
				$ratioh = $max_height / $max_width;
				$ratiow = ($max_width / $width);
				$ratio = min($ratioh, $ratiow);
				$width = intval($ratio*$width);
				$heigth = intval($ratio*$heigth);
			} else {
				$img_path = "images/tovary/no_name.png";
				$width = 100;
				$height = 100;
			}

			echo '
			 	<li>
			 		<div class="block_img_list">
			 			<img src="'.$img_path.'" width="'.$width.'" heigth="'.$heigth.'"/>
			 		</div>

			 		<ul class="block_revies_count_list">
			 			<li><i class="material-icons">remove_red_eye</i><p>0</p></li>
			 			<li><i class="material-icons">comment</i><p>0</p></li>
			 		</ul>

			 		<p class="block_name_list"><a href="#">'.$row['name'].'</a></p>

			 		<a class="add_basket_list" title="В корзину"></a>
			 		<p class="block_price_list"><strong>'.$row['price'].'</strong> грн.</p>
			 		<div class="block_mini_features_list">'.$row['mini_description'].'
			 		</div>
			 	</li>
			 ';		 
		}

		// Посторінковий вивід
		$url_parce = parse_url($_SERVER['REQUEST_URI']);
		$tt = implode("", $url_parce);
		if(strlen($tt) < 19){
			echo "<ul class='nav_pages'>";
	// ************
			$url_parce = parse_url($_SERVER['REQUEST_URI']);
			foreach ($url_parce as $key => $value) {
				if($key == "query"){
					$blocker_array_url = explode("=", $value);
					if($blocker_array_url[1] == 0){
						$id = "main_page_nav";
					}
				}
			}
	// ************

			echo "Сторінка:<li><a href='index.php?page=0' class='cls' id=".$id." > 1 </a></li>";
			for ($i=8, $ii=2, $jod=1; $i < $num_rows; $i=$i+8, $ii++, $jod++) { 
				if(1 == 1 ) {$cls = "cls"; }			
				if($_GET['page'] == $jod) {$other_id = "different_pages_navigates";}
				echo "<li><a href='index.php?page=".$jod." ' class=$cls id=".$other_id." > $ii </a></li>";
				$other_id = "";
				$id = "";
			}
			echo "</ul>";
		}
	}
}

$ext_cls = new showContentsList();
$ext_cls->showAllUserList($sorting, $brand, $type, $start_price, $end_price, $check_brand);

?>
</ul>