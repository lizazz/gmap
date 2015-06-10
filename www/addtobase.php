<?php
require("php_sql.php");
 
function utf8_urldecode($str) {
    $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\1;",urldecode($str));
    return html_entity_decode($str,null,'UTF-8');
  }
 
// Gets data from URL parameters
$name = utf8_urldecode($_POST['name']);
$address = utf8_urldecode($_POST['address']);
$image = utf8_urldecode($_POST['image']);
if (isset($_FILES["image"]["name"])){
	downloadfoto();
	
};
 
// Insert new row with user data
$query = sprintf("INSERT INTO markers " .
         " (id, name, address,image ) " .
         " VALUES (NULL, '%s', '%s', '%s');",
         mysql_real_escape_string($name),
         mysql_real_escape_string($address),
		 mysql_real_escape_string($_FILES["image"]["name"]));
	//echo $query;
	$result = mysql_query($query);
 
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
 header("Location:\index.php");
 
 function downloadfoto(){
        if($_FILES["image"]["size"] > 1024*3*1024)
        {
            echo ("Размер файла превышает три мегабайта");
            exit;
        }
        // Проверяем загружен ли файл
        if(is_uploaded_file($_FILES["image"]["tmp_name"]))
        {
            // Если файл загружен успешно, перемещаем его
            // из временной директории в конечную
            move_uploaded_file($_FILES["image"]["tmp_name"],"image/".$_FILES["image"]["name"]);
            
              };
           //   else {echo "<br>dont1 download"; echo $_FILES['image']['name'];};
}
?>