<div id="block-category">
	<p class="header-title">��������� �������</p>
	<ul>
		<li><a id="index1"><img src="/images/mobile-icon.gif" id="mobile-images">��������� ��������</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=mobile"><strong>��� ������</strong></a></li>
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'mobile'",$link);
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
		<li><a id="index2"><img src="/images/book-icon.gif" id="book-images">��������</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=notebook"><strong>��� ������</strong></a></li>
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'notebook'",$link);
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
				<li><a id="index3"><img src="/images/table-icon.gif" id="table-images">��������</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=notepad"><strong>��� ������</strong></a></li>
				<?php
				$result = mysql_query("SELECT * FROM category WHERE type = 'notepad'",$link);
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