<?php 
	include 'include/db_connect.php';
	include 'functions/functions.php';
	session_start();
	include 'include/auth_cookie.php';
	$id = clear_string($_GET["id"]);

	If ($id != $_SESSION['countid'])
{
$querycount = mysql_query("SELECT count FROM table_products WHERE products_id='$id'",$link);
$resultcount = mysql_fetch_array($querycount);

$newcount = $resultcount["count"] + 1;

$update = mysql_query ("UPDATE table_products SET count='$newcount' WHERE products_id='$id'",$link);
}
$_SESSION['countid'] = $id;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="trackbar/trackbar.css">
	<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
	<script type="text/javascript" src="/js/eshop-script.js"></script>
	<script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
	<script type="text/javascript" src="/js/TextChange.js"></script>
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
			<?php
				$result1 = mysql_query("SELECT * FROM table_products WHERE products_id = '$id' AND visible = '1'",$link);
				if (mysql_num_rows($result1) > 0)
				{
					$row1 = mysql_fetch_array($result1);
					do
					{
					if (strlen($row1["image"]) > 0 && file_exists("./upload_images/".$row1["image"]))
						{
						$img_path = './upload_images/'.$row1["image"];
						$max_width = 300;
						$max_height = 300;
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
						echo '
							<div id="block-breadcrumbs-and-rating">
								<p id="nav-breadcrumbs"><a href="view_mobile.php">Мобильные телефоны</a> \ <span>'.$row1["brand"].'</span></p>
							</div>
							<div id="block-content-info"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
								<div id="block-mini-description">
									<p id="content-title">'.$row1["title"].'</p>
									<ul class="reviews-and-counts-content">
										<li><img src="/images/eye-icon.png"><p>'.$row1["count"].'</p></li>
										<li><img src="/images/comment-icon.png"><p>0</p></li>
									</ul>
									<p id="style-price">'.group_numerals($row1["price"]).' сом</p>
									<a class="add-cart" id="add-cart-view" tid="'.$row1["products_id"].'"></a>
									<p id="content-text">'.$row1["mini_description"].'</p>
								</div>
							</div>
						';
					}
					while ($row1 = mysql_fetch_array($result1));
				}
			?>
		</div>
<?php
	include 'include/block-footer.php';
?>
</div>
</body>
</html>