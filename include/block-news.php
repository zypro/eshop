<?php
	defined('myeshop') or die('Доступ запрещён!');
?>
<div id="block-news">
	<center><img src="/images/img-prev.png" id="news-prev"></center>
	<div id="newsticker">
		<ul>
<?php
	$result = mysql_query("SELECT * FROM news ORDER BY id DESC",$link);
		if (mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result);
			do
			{
				echo '<li>
				<span>'.$row["date"].'</span>
				<a href="#">'.$row["title"].'</a>
				<p>'.$row["text"].'</p>
					</li>';
			}
			while ($row = mysql_fetch_array($result));
		}
?>
		</ul>
	</div>
	<center><img src="/images/img-next.png" id="news-next"></center>
</div>