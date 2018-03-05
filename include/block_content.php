<div class="head_sorting">
	<p id="nav_breadcrumbs">
		<a href="index.php">Головна сторінка</a>
		\ <span>Всі товари</span>
	</p>
	<ul id="option_list">
		<li>Вид: </li>
		<li><img src="images/icon_grid.png" width="29"></li>
		<li><img src="images/icon_list.png" width="29"></li>

		<li id="padd_sort">Сортувати: </li>
		<li><a href="#" id="select_sort">Без сортування</a>

			<ul id="sorting_list">
				<li><a href="#">Від дешевих до дорогих</a></li>
				<li><a href="#">Від дорогих до дешевих</a></li>
				<li><a href="#">Популярні</a></li>
				<li><a href="#">Новинки</a></li>
				<li><a href="#">Від А по Я</a></li>
			</ul>
		</li>
	</ul>
</div>	

<!-- Підключаємо файл де будемо виводити товари  -->
<?php include("functions/output_tovary.php");?>