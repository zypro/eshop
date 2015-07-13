<?php
define('myeshop', true);
	include 'include/db_connect.php';
	include 'functions/functions.php';
	session_start();
	include 'include/auth_cookie.php';
	$cat = clear_string($_GET["cat"]);
	$type = clear_string($_GET["type"]);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="trackbar/trackbar.css">
	<script src="/js/jquery-1.8.2.min.js"></script>
	<script src="/js/jcarousellite_1.0.1.js"></script>
	<script src="/js/eshop-script.js"></script>
	<script src="/js/jquery.cookie.min.js"></script>
	<script src="/trackbar/jquery.trackbar.js"></script>
	<script src="/js/TextChange.js"></script>
	<title>Поиск по параметрам</title>
</head>
<body>
<div id="block-body">

<?php
	include 'include/block-header.php';
?>

	<div id="block-right">

<?php
	include 'include/block-category.php';
	include 'include/block-parameter.php';
	include 'include/block-news.php';
?>
	</div>
		<div id="block-content">
			<?php
				if ($_GET["brand"])
				{
					$check_brand = implode(',',$_GET["brand"]);
				}
				$start_price = (int)$_GET["start_price"];
				$end_price = (int)$_GET["end_price"];
				if (!empty($check_brand) OR !empty($end_price))
				{
					if (!empty($check_brand)) $query_brand = " AND brand_id IN($check_brand)";
					if (!empty($end_price)) $query_price = " AND price BETWEEN $start_price AND $end_price";
				}
				$result = mysql_query("SELECT * FROM table_products WHERE visible = '1' $query_brand $query_price ORDER BY products_id DESC",$link);
				if (mysql_num_rows($result) > 0)
				{
					$row = mysql_fetch_array($result);
					echo '<div id="block-sorting">
				<p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>
				<ul id="options-list">
					<li>Вид: </li>
					<li><img id="style-grid" src="/images/icon-grid.png"></li>
					<li><img id="style-list" src="/images/icon-list.png"></li>
				</ul>
			</div>
			<ul id="block-tovar-grid">';
					do
					{
					if ($row["image"] != "" && file_exists("./upload_images/".$row["image"]))
						{
						$img_path = './upload_images/'.$row["image"];
						$max_width = 200;
						$max_height = 200;
						 list($width, $height) = getimagesize($img_path);
						$ratioh = $max_height/$height;
						$ratiow = $max_width/$width;
						$ratio = min($ratioh, $ratiow);
						$width = intval($ratio*$width);
						$height = intval($ratio*$height);
						}else
						{
						$img_path = "/images/no-image.png";
						$width = 110;
						$height = 200;
						}
				$query_reviews = mysql_query("SELECT * FROM table_reviews WHERE products_id = '{$row["products_id"]}' AND moderate='1'",$link);  
				$count_reviews = mysql_num_rows($query_reviews);
						echo '
								<li>
									<div class="block-images-grid">
										<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
									</div>
									<p class="style-title-grid"><a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a></p>
									<ul class="reviews-and-counts-grid">
										<li><img src="/images/eye-icon.png"><p>'.$row["count"].'</p></li>
										<li><img src="/images/comment-icon.png"><p>'.$count_reviews.'</p></li>
									</ul>
									<a class="add-cart-style-grid" tid="'.$row["products_id"].'"></a>
									<p class="style-price-grid"><strong>'.$row["price"].'</strong> сом.</p>
									<div class="mini-features">'.$row["mini_features"].'</div>
								</li>
							';
					}
						while($row = mysql_fetch_array($result));

			?>
				</ul>
				<ul id="block-tovar-list">
			<?php
				$result = mysql_query("SELECT * FROM table_products WHERE visible = '1' $query_brand $query_price ORDER BY products_id DESC",$link);
				if (mysql_num_rows($result) > 0)
				{
					$row = mysql_fetch_array($result);
					do
					{
					if ($row["image"] != "" && file_exists("./upload_images/".$row["image"]))
						{
						$img_path = './upload_images/'.$row["image"];
						$max_width = 150;
						$max_height = 150;
						 list($width, $height) = getimagesize($img_path);
						$ratioh = $max_height/$height;
						$ratiow = $max_width/$width;
						$ratio = min($ratioh, $ratiow);
						$width = intval($ratio*$width);
						$height = intval($ratio*$height);
						}else
						{
						$img_path = "/images/noimages80x70.png";
						$width = 80;
						$height = 70;
						}
				$query_reviews = mysql_query("SELECT * FROM table_reviews WHERE products_id = '{$row["products_id"]}' AND moderate='1'",$link);  
				$count_reviews = mysql_num_rows($query_reviews);
						echo '
								<li>
									<div class="block-images-list">
										<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
									</div>
									<ul class="reviews-and-counts-list">
										<li><img src="/images/eye-icon.png"><p>'.$row["count"].'</p></li>
										<li><img src="/images/comment-icon.png"><p>'.$count_reviews.'</p></li>
									</ul>
									<p class="style-title-list"><a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a></p>
									<a class="add-cart-style-list" tid="'.$row["products_id"].'"></a>
									<p class="style-price-list"><strong>'.$row["price"].'</strong> сом.</p>
									<div class="style-text-list">'.$row["mini_description"].'</div>
								</li>
							';
					}
						while($row = mysql_fetch_array($result));
				}
			}else
				{
					echo '<h3>Категория не доступна или не создана!</h3>';
				}
			 ?>
			 	</ul>
		</div>
<?php
	include 'include/block-random.php';
	include 'include/block-footer.php';
?>
</div>
</body>
</html>