<?php
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'db_eshop'; 

$link = mysql_connect($db_host,$db_user,$db_pass);

mysql_select_db($db_database,$link) or die("Íåò ñîåäèíåíèÿ ñ ÁÄ ".mysql_error());
mysql_query("SET names cp1251");
?>