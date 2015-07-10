<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include("db_connect.php");
include("../functions/functions.php");

$email = clear_string($_POST["email"]);

if ($email != "")
{

   $result = mysql_query("SELECT email FROM reg_user WHERE email='$email'",$link);
If (mysql_num_rows($result) > 0)
{

// Генерация пароля.
    $newpass = fungenpass();

// Шифрование пароля.
    $pass = md5($newpass);
    $pass = strrev($pass);
    $pass = strtolower("8md7udyd".$pass."2ui6z");

// Обновление пароля на новый.
$update = mysql_query ("UPDATE reg_user SET pass='$pass' WHERE email='$email'",$link);


// Отправка нового пароля.
	         send_mail('no-reply@pwnz22.ru',
			       $email,
						'Новый пароль для сайта pwnz22.ru',
						'Ваш пароль: '.$newpass);
   echo 'yes';
}else
{
    echo 'Данный E-mail не найден!';
}

}
else
{
    echo 'Укажите свой E-mail';
}
}
?>