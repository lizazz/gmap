<?php
require("php_sql.php");
 
function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 
 
// Выбираем данные о маркерах из таблицы
$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
 
header("Content-type: text/xml");
 
// Начало XML-файла, вывод с помощью echo
echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<markers>'; 
$marker='<?xml version="1.0" encoding="utf-8"?>'.'<markers>';
 
// Повторяем вывод для каждой записи
while ($row = @mysql_fetch_assoc($result)){
   // ADD TO XML DOCUMENT NODE
  $marker.='<marker ';
  echo '<marker ';
  
  $marker.='name="'.parseToXML($row['name']) . '" ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  
	$marker.='address="' . parseToXML($row['address']) . '" ';
	echo 'address="' . parseToXML($row['address']) . '" ';
	
  echo 'image="' . $row['image'] . '" ';
  
  $marker.='></marker>';
  echo '></marker>';
}
//Конец XML-файла
$marker.='</markers>';
echo '</markers>';
//echo "<br> repeate<br>";
//echo $marker;
$a=fopen("googlemap.xml","w"); 
fputs($a,$marker);
$a=fclose($a);
?>