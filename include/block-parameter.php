<?php
	defined('myeshop') or die('Доступ запрещён!');
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#blocktrackbar').trackbar ({
			onMove : function(){
				document.getElementById("start-price").value = this.leftValue;
				document.getElementById("end-price").value = this.rightValue;
			},
			width : 160,
			leftLimit : 30,
			leftValue :
			<?php
			if ((int)$_GET["start_price"] >= 30 AND (int)$_GET["start_price"] <= 1500) 
			{
				echo (int)$_GET["start_price"];
			}else
			{
				echo "30";
			}
			?>,
			rightLimit : 1500,
			rightValue :
			<?php
			if ((int)$_GET["end_price"] >= 30 AND (int)$_GET["end_price"] <= 1500) 
			{
				echo (int)$_GET["end_price"];
			}else
			{
				echo "1000";
			}
			?>,
			roundUp : 5
		});
	});
</script>
<div id="block-parameter">
	<p class="header-title">Поиск по параметрам</p>
		<p class="title-filter">Стоимость</p>
		<form method="GET" action="search_filter.php">
		<div id="block-input-price">
			<ul>
				<li><p>от</p></li>
				<li><input type="text" id="start-price" name="start_price" value="20"></li>
				<li><p>до</p></li>
				<li><input type="text" id="end-price" name="end_price" value="3000"></li>
				<li><p>сом.</p></li>
			</ul>
		</div>

		<div id="blocktrackbar"></div>
		<p class="title-filter">Производители</p>
		<ul class="checkboxbrand">
		<?php 
			$result = mysql_query("SELECT * FROM category",$link);
				if (mysql_num_rows($result) > 0)
				{
					$row = mysql_fetch_array($result);
					do
					{
						$checked_brand = "";
						if ($_GET["brand"])
						{
							if (in_array($row["id"],$_GET["brand"]))
							{
								$checked_brand = "checked";
							}
						}
						echo '<li><input '.$checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkbrand'.$row["id"].'"><label for="checkbrand'.$row["id"].'">'.$row["brand"].'</label></li>';
					}
					while ($row = mysql_fetch_array($result));
					}
		 ?>
		</ul>
		<center><input type="submit" name="submit" id="button-param-search" value=" "></center>
		</form>
</div>