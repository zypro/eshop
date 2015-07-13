<?php
	include 'include/db_connect.php';
	include 'functions/functions.php';
	session_start();
	include 'include/auth_cookie.php';
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
	<script src="/js/jquery.form.js"></script>
	<script src="/js/jquery.validate.js"></script>
	<script src="/js/check-form.js"></script>
	<script src="/js/TextChange.js"></script>
	<title>Регистрация</title>
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
		<h2 class="h2-title">Регистрация</h2>
	<form method="POST" id="form_reg" action="/reg/handler_reg.php">
		<p id="reg_message"></p>
		<div id="block-form-registration">
			<ul id="form-registration">
				<li>
					<label>Логин</label>
					<span class="star">*</span>
					<input type="text" name="reg_login" id="reg_login">
				</li>
				<li>
					<label>Пароль</label>
					<span class="star">*</span>
					<input type="text" name="reg_pass" id="reg_pass">
					<span id="genpass">Сгенерировать</span>
				</li>
				<li>
					<label>Фамилия</label>
					<span class="star">*</span>
					<input type="text" name="reg_surname" id="reg_surname">
				</li>
				<li>
					<label>Имя</label>
					<span class="star">*</span>
					<input type="text" name="reg_name" id="reg_name">
				</li>
				<li>
					<label>E-mail</label>
					<span class="star">*</span>
					<input type="text" name="reg_email" id="reg_email">
				</li>
				<li>
					<label>Мобильный телефон</label>
					<span class="star">*</span>
					<input type="text" name="reg_phone" id="reg_phone">
				</li>
				<li>
					<label>Адрес доставки</label>
					<span class="star">*</span>
					<input type="text" name="reg_address" id="reg_address">
				</li>
				<li>
					<div id="block-captcha">
						<img src="/reg/reg_captcha.php" alt="">
						<input type="text" name="reg_captcha" id="reg_captcha">
						<p id="reloadcaptcha">Обновить</p>
					</div>
				</li>
			</ul>
			<p align="right"><input type="submit" name="reg_submit" id="form_submit" value="Регистрация"></p>
		</div>
	</form>
		</div>
<?php
	include 'include/block-random.php';
	include 'include/block-footer.php';
?>
</div>
</body>
</html>