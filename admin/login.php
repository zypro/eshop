<?php
		session_start();
	define('myeshop', true);
	include 'include/db_connect.php';
	include 'include/functions.php';

If ($_POST["submit_enter"])
{
	$login = clear_string($_POST["input_login"]);
	$pass = clear_string($_POST["input_pass"]);

 if ($login && $pass)
{
		/*
	$pass = md5($pass);
	$pass = strrev($pass);*/
		$pass = md5($pass);
		$pass = strrev($pass);
		$pass = strtolower("8md7udyd".$pass."2ui6z");


	$result = mysql_query("SELECT * FROM reg_admin WHERE login = '$login' AND pass = '$pass'",$link);

If (mysql_num_rows($result) > 0)
{
	$row = mysql_fetch_array($result);

	$_SESSION['auth_admin'] = 'yes_auth';
	$_SESSION['auth_admin_login'] = $row["login"];
	// Должность
	$_SESSION['admin_role'] = $row["role"];
	// Привилегии
	// Заказы
	$_SESSION['accept_orders'] = $row["accept_orders"];
	$_SESSION['delete_orders'] = $row["delete_orders"];
	$_SESSION['view_orders'] = $row["view_orders"];
	// Товары
	$_SESSION['delete_tovar'] = $row["delete_tovar"];
	$_SESSION['add_tovar'] = $row["add_tovar"];
	$_SESSION['edit_tovar'] = $row["edit_tovar"];
	// Отзывы
	$_SESSION['accept_reviews'] = $row["accept_reviews"];
	$_SESSION['delete_reviews'] = $row["delete_reviews"];
	// Клиенты
	$_SESSION['view_clients'] = $row["view_clients"];
	$_SESSION['delete_clients'] = $row["delete_clients"];
	// Новости
	$_SESSION['add_news'] = $row["add_news"];
	$_SESSION['delete_news'] = $row["delete_news"];
	// Категории
	$_SESSION['add_category'] = $row["add_category"];
	$_SESSION['delete_category'] = $row["delete_category"];
	// Администраторы
	$_SESSION['view_admin'] = $row["view_admin"];

	header("Location: index.php");
	}else
	{
	$msgerror = "Неверный Логин и(или) Пароль.";
	}

	}else
	{
	$msgerror = "Заполните все поля!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style-login.css">
	<title>Панель управления</title>
</head>
<body>
<div id="block-pass-login">
<?php
if ($msgerror)
	{
		echo '<p id="msgerror" >'.$msgerror.'</p>';
	}
?>
	<form method="post">
		<ul id="pass-login">
			<li><label>Логин</label><input type="text" name="input_login"></li>
			<li><label>Пароль</label><input type="password" name="input_pass"></li>
		</ul>
		<p align="right"><input type="submit" name="submit_enter" id="submit_enter" value="Вход"></p>
	</form>
</div>
</body>
</html>