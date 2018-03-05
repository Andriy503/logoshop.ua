<ul id="block_tovar_grid">
<?php 

	function showAllUser() {
		
		// Визначчаємо чи існують запити в БД
		$sql_num_rows = Connect::$connect->prepare(' SELECT COUNT(*) FROM `tovary` ');
		$sql_num_rows->execute();
		$num_rows = $sql_num_rows->fetchColumn();

		if($num_rows > 0) {
			Connect::$sql = " SELECT * FROM `tovary` WHERE 1 = 1 ";
			$query = Connect::$connect->prepare(Connect::$sql);
			$query->execute();
		} else {
			echo "Товарів немає!";
			die();
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
			 			<li><i class="material-icons">remove_red_eye</i></li>
			 			<li><i class="material-icons">comment</i></li>
			 		</ul>
			 		<a class="add_basket"></a>
			 		<p class="block_price_grid"><strong>'.$row['price'].'</strong> грн.</p>
			 		<div class="block_mini-features_grid">'.$row['mini_features'].'
			 		</div>
			 	</li>
			 ';
		}
	}

	showAllUser();
	
?>
</ul>