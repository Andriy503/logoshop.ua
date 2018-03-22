<div id="block_category">
	<p class="header_title">Категорії товарів</p>
	<ul>
		<!-- Phone -->
		<li><a id="index1" href="#"><i class="large material-icons phone_img">phone_android</i>Мобільні телефони</a>
			<ul class="pod_category">
				<li><a href='/'><strong>Всі моделі</strong></a></li>
				<?php 
					$sql_num_rows = Connect::$connect->prepare(' SELECT COUNT(*) FROM `category` WHERE `type` = "mobile" ');
					$sql_num_rows->execute();
					$num_rows = $sql_num_rows->fetchColumn();
					if($num_rows > 0){
						Connect::$sql = " SELECT * FROM `category` WHERE `type` = 'mobile' ";
						$query = Connect::$connect->prepare(Connect::$sql);
						$query->execute();
						while($row = $query->fetch(PDO::FETCH_ASSOC)){
							echo "<li><a href=' index.php?brand=".$row['brand']."&type=".$row['type']." '>".$row['brand']."</a></li>";
						}
					}
				?>
			</ul>
		</li>
		<!-- Tables -->
		<li><a id="index2" href="#"><i class="large material-icons air_img">airplay</i>Планшети</a>
			<ul class="pod_category">
				<li><a href="#"><strong>Всі моделі</strong></a></li>
				<?php 
					$sql_num_rows = Connect::$connect->prepare(' SELECT COUNT(*) FROM `category` WHERE `type` = "notepad" ');
					$sql_num_rows->execute();
					$num_rows = $sql_num_rows->fetchColumn();
					if($num_rows > 0){
						Connect::$sql = " SELECT * FROM `category` WHERE `type` = 'notepad' ";
						$query = Connect::$connect->prepare(Connect::$sql);
						$query->execute();
						while($row = $query->fetch(PDO::FETCH_ASSOC)){
							echo "<li><a href=' index.php?brand=".$row['brand']."&type=".$row['type']." '>".$row['brand']."</a></li>";
						}
					}
				?>
			</ul>
		</li>
		<!-- Notebook -->
		<li><a id="index3" href="#"><i class="large material-icons notebook_img">laptop_mac</i>Ноутбуки</a>
			<ul class="pod_category">
				<li><a href="#"><strong>Всі моделі</strong></a></li>
				<?php 
					$sql_num_rows = Connect::$connect->prepare(' SELECT COUNT(*) FROM `category` WHERE `type` = "notebook" ');
					$sql_num_rows->execute();
					$num_rows = $sql_num_rows->fetchColumn();
					if($num_rows > 0){
						Connect::$sql = " SELECT * FROM `category` WHERE `type` = 'notebook' ";
						$query = Connect::$connect->prepare(Connect::$sql);
						$query->execute();
						while($row = $query->fetch(PDO::FETCH_ASSOC)){
							echo "<li><a href=' index.php?brand=".$row['brand']."&type=".$row['type']." '>".$row['brand']."</a></li>";
						}
					}
				?>
			</ul>
		</li>
	</ul>
</div>