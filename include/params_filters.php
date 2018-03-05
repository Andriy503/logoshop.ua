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
			<li><input type="checkbox" id="check_brand_1"><label for="check_brand_1">Бренд_1</label></li>
			<li><input type="checkbox" id="check_brand_2"><label for="check_brand_2">Бренд_2</label></li>
			<li><input type="checkbox" id="check_brand_3"><label for="check_brand_3">Бренд_3</label></li>
			<li><input type="checkbox" id="check_brand_4"><label for="check_brand_4">Бренд_4</label></li>
		</ul>

		<center><input type="submit" name="send_filters_search" id="send_filters_search" value="Знайти"></center>
	</form>
</div>