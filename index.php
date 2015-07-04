<?php 
	include 'include/db_connect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="windows-1251">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
	<script type="text/javascript" src="/js/eshop-script.js"></script>
	<script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
	<title>�������� �������</title>
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
				<p id="nav-breadcrumbs"><a href="index.php">������� ��������</a> \ <span>��� ������</span></p>
				<ul id="options-list">
					<li>���: </li>
					<li><img id="style-grid" src="/images/icon-grid.png"></li>
					<li><img id="style-list" src="/images/icon-list.png"></li>
					<li>����������: </li>
					<li><a id="select-sort">��� ����������</a>
				<ul id="sorting-list">
					<li><a href="">�� ������� � �������</a></li>
					<li><a href="">�� ������� � �������</a></li>
					<li><a href="">����������</a></li>
					<li><a href="">�������</a></li>
					<li><a href="">�� � �� �</a></li>
				</ul>
					</li>
				</ul>
			</div>
				<ul id="block-tovar-grid">
			<?php 
				$result = mysql_query("SELECT * FROM table_products WHERE visible = '1'",$link);
				if (mysql_num_rows($result) > 0) 
				{
					$row = mysql_fetch_array($result);
					do
					{
					if ($row["image"] != "" && file_exists("/upload_images/".$row["image"]))
						{
						$img_path = '/upload_images/'.$row["image"];
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
						echo '
								<li>
									<div class="block-images-grid">
										<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
									</div>
									<p class="style-title-grid"><a href="">'.$row["title"].'</a></p>
									<ul class="reviews-and-counts-grid">
										<li><img src="/images/eye-icon.png"><p>0</p></li>
										<li><img src="/images/comment-icon.png"><p>0</p></li>
									</ul>
									<a class="add-cart-style-grid"></a>
									<p class="style-price-grid"><strong>'.$row["price"].'</strong> ���.</p>
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
				$result = mysql_query("SELECT * FROM table_products WHERE visible = '1'",$link);
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
						echo '
								<li>
									<div class="block-images-list">
										<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
									</div>
									<ul class="reviews-and-counts-list">
										<li><img src="/images/eye-icon.png"><p>0</p></li>
										<li><img src="/images/comment-icon.png"><p>0</p></li>
									</ul>
									<p class="style-title-list"><a href="">'.$row["title"].'</a></p>
									<a class="add-cart-style-list"></a>
									<p class="style-price-list"><strong>'.$row["price"].'</strong> ���.</p>
									<div class="style-text-list">'.$row["mini_description"].'</div>
								</li>
							';
					}
						while($row = mysql_fetch_array($result));
				}
			 ?>
			 	</ul>
		</div>
<?php 
	include 'include/block-footer.php';
 ?>
</div>

</body>
</html>