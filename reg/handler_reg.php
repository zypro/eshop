<?php
 if($_SERVER["REQUEST_METHOD"] == "POST")
{
 session_start();

 include("../include/db_connect.php");
 include("../functions/functions.php");

     $error = array();
         // ������ ��� �������������� (iconv("UTF-8", "cp1251",)
        $login = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_login']))); 
        $pass = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_pass']))); 
        $surname = iconv("UTF-8", "cp1251",clear_string($_POST['reg_surname'])); 
        
        $name = iconv("UTF-8", "cp1251",clear_string($_POST['reg_name'])); 
        $email = iconv("UTF-8", "cp1251",clear_string($_POST['reg_email'])); 
        
        $phone = iconv("UTF-8", "cp1251",clear_string($_POST['reg_phone'])); 
        $address = iconv("UTF-8", "cp1251",clear_string($_POST['reg_address'])); 


    if (strlen($login) < 4 or strlen($login) > 15)
    {
       $error[] = "����� ������ ���� �� 4 �� 15 ��������!"; 
    }
    else
    {   
     $result = mysql_query("SELECT login FROM reg_user WHERE login = '$login'",$link);
    If (mysql_num_rows($result) > 0)
    {
       $error[] = "����� �����!";
    }
    }
     
    if (strlen($pass) < 5 or strlen($pass) > 15) $error[] = "������� ������ �� 5 �� 15 ��������!";
    if (strlen($surname) < 3 or strlen($surname) > 20) $error[] = "������� ������� �� 3 �� 20 ��������!";
    if (strlen($name) < 3 or strlen($name) > 15) $error[] = "������� ��� �� 3 �� 15 ��������!";
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "������� ���������� email!";
    if (!$phone) $error[] = "������� ����� ��������!";
    if (!$address) $error[] = "���������� ������� ����� ��������!";
    
    if($_SESSION['img_captcha'] != strtolower($_POST['reg_captcha'])) $error[] = "�������� ��� � ��������!";
    unset($_SESSION['img_captcha']);
    
   if (count($error))
   {
    
 echo implode('<br />',$error);
    }else
    {
        $pass   = md5($pass);
        $pass   = strrev($pass);
        $pass   = "9nm2rv8q".$pass."2yo6z";
        $ip = $_SERVER['REMOTE_ADDR'];
		
		mysql_query("	INSERT INTO reg_user(login,pass,surname,name,email,phone,address,datetime,ip)
						VALUES(
							'".$login."',
							'".$pass."',
							'".$surname."',
							'".$name."',
                            '".$email."',
                            '".$phone."',
                            '".$address."',
                            NOW(),
                            '".$ip."'
						)",$link);
 echo 'true';
 }


}
?>