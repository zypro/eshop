<?php 
	include 'include/db_connect.php';
	include 'functions/functions.php';
	session_start();
	include 'include/auth_cookie.php';
	// Завершение сессии unset($_SESSION['auth']);
	//setcookie('rememberme','',0,'/');
	$sorting = $_GET["sort"];
		switch($sorting)
		{
			case 'price-asc';
			$sorting = 'price ASC';
			$sort_name = 'От дешевых к дорогим';
			break;

			case 'price-desc';
			$sorting = 'price DESC';
			$sort_name = 'От дорогих к дешевым';
			break;

			case 'popular';
			$sorting = 'count DESC';
			$sort_name = 'Популярное';
			break;

			case 'news';
			$sorting = 'datetime DESC';
			$sort_name = 'Новинки';
			break;

			case 'brand';
			$sorting = 'brand';
			$sort_name = 'От А до Я';
			break;

			default:
			$sorting = 'products_id DESC';
			$sort_name = 'Нет сортировки';
			break;
		}
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
	<title>Интернет магазин Косметики</title>
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
			<div id="block-sorting">
				<p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>
				<ul id="options-list">
					<li>Вид: </li>
					<li><img id="style-grid" src="/images/icon-grid.png"></li>
					<li><img id="style-list" src="/images/icon-list.png"></li>
					<li>Сортировка: </li>
					<li><a id="select-sort"><?php echo $sort_name; ?></a>
				<ul id="sorting-list">
					<li><a href="index.php?sort=price-asc">От дешевых к дорогим</a></li>
					<li><a href="index.php?sort=price-desc">От дорогих к дешевым</a></li>
					<li><a href="index.php?sort=popular">Популярное</a></li>
					<li><a href="index.php?sort=news">Новинки</a></li>
					<li><a href="index.php?sort=brand">От А до Я</a></li>
				</ul>
					</li>
				</ul>
			</div>
				<ul id="block-tovar-grid">
			<?php
			// Постраничная навигация
	$num = 5;
	$page = (int)$_GET['page'];
	$count = mysql_query("SELECT COUNT(*) FROM table_products WHERE visible = '1'",$link);
	$temp = mysql_fetch_array($count);
	If ($temp[0] > 0)
	{
	$tempcount = $temp[0];
	$total = (($tempcount - 1) / $num) + 1;
	$total =  intval($total);
	$page = intval($page);
	if(empty($page) or $page < 0) $page = 1;
	if($page > $total) $page = $total;
	$start = $page * $num - $num;
	$qury_start_num = " LIMIT $start, $num";
	}
				$result = mysql_query("SELECT * FROM table_products WHERE visible = '1' ORDER BY $sorting $qury_start_num",$link);
				if (mysql_num_rows($result) > 0)
				{
					$row = mysql_fetch_array($result);
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
									<p class="style-price-grid"><strong>'.group_numerals($row["price"]).'</strong> сом.</p>
									<div class="mini-features">'.$row["mini_features"].'</div>
								</li>
							';
					}
						while($row = mysql_fetch_array($result));
				}
			 ?>
			 	</ul>
			 	<ul id="block-tovar-list">
			<?php
				$result = mysql_query("SELECT * FROM table_products WHERE visible = '1' ORDER BY $sorting $qury_start_num",$link);
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
									<p class="style-price-list"><strong>'.group_numerals($row["price"]).'</strong> сом.</p>
									<div class="style-text-list">'.$row["mini_description"].'</div>
								</li>
							';
					}
						while($row = mysql_fetch_array($result));
				}
						echo '</ul>';
if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="index.php?page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="index.php?page='.($page + 1).'">&gt;</a></li>';


// Формируем ссылки со страницами
if($page - 5 > 0) $page5left = '<li><a href="index.php?page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="index.php?page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="index.php?page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="index.php?page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="index.php?page='.($page - 1).'">'.($page - 1).'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="index.php?page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="index.php?page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="index.php?page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="index.php?page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="index.php?page='.($page + 1).'">'.($page + 1).'</a></li>';

if ($page+5 < $total)
{
$strtotal = '<li><p class="nav-point">...</p></li><li><a href="index.php?page='.$total.'">'.$total.'</a></li>';
}else
{
$strtotal = "";
}

if ($total > 1)
{
echo '
<div class="pstrnav">
<ul>
';
echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='index.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
echo '
</ul>
</div>
';
}
			?>
				
		</div>
<?php
	include 'include/block-footer.php';
 ?>
</div>
</body>
</html>