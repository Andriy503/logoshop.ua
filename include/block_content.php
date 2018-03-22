<?php 
	if(isset($_GET['brand']) && isset($_GET['type'])){
		$get_filter = "brand=$brand&type=$type";
	}
?>
<div class="head_sorting">
	<p id="nav_breadcrumbs">
		<a href="index.php">Головна сторінка</a>
		\ <span>Всі товари</span>
	</p>
	<ul id="option_list">
		<li>Вид: </li>
		<li><img id="icon_grid" src="images/icon_grid.png" width="29"></li>
		<li><img id="icon_list" src="images/icon_list.png" width="29"></li>

		<li id="padd_sort">Сортувати: </li>
		<li><a href="#" id="select_sort"><?php if($sort_name){echo $sort_name;} else echo "Немає сортування"; ?></a>
			<ul id="sorting_list">
				<li><a href="<?php if(!empty($get_filter)){echo "index.php?$get_filter&sort=price-asc";} else {echo "index.php?sort=price-asc"; } ?>">Від дешевих до дорогих</a></li>
				<li><a href="<?php if(!empty($get_filter)){echo "index.php?$get_filter&sort=price-desc";} else {echo "index.php?sort=price-desc"; } ?>">Від дорогих до дешевих</a></li>
				<li><a href="<?php if(!empty($get_filter)){echo "index.php?$get_filter&sort=popular";} else {echo "index.php?sort=popular"; } ?>">Популярні</a></li>
				<li><a href="<?php if(!empty($get_filter)){echo "index.php?$get_filter&sort=news";} else {echo "index.php?sort=news"; } ?>">Новинки</a></li>
				<li><a href="<?php if(!empty($get_filter)){echo "index.php?$get_filter&sort=brand";} else {echo "index.php?sort=brand"; } ?>">Від А по Я</a></li>
			</ul>
		</li>
	</ul>
</div>	

<!-- Підключаємо файл де будемо виводити товари  -->
<?php include("functions/output_tovary.php");?>