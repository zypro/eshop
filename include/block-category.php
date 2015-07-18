<?php
	defined('myeshop') or die('Доступ запрещён!');
?>
<div id="block-category">
	<p class="header-title">Категории товаров</p>
	<ul>
		<li><a id="index1"><img src="/images/makeup.png" id="makeup-images">Макияж</a>
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
		<li><a id="index2"><img src="/images/care.png" id="care-images">Уход</a>
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
			<li><a id="index3"><img src="/images/hygiene.png" id="hygiene-images">Гигиена</a>
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
			<li><a id="index4"><img src="/images/mans.png" id="mans-images">Мужчинам</a>
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
			<li><a id="index5"><img src="/images/kids.png" id="kids-images">Детям</a>
			<ul class="category-section">
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'kids'",$link);
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