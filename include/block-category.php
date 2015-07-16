<?php
	defined('myeshop') or die('Доступ запрещён!');
?>
<div id="block-category">
	<p class="header-title">Категории товаров</p>
	<ul>
		<li><a id="index1"><img src="/images/mobile-icon.gif" id="mobile-images"><strong>Макияж</strong></a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=makeup"><strong>Все товары</strong></a></li>
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'makeup'",$link);
				if (mysql_num_rows($result) > 0)
				{
				$row = mysql_fetch_array($result);
					do
					{
						echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
					}
					while($row = mysql_fetch_array($result));
				}
				?>

			</ul>
		</li>
		<li><a id="index2"><img src="/images/book-icon.gif" id="book-images"><strong>Уход</strong></a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=care"><strong>Все товары</strong></a></li>
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'care'",$link);
				if (mysql_num_rows($result) > 0)
				{
				$row = mysql_fetch_array($result);
					do
					{
						echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
					}
					while($row = mysql_fetch_array($result));
				}
				?>
			</ul>
		</li>
			<li><a id="index3"><img src="/images/table-icon.gif" id="table-images"><strong>Гигиена</strong></a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=hygiene"><strong>УХОД ЗА ЗУБАМИ</strong></a></li>
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'hygiene'",$link);
				if (mysql_num_rows($result) > 0)
				{
				$row = mysql_fetch_array($result);
					do
					{
						echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
					}
					while($row = mysql_fetch_array($result));
				}
				?>
			</ul>
		</li>
					<li><a id="index4"><img src="/images/table-icon.gif" id="table-images"><strong>Мужчинам</strong></a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=mans"><strong>ДЕЗОДОРАНТЫ</strong></a></li>
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'mans'",$link);
				if (mysql_num_rows($result) > 0)
				{
				$row = mysql_fetch_array($result);
					do
					{
						echo '<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
					}
					while($row = mysql_fetch_array($result));
				}
				?>
			</ul>
		</li>
	</ul>
</div>