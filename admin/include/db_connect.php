<?php
defined('myeshop') or die ('Доступ запрещён!');
$db_host		= 'localhost';
$db_user		= 'parliaub_eshop';
$db_pass		= 'ayh63TMf';
$db_database	= 'parliaub_eshop'; 

$link = mysql_connect($db_host,$db_user,$db_pass);

mysql_select_db($db_database,$link) or die("Нет соединения с БД ".mysql_error());
mysql_query("SET names utf8");
?>