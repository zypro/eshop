<!-- Основной блок -->

<div id="block-header">

<!-- Верхний блок с навигацией -->

	<div id="header-top-block">

<!-- Список с навигацией -->

		<ul id="header-top-menu">
			<li>Ваш город - <span>Душанбе</span></li>
			<li><a href="#">О нас</a></li>
			<li><a href="#">Магазины</a></li>
			<li><a href="#">Контакты</a></li>
		</ul>

<!-- Вход и Регистрация -->
<?php
	if ($_SESSION['auth'] == 'yes_auth')
	{
		echo '<p id="auth-user-info" align="right"><img src="/images/user.png">Здравствуйте, '.$_SESSION['auth_name'].'!</p>';
	}else
	{
		echo '<p id="reg-auth-title" align="right"><a class="top-auth">Вход</a><a href="registration.php">Регистрация</a></p>';
	}
?>
		<div id="block-top-auth">
		<div class="corner"></div>
		<form method="POST">
			<ul id="input-email-pass">
				<h3>Вход</h3>
				<p id="message-auth">Неверный логин и(или) пароль</p>
				<li><center><input type="text" id="auth_login" placeholder="Логин или E-mail"></center></li>
				<li><center><input type="password" id="auth_pass" placeholder="Пароль"><span id="button-pass-show-hide" class="pass-show"></span></center></li>
				<ul id="list-auth">
					<li><input type="checkbox" name="rememberme" id="rememberme"><label for="rememberme">Запомнить меня</label></li>
					<li><a id="remindpass" href="#">Забыли пароль?</a></li>
				</ul>
				<p align="right" id="button-auth"><a>Вход</a></p>
				<p align="right" class="auth-loading"><img src="/images/loading.gif" alt=""></p>
			</ul>
		</form>
		<div id="block-remind">
			<h3>Восстановление<br /> пароля</h3>
			<p id="message-remind" class="message-remind-success" ></p>
			<center><input type="text" id="remind-email" placeholder="Ваш E-mail" /></center>
			<p align="right" id="button-remind" ><a>Готово</a></p>
			<p align="right" class="auth-loading" ><img src="/images/loading.gif" /></p>
			<p id="prev-auth">Назад</p>
		</div>
		</div>
	</div>
<!-- Линия -->

		<div id="top-line"></div>

<!-- Логотип -->

			<img id="img-logo" src="/images/logo.png">

<!-- Информационный блок -->

				<div id="personal-info">
					<p align="right">Звонок бесплатный</p>
					<h3 align="right">908-990-121</h3>
						<img src="/images/phone-icon.png">
					<p align="right">Режим работы</p>
					<p align="right">Будние дни</p>
					<p align="right">Воскресенье выходной</p>
						<img src="/images/time-icon.png">
				</div>

<!-- Форма Поиска -->

		<div id="block-search">
			<form method="GET" action="search.php?q=">
				<span></span>
				<input type="text" id="input-search" name="q" placeholder="Поиск среди товаров">
				<input type="submit" id="button-search" value="Поиск">
			</form>
		</div>
</div>
<!-- Меню -->
<div id="top-menu">
	<ul>
		<li><img src="/images/shop.png"><a href="index.php">Главная</a></li>
		<li><img src="/images/new-32.png"><a href="new.php">Новинки</a></li>
		<li><img src="/images/bestprice-32.png"><a href="index.php">Лидеры продаж</a></li>
		<li><img src="/images/sale-32.png"><a href="index.php">Распродажа</a></li>
	</ul>
		<p align="right" id="block-basket"><img src="/images/cart-icon.png"><a href="">Корзина пуста</a></p>
	<div id="nav-line"></div>
</div>