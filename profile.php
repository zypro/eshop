<?php
session_start();

if ($_SESSION['auth'] == 'yes_auth')

 {
define('myeshop', true);
	include 'include/db_connect.php';
    include 'functions/functions.php';

     if ($_POST["save_submit"])
     {

    $_POST["info_surname"] = clear_string($_POST["info_surname"]);
    $_POST["info_name"] = clear_string($_POST["info_name"]);
    $_POST["info_address"] = clear_string($_POST["info_address"]);
    $_POST["info_phone"] = clear_string($_POST["info_phone"]);
    $_POST["info_email"] = clear_string($_POST["info_email"]);

    $error = array();

    $pass   = md5($_POST["info_pass"]);
    $pass   = strrev($pass);
    $pass   = "8md7udyd".$pass."2ui6z";
    
	if($_SESSION['auth_pass'] != $pass)
	{
		$error[]='Неверный текущий пароль!';
	}else
    {

      if($_POST["info_new_pass"] != "")
	{
		        if(strlen($_POST["info_new_pass"]) < 7 || strlen($_POST["info_new_pass"]) > 15)
            	{
		           $error[]='Укажите новый пароль от 7 до 15 символов!';
	            }else
                {
                     $newpass   = md5(clear_string($_POST["info_new_pass"]));
                     $newpass   = strrev($newpass);
                     $newpass   = "8md7udyd".$pass."2ui6z";
                     $newpassquery = "pass='".$newpass."',";
                }
	}
        if(strlen($_POST["info_surname"]) < 3 || strlen($_POST["info_surname"]) > 15)
	{
		$error[]='Укажите Фамилию от 3 до 15 символов!';
	}
        if(strlen($_POST["info_name"]) < 3 || strlen($_POST["info_name"]) > 15)
	{
		$error[]='Укажите Имя от 3 до 15 символов!';
	}
        if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["info_email"])))
	{
		$error[]='Укажите корректный email!';
	}
      if(strlen($_POST["info_phone"]) == "")
	{
		$error[]='Укажите номер телефона!';
	}
    
      if(strlen($_POST["info_address"]) == "")
	{
		$error[]='Укажите адрес доставки!';
	}
    }
    
  if(count($error))
	{
		$_SESSION['msg'] = "<p align='left' id='form-error'>".implode('<br />',$error)."</p>";
	}else
    {
        $_SESSION['msg'] = "<p align='left' id='form-success'>Данные успешно сохранены!</p>";

     $dataquery = $newpassquery."surname='".$_POST["info_surname"]."',name='".$_POST["info_name"]."',email='".$_POST["info_email"]."',phone='".$_POST["info_phone"]."',address='".$_POST["info_address"]."'";
     $update = mysql_query("UPDATE reg_user SET $dataquery WHERE login = '{$_SESSION['auth_login']}'",$link);

    if ($newpass){ $_SESSION['auth_pass'] = $newpass; }

    $_SESSION['auth_surname'] = $_POST["info_surname"];
    $_SESSION['auth_name'] = $_POST["info_name"];
    $_SESSION['auth_address'] = $_POST["info_address"];
    $_SESSION['auth_phone'] = $_POST["info_phone"];
    $_SESSION['auth_email'] = $_POST["info_email"];
    }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="trackbar/trackbar.css" rel="stylesheet">
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script src="/js/jcarousellite_1.0.1.js"></script>
    <script src="/js/eshop-script.js"></script>
    <script src="/js/jquery.cookie.min.js"></script>
    <script src="/trackbar/jquery.trackbar.js"></script>
    <script src="/js/TextChange.js"></script>

	<title>Интернет Магазин Женской Косметики</title>
</head>
<body>
<div id="block-body">
<?php
       include("include/block-header.php");
?>
<div id="block-right">
<?php
       include 'include/block-category.php';
       include 'include/block-parameter.php';
       include 'include/block-news.php';
?>
</div>
<div id="block-content">
<h3 class="title-h3" >Изменение профиля</h3>
<?php
	
    if($_SESSION['msg'])
		{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
?>
<form method="post">
    <ul id="info-profile">
        <li>
            <label for="info_pass">Текущий пароль</label>
            <span class="star">*</span>
            <input type="text" name="info_pass" id="info_pass" value="">
        </li>
        <li>
            <label for="info_new_pass">Новый пароль</label>
            <span class="star">*</span>
            <input type="text" name="info_new_pass" id="info_new_pass" value="">
        </li>
        <li>
            <label for="info_surname">Фамилия</label>
            <span class="star">*</span>
            <input type="text" name="info_surname" id="info_surname" value="<?php echo $_SESSION['auth_surname']; ?>">
        </li>
        <li>
            <label for="info_name">Имя</label>
            <span class="star">*</span>
            <input type="text" name="info_name" id="info_name" value="<?php echo $_SESSION['auth_name']; ?>">
        </li>
        <li>
            <label for="info_email">E-mail</label>
            <span class="star">*</span>
            <input type="text" name="info_email" id="info_email" value="<?php echo $_SESSION['auth_email']; ?>">
        </li>
        <li>
            <label for="info_phone">Телефон</label>
            <span class="star">*</span>
            <input type="text" name="info_phone" id="info_phone" value="<?php echo $_SESSION['auth_phone']; ?>">
        </li>
        <li>
            <label for="info_address">Адрес доставки</label>
            <span class="star">*</span>
            <textarea name="info_address"  > <?php echo $_SESSION['auth_address']; ?> </textarea>
        </li>
    </ul>
        <p align="right"><input type="submit" id="form_submit" name="save_submit" value="Сохранить"></p>
</form>
</div>

<?php
include 'include/block-random.php';
include 'include/block-footer.php';
?>
</div>
</body>
</html>
<?php
	}else { header("Location: index.php");}
?>