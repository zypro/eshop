<?php
	include 'include/db_connect.php';
	include 'functions/functions.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="windows-1251">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="trackbar/trackbar.css">
	<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
	<script type="text/javascript" src="/js/eshop-script.js"></script>
	<script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
	<title>�����������</title>
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
		<h2 class="h2-title">�����������</h2>
	<form method="POST" id="form_reg" action="/reg/handler_reg.php">
		<p id="reg-message"></p>
		<div id="block-form-registration">
			<ul id="form-registration">
				<li>
					<label>�����</label>
					<span class="star" >*</span>
					<input type="text" name="reg_login" id="reg_login">
				</li>
				<li>
					<label>������</label>
					<span class="star" >*</span>
					<input type="text" name="reg_pass" id="reg_pass">
					<span id="genpass">�������������</span>
				</li>
				<li>
					<label>�������</label>
					<span class="star" >*</span>
					<input type="text" name="reg_surname" id="reg_surname">
				</li>
				<li>
					<label>���</label>
					<span class="star" >*</span>
					<input type="text" name="reg_name" id="reg_name">
				</li>
				<li>
					<label>E-mail</label>
					<span class="star" >*</span>
					<input type="text" name="reg_email" id="reg_email">
				</li>
				<li>
					<label>��������� �������</label>
					<span class="star" >*</span>
					<input type="text" name="reg_phone" id="reg_phone">
				</li>
				<li>
					<label>����� ��������</label>
					<span class="star" >*</span>
					<input type="text" name="reg_address" id="reg_address">
				</li>
				<li>
					<div id="block-captcha">
						<img src="/reg/reg_captcha" alt="">
						<input type="text" name="reg_captcha" id="reg_captcha">
						<p id="reloadcaptcha">��������</p>
					</div>
				</li>
			</ul>
			<p align="right"><input type="submit" name="reg_submit" id="form_submit" value="�����������"></p>
		</div>
	</form>
		</div>
<?php 
	include 'include/block-footer.php';
 ?>
</div>

</body>
</html>