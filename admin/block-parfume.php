<?php
	defined('myeshop') or die('Доступ запрещён!');
?>
<div id="block-parfume">
	<p class="header-title">Парфюм</p>
	<ul>
		<li><a id="index1"><img src="/images/makeup.png" id="makeup-images">Мужчинам</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=mans-parfume"><strong>Все товары</strong></a></li>
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'mans-parfume'",$link);
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
		<li><a id="index2"><img src="/images/care.png" id="care-images">Женщинам</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=womans-parfume"><strong>Все товары</strong></a></li>
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'womans-parfume'",$link);
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