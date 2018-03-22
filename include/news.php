<div class="block_news">
		<center><i class="material-icons drop_up">arrow_drop_up</i></center>
	<div class="new_sticker">
		<ul>
			<?php 
					$sql_num_rows = Connect::$connect->prepare(' SELECT COUNT(*) FROM `news` ');
					$sql_num_rows->execute();
					$num_rows = $sql_num_rows->fetchColumn();
					if($num_rows > 0){
						Connect::$sql = " SELECT * FROM `news` ";
						$query = Connect::$connect->prepare(Connect::$sql);
						$query->execute();
						while($row = $query->fetch(PDO::FETCH_ASSOC)){
							echo '
								<li>
									<span>'.$row['date'].'</span>
									<a href="#">'.$row['title'].'</a>
									<p>'.$row['text'].'</p>
								</li>
							';						
						}
					}
				?>
		</ul>
	</div>
		<center><i class="material-icons drop_down">arrow_drop_down</i></center>
</div>