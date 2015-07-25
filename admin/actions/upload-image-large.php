<?php
defined('myeshop') or die('Доступ запрещён!');  
$error_img = array();

if($_FILES['upload_image_large']['error'] > 0)
{
 //в зависимости от номера ошибки выводим соответствующее сообщение
 switch ($_FILES['upload_image_large']['error'])
 {
 case 1: $error_img[] =  'Размер файла превышает допустимое значение UPLOAD_MAX_FILE_SIZE'; break;
 case 2: $error_img[] =  'Размер файла превышает допустимое значение MAX_FILE_SIZE'; break;
 case 3: $error_img[] =  'Не удалось загрузить часть файла'; break;
 case 4: $error_img[] =  'Файл не был загружен'; break;
 case 6: $error_img[] =  'Отсутствует временная папка.'; break;
 case 7: $error_img[] =  'Не удалось записать файл на диск.'; break;
 case 8: $error_img[] =  'PHP-расширение остановило загрузку файла.'; break;
 }

}else
{
//проверяем расширения
if($_FILES['upload_image_large']['type'] == 'image/jpeg' || $_FILES['upload_image_large']['type'] == 'image/jpg' || $_FILES['upload_image_large']['type'] == 'image/png')
{

$imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['upload_image_large']['name']));

    //папка для загрузки
$uploaddir = '../upload_images/large/';

//новое сгенерированное имя файла
$newfilename = $_POST["form_type"].'-'.$id.rand(20,200).'.'.$imgext;

//путь к файлу (папка.файл)
$uploadfile = $uploaddir.$newfilename;

//загружаем файл move_uploaded_file
if (move_uploaded_file($_FILES['upload_image_large']['tmp_name'], $uploadfile))
{

  $update = mysql_query("UPDATE table_products SET image_large='$newfilename' WHERE products_id = '$id'",$link);

}
else
{
 $error_img[] =  "Ошибка загрузки файла.";
}

}else
{
 $error_img[] =  'Допустимые расширения: jpeg, jpg, png';
}
}
?>