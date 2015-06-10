<?php 
$sdb_name = "localhost";
$user_name = "googlemap";
$user_password = "12345678";
$db_name = "googlemap";
 
// соединение с сервером базы данных
if(!$link = mysql_connect($sdb_name, $user_name, $user_password))
{
  echo "<br>Can't connect to server of DB<br>";
  exit();
}
 
// выбираем базу данных
if(!mysql_select_db($db_name, $link))
{
  echo "<br>Can't choice DB<br>";
  exit();
}
 
mysql_query('SET NAMES utf8');
 
?>