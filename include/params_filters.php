<script type="text/javascript">
// TrackBar
	$(document).ready(function() {
		$('#track_bar').trackbar({
			onMove: function() {
				document.getElementById("start_price").value = this.leftValue;
				document.getElementById("end_price").value = this.rightValue;
			},
			width: 160,
			leftLimit: 1000,
			leftValue: 
			<?php 
				if(($_GET['start_price'] >= 1000) AND ($_GET['end_price'] <= 50000)) {
					echo (int)$_GET['start_price']; 
				} else { echo "1000"; }; 
			?>,
			rightLimit: 50000,
			rightValue: <?php 
				if(($_GET['end_price'] >= 1000) AND ($_GET['end_price'] <= 50000)) {
					echo (int)$_GET['end_price']; 
				} else { echo "20000"; }; 
			?>,
			roundUp: 1000
		});


	});

</script>

<div id="params_filters">
	<p class="header_title">Пошук по параметрах</p>
	<p class="title_filter">Ціна</p>
	
	<form method="get" action="search_filter.php">

		<div id="block_input_price">
			<ul>
				<li><p>від</p></li>
				<li><input type="text" name="start_price" id="start_price" value="1000"></li>
				<li><p>до</p></li>
				<li><input type="text" name="end_price" id="end_price" value="100000"></li>
				<li><p>грн</p></li>
			</ul>
		</div>

		<!-- track_bar -->
		<div id="track_bar"></div>

		<!-- check_box -->
		<p class="title_filter">Виробник</p>
		<ul class="check_box_brand">
			<?php 
					$sql_num_rows = Connect::$connect->prepare(' SELECT COUNT(*) FROM `category` WHERE `type` = "mobile" ');
					$sql_num_rows->execute();
					$num_rows = $sql_num_rows->fetchColumn();
					if($num_rows > 0){
						Connect::$sql = " SELECT * FROM `category` WHERE `type` = 'mobile' ";
						$query = Connect::$connect->prepare(Connect::$sql);
						$query->execute();
						while($row = $query->fetch(PDO::FETCH_ASSOC)){
							// перевірка на активність чекбокса
							if($check_brand) {
								$manula = explode(",", $check_brand);
								for ($i=0; $i < count($manula); $i++) { 
									if($row['id'] == $manula[$i]){
										$checked = "checked";
									}
								}
							}

							echo '<li><input type="checkbox" '.$checked.' name="brand[]" value='.$row['id'].' id='.$row['brand'].'><label for='.$row['brand'].'>'.$row['brand'].'</label></li>';
							$checked = "";
						}
					}
				?>
		</ul>

		<center><input type="submit" name="send_filters_search" id="send_filters_search" value="Знайти"></center>
	</form>
</div>