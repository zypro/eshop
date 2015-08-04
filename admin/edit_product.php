<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
	define('myeshop', true);

		if (isset($_GET["logout"]))
	{
		unset($_SESSION['auth_admin']);
		header("Location: login.php");
	}

	$_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='tovar.php' >Товары</a> \ <a>Изменение товара</a>";

	include("include/db_connect.php");
	include("include/functions.php");


	$id = clear_string($_GET["id"]);

	$action = clear_string($_GET["action"]);
if (isset($action))
{
	switch ($action) {

		case 'delete':
	if ($_SESSION['edit_tovar'] == '1')
		{

	if (file_exists("../upload_images/".$_GET["img"]))
	{
		unlink("../upload_images/".$_GET["img"]);
	}

	if (file_exists("../upload_images/large/".$_GET["img"]))
		{
			unlink("../upload_images/large/".$_GET["img"]);
		}
		}else
		{
			$msgerror = 'У вас нет прав на изменение товаров!';
		}
		break;
	}
	}

	if ($_POST["submit_save"])
	{
	if ($_SESSION['edit_tovar'] == '1')
		{
$error = array();

	// Проверка полей

		if (!$_POST["form_title"])
	{
		$error[] = "Укажите название товара";
	}
		if (!$_POST["form_shorttitle"])
	{
		$error[] = "Краткое имя товара";
	}

		if (!$_POST["form_price"])
	{
		$error[] = "Укажите цену";
	}

		if (!$_POST["form_category"])
	{
		$error[] = "Укажите категорию";
	}else
	{
		$result = mysql_query("SELECT * FROM category WHERE id='{$_POST["form_category"]}'",$link);
		$row = mysql_fetch_array($result);
		$selectbrand = $row["brand"];

	}

		if (empty($_POST["upload_image"]))
	{
		include 'actions/upload-image.php';
		unset($_POST["upload_image"]);
	}

		if (empty($_POST["upload_image_large"]))
	{
		include 'actions/upload-image-large.php';
		unset($_POST["upload_image_large"]);
	}

		if (empty($_POST["galleryimg"]))
		{
		include 'actions/upload-gallery.php';
		unset($_POST["galleryimg"]);
	}

 	if ($_POST["chk_visible"])
	{
		$chk_visible = "1";
	}else { $chk_visible = "0"; }

	if ($_POST["chk_new"])
	{
		$chk_new = "1";
	}else { $chk_new = "0"; }

	if ($_POST["chk_leader"])
	{
		$chk_leader= "1";
	}else { $chk_leader = "0"; }

	if ($_POST["chk_sale"])
	{
		$chk_sale = "1";
	}else { $chk_sale = "0"; }

	if (count($error))
	{
		$_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";

	}else
	{
	$querynew = "title='{$_POST["form_title"]}',short_title='{$_POST["form_shorttitle"]}',price='{$_POST["form_price"]}',brand='$selectbrand',seo_words='{$_POST["form_seo_words"]}',seo_description='{$_POST["form_seo_description"]}',mini_description='{$_POST["txt1"]}',description='{$_POST["txt2"]}',mini_features='{$_POST["txt3"]}',features='{$_POST["txt4"]}',how_to_use='{$_POST["txt5"]}',new='$chk_new',leader='$chk_leader',sale='$chk_sale',visible='$chk_visible',type_tovara='{$_POST["form_type"]}',brand_id='{$_POST["form_category"]}'";
	$update = mysql_query("UPDATE table_products SET $querynew WHERE products_id = '$id'",$link);

$_SESSION['message'] = "<p id='form-success'>Товар успешно изменен!</p>";
}
}else
	{
		$msgerror = 'У вас нет прав на изменение товаров!';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/script.js"></script>
	<script src="./ckeditor/ckeditor.js"></script>
	<title>Панель Управления</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page" >Добавление товара</p>
</div>
<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

		 if(isset($_SESSION['message']))
	{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}

		if(isset($_SESSION['answer']))
	{
		echo $_SESSION['answer'];
		unset($_SESSION['answer']);
	}
?>
<?php
	$result = mysql_query("SELECT * FROM table_products WHERE products_id='$id'",$link);

If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{

echo '
<form enctype="multipart/form-data" method="post">
<ul id="edit-tovar">
	<li>
		<label>Название товара</label>
		<input type="text" name="form_title" value="'.$row["title"].'">
	</li>

	<li>
		<label>Краткое имя товара</label>
		<input type="text" name="form_shorttitle" value="'.$row["short_title"].'">
	</li>

	<li>
		<label>Цена</label>
		<input type="text" name="form_price" value="'.$row["price"].'">
	</li>

	<li>
		<label>Ключевые слова</label>
		<input type="text" name="form_seo_words" value="'.$row["seo_words"].'">
	</li>

	<li>
		<label>Краткое описание</label>
		<textarea name="form_seo_description">'.$row["seo_description"].'</textarea>
	</li>
';
$category = mysql_query("SELECT * FROM category",$link);

If (mysql_num_rows($category) > 0)
{
$result_category = mysql_fetch_array($category);

if ($row["type_tovara"] == "makeup") $type_makeup = "selected";
if ($row["type_tovara"] == "care") $type_care = "selected";
if ($row["type_tovara"] == "hygiene") $type_hygiene = "selected";
if ($row["type_tovara"] == "mans") $type_mans = "selected";
if ($row["type_tovara"] == "kids") $type_kids = "selected";

echo '
<li>
<label>Тип товара</label>

<select name="form_type" id="type" size="1" >
	<option '.$type_makeup.' value="makeup" >Макияж</option>
	<option '.$type_care.' value="care" >Уход</option>
	<option '.$type_hygiene.' value="hygiene" >Гигиена</option>
	<option '.$type_mans.' value="mans" >Мужчинам</option>
	<option '.$type_kids.' value="kids" >Детям</option>
</select>

</li>
<li>
	<label>Категория</label>
	<select name="form_category" size="10" >
';
if ($row["brand_id"] == "8") $type_ink = "selected";
if ($row["brand_id"] == "9") $type_pencil_eyeliner = "selected";
if ($row["brand_id"] == "10") $type_eyeshadow = "selected";
if ($row["brand_id"] == "11") $type_for_lips = "selected";
if ($row["brand_id"] == "12") $type_lipstick = "selected";
if ($row["brand_id"] == "13") $type_pencils = "selected";
if ($row["brand_id"] == "14") $type_shines = "selected";
if ($row["brand_id"] == "16") $type_balms = "selected";
if ($row["brand_id"] == "17") $type_for_face = "selected";
if ($row["brand_id"] == "18") $type_powder = "selected";
if ($row["brand_id"] == "19") $type_rouge = "selected";
if ($row["brand_id"] == "20") $type_creams = "selected";
if ($row["brand_id"] == "21") $type_corrector = "selected";
if ($row["brand_id"] == "22") $type_base_makeup = "selected";
if ($row["brand_id"] == "23") $type_for_nails = "selected";
if ($row["brand_id"] == "24") $type_nail_polish = "selected";
if ($row["brand_id"] == "25") $type_base_dryers_corrector = "selected";
if ($row["brand_id"] == "26") $type_removal_funds = "selected";
if ($row["brand_id"] == "27") $type_care_funds = "selected";
if ($row["brand_id"] == "28") $type_nailfile = "selected";
if ($row["brand_id"] == "29") $type_day_creams = "selected";
if ($row["brand_id"] == "30") $type_night_creams = "selected";
if ($row["brand_id"] == "31") $type_eyelashes_funds = "selected";
if ($row["brand_id"] == "32") $type_lip_balms = "selected";
if ($row["brand_id"] == "33") $type_clean_tonic = "selected";
if ($row["brand_id"] == "34") $type_clean_deep = "selected";
if ($row["brand_id"] == "35") $type_face_masks = "selected";
if ($row["brand_id"] == "36") $type_whey_concentrate = "selected";
if ($row["brand_id"] == "37") $type_accessories = "selected";

{


echo 
'
<option '.$type_ink.' value="'.$result_category["id"].'" >Тушь для ресниц</option>
<option '.$type_pencil_eyeliner.' value="makeup" >Карандаши, подводка</option>
<option '.$$id_eyeshadow.' value="makeup" >Тени для век</option>
<option '.$id_for_lips.' value="makeup" >Для губ</option>
<option '.$type_lipstick.' value="makeup" >Помады</option>
<option '.$type_pencils.' value="makeup" >Карандаши</option>
<option '.$type_shines.' value="makeup" >Блески</option>
<option '.$type_balms.' value="makeup" >Бальзамы</option>
<option '.$type_for_face.' value="makeup" >Для лица</option>
<option '.$type_powder.' value="makeup" >Пудра</option>
<option '.$type_rouge.' value="makeup" >Румяна</option>
<option '.$type_creams.' value="makeup" >Тональные кремы</option>
<option '.$type_corrector.' value="makeup" >Корректор</option>
<option '.$type_for_nails.' value="makeup" >Для ногтей</option>
<option '.$type_nail_polish.' value="makeup" >Лак для ногтей</option>
<option '.$type_base_dryers_corrector.' value="makeup" >База, сушка, корректор</option>
<option '.$type_removal_funds.' value="makeup" >Средства для снятия лака</option>
<option '.$type_care_funds.' value="makeup" >Средства для ухода</option>
<option '.$type_nailfile.' value="makeup" >Пилки для ногтей</option>
<option '.$type_day_creams.' value="care" >Кремы дневные</option>
<option '.$type_night_creams.' value="care" >Кремы ночные</option>
<option '.$type_eyelashes_funds.' value="care" >Средства для век и ресниц</option>
<option '.$type_lip_balms.' value="care" >Бальзамы для губ</option>
<option '.$type_clean_tonic.' value="'.$result_category["id"].'" >Очищение, тоники</option>
<option '.$type_clean_deep.' value="care" >Скрабы, пилинги</option>
<option '.$type_face_masks.' value="care" >Маски для лица</option>
<option '.$type_whey_concentrate.' value="care" >Сыворотки, концентраты</option>
<option '.$type_accessories.' value="care" >Аксессуары</option>



';

}
 while ($result_category = mysql_fetch_array($category));
}
echo '
</select>
</ul>
';

		if (strlen($row["image"]) > 0 && file_exists("../upload_images/".$row["image"]))
{
$img_path = '../upload_images/'.$row["image"];
$max_width = 110;
$max_height = 110;
 list($width, $height) = getimagesize($img_path);
$ratioh = $max_height/$height;
$ratiow = $max_width/$width;
$ratio = min($ratioh, $ratiow);
// New dimensions 
$width = intval($ratio*$width);
$height = intval($ratio*$height);

echo '
<label class="stylelabel" >Основная картинка</label>
<div id="baseimg">
	<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
	<a href="edit_product.php?id='.$row["products_id"].'&img='.$row["image"].'&action=delete" ></a>
</div>
';

}else
{
echo '
<label class="stylelabel" >Основная картинка</label>
<div id="baseimg-upload">
	<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
	<input type="file" name="upload_image" />
</div>
';
}

		if (strlen($row["image_large"]) > 0 && file_exists("../upload_images/large/".$row["image_large"]))
{
$img_path_large = '../upload_images/large/'.$row["image_large"];
$max_width = 110;
$max_height = 110;
 list($width, $height) = getimagesize($img_path_large);
$ratioh = $max_height/$height;
$ratiow = $max_width/$width;
$ratio = min($ratioh, $ratiow);
// New dimensions 
$width = intval($ratio*$width);
$height = intval($ratio*$height);

echo '
<label class="stylelabel" >Большая картинка</label>
<div id="baseimg">
	<img src="'.$img_path_large.'" width="'.$width.'" height="'.$height.'" />
	<a href="edit_product.php?id='.$row["products_id"].'&img='.$row["image_large"].'&action=delete" ></a>
</div>
';

}else
{
echo '
<label class="stylelabel" >Большая картинка</label>
<div id="baseimg-upload">
	<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
	<input type="file" name="upload_image_large" />
</div>
';
}

echo '
<h3 class="h3click" >Краткое описание товара (вид: Строка)</h3>
<div class="div-editor1" >
<textarea id="editor1" name="txt1" cols="100" rows="20">'.$row["mini_description"].'</textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor1" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
</div>

<h3 class="h3click" >Описание товара</h3>
<div class="div-editor2" >
<textarea id="editor2" name="txt2" cols="100" rows="20">'.$row["description"].'</textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor2" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
</div>

<h3 class="h3click" >Краткие характеристики (вид: Блок)</h3>
<div class="div-editor3" >
<textarea id="editor3" name="txt3" cols="100" rows="20">'.$row["mini_features"].'</textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor3" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
</div>

<h3 class="h3click" >Состав</h3>
<div class="div-editor4" >
<textarea id="editor4" name="txt4" cols="100" rows="20">'.$row["features"].'</textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor4" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
</div>

<h3 class="h3click" >Как применять</h3>
<div class="div-editor5" >
<textarea id="editor5" name="txt5" cols="100" rows="20">'.$row["how_to_use"].'</textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor5" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
</div>

<label class="stylelabel" >Галлерея картинок</label>

<div id="objects">
<div id="addimage1" class="addimage">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
<input type="file" name="galleryimg[]" />
</div>
</div>

<p id="add-input" >Добавить</p>

<ul id="gallery-img">
';

$query_img = mysql_query("SELECT * FROM upload_images WHERE products_id='$id'",$link);

If (mysql_num_rows($query_img) > 0)
{

$result_img = mysql_fetch_array($query_img);
do
{
if (strlen($result_img["image"]) > 0 && file_exists("../upload_images/".$result_img["image"]))
{
$img_path = '../upload_images/'.$result_img["image"];
$max_width = 100;
$max_height = 100;
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height;
$ratiow = $max_width/$width;
$ratio = min($ratioh, $ratiow);
// New dimensions 
$width = intval($ratio*$width);
$height = intval($ratio*$height);

}else
{
$img_path = "./images/noimages.png";
$width = 80;
$height = 70;
}

echo '
<li id="del'.$result_img["id"].'">
<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" title="'.$result_img["image"].'">
';

if ($_SESSION['edit_tovar'] == '1')
{
echo '
<a class="del-img" img_id="'.$result_img["id"].'" ></a>
';
}

echo '</li>';
}while ($result_img = mysql_fetch_array($query_img));
}

echo '</ul>';

if ($row["visible"] == '1') $checked1 = "checked";
if ($row["new"] == '1') $checked2 = "checked";
if ($row["leader"] == '1') $checked3 = "checked";
if ($row["sale"] == '1') $checked4 = "checked";


echo '
<h3 class="h3title" >Настройки товара</h3>
<ul id="chkbox">
<li><input type="checkbox" name="chk_visible" id="chk_visible" '.$checked1.' /><label for="chk_visible" >Показывать товар</label></li>
<li><input type="checkbox" name="chk_new" id="chk_new" '.$checked2.' /><label for="chk_new" >Новый товар</label></li>
<li><input type="checkbox" name="chk_leader" id="chk_leader" '.$checked3.' /><label for="chk_leader" >Популярный товар</label></li>
<li><input type="checkbox" name="chk_sale" id="chk_sale" '.$checked4.' /><label for="chk_sale" >Товар со скидкой</label></li>
</ul>


<p align="right" ><input type="submit" id="submit_form" name="submit_save" value="Сохранить"/></p>
</form>
';

}while ($row = mysql_fetch_array($result));
}
?>
</div>
</div>
</body>
</html>
<?php
}else
{
	header("Location: login.php");
}
?>