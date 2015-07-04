<div id="block-parameter">
	<p class="header-title">Поиск по параметрам</p>
		<p class="title-filter">Стоимость</p>
		<form method="GET" action="search-filter.php">
		<div id="block-input-price">
			<ul>
				<li><p>от</p></li>
				<li><input type="text" id="start-price" name="start_price" value="20"></li>
				<li><p>до</p></li>
				<li><input type="text" id="end-price" name="end_price" value="3000"></li>
				<li><p>сом.</p></li>
			</ul>
		</div>
		</form>
		<div id="blocktrackbar"></div>
		<p class="title-filter">Производители</p>
		<ul class="checkboxbrand">
			<li><input type="checkbox" id="checkbrand1"><label for="checkbrand1">Apple1</label></li>
			<li><input type="checkbox" id="checkbrand2"><label for="checkbrand2">Apple2</label></li>
			<li><input type="checkbox" id="checkbrand3"><label for="checkbrand3">Apple3</label></li>
		</ul>
		<center><input type="submit" name="submit" id="button-param-search" value=" "></center>
</div>