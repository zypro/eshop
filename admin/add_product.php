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

	$_SESSION['urlpage'] = "<a href='index.php'>Главная</a> \ <a href='tovar.php'>Товары</a> \ <a>Добавление товара</a>";

	include 'include/db_connect.php';
	include 'include/functions.php';

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
		include 'include/block-header.php';
	?>
	<div id="block-content">
		<div id="block-parameters">
			<p id="title-page">Добавление товара</p>
		</div>
<form enctype="multipart/form-data" method="post">
<ul id="edit-tovar">
<li>
	<label>Название товара</label>
	<input type="text" name="form_title">
</li>

<li>
	<label>Цена</label>
	<input type="text" name="form_price">
</li>

<li>
	<label>Ключевые слова</label>
	<input type="text" name="form_seo_words">
</li>

<li>
	<label>Краткое описание</label>
	<textarea name="form_seo_description"></textarea>
</li>

<li>
<label>Тип товара</label>
	<select name="form_type" id="type" size="1">
		<option value="mobile" >Мобильные телефоны</option>
		<option value="notebook" >Ноутбуки</option>
		<option value="notepad" >Планшеты</option>
	</select>
</li>

<li>
<label>Категория</label>
<select name="form_category" size="10">

<?php
$category = mysql_query("SELECT * FROM category",$link);

If (mysql_num_rows($category) > 0)
{
$result_category = mysql_fetch_array($category);
do
{
echo '<option value="'.$result_category["id"].'" >'.$result_category["brand"].'</option>';

}
 while ($result_category = mysql_fetch_array($category));
}
?>

</select>
</ul>
<label class="stylelabel" >Основная картинка</label>

<div id="baseimg-upload">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
<input type="file" name="upload_image">
</div>

<h3 class="h3click" >Краткое описание товара</h3>
<div class="div-editor1">
<textarea id="editor1" name="txt1" cols="100" rows="20"></textarea>
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
<textarea id="editor2" name="txt2" cols="100" rows="20"></textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor2" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
</div>

<h3 class="h3click" >Краткие характеристики</h3>
<div class="div-editor3" >
<textarea id="editor3" name="txt3" cols="100" rows="20"></textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor3" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
</div>

<h3 class="h3click" >Характеристики</h3>
<div class="div-editor4" >
<textarea id="editor4" name="txt4" cols="100" rows="20"></textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( "editor4" );
			AjexFileManager.init({
				returnTo: "ckeditor",
				editor: ckeditor1
			});
		</script>
</div>

<label class="stylelabel" >Галлерея картинок</label>

<div id="objects" >
	<div id="addimage1" class="addimage">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
		<input type="file" name="galleryimg[]">
	</div>
</div>

<p id="add-input" >Добавить</p>
<h3 class="h3title" >Настройки товара</h3>
<ul id="chkbox">
	<li><input type="checkbox" name="chk_visible" id="chk_visible"><label for="chk_visible" >Показывать товар</label></li>
	<li><input type="checkbox" name="chk_new" id="chk_new"><label for="chk_new" >Новый товар</label></li>
	<li><input type="checkbox" name="chk_leader" id="chk_leader"><label for="chk_leader" >Популярный товар</label></li>
	<li><input type="checkbox" name="chk_sale" id="chk_sale"><label for="chk_sale" >Товар со скидкой</label></li>
</ul>


<p align="right" ><input type="submit" id="submit_form" name="submit_add" value="Добавить товар"/></p>     
</form>
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