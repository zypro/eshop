<?php 
	function clear_string($cl_str)
	{
	// Фун-я удаление строк
	$cl_str = strip_tags($cl_str); // удалеине html и php тегов
	$cl_str = mysql_real_escape_string($cl_str); // очистка спец. символов. Не работает без подкл. в БД
	$cl_str = trim($cl_str); // фун-я удаление пробелов
	return $cl_str;
	}
 ?>