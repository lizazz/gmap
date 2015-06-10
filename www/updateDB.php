<?php
//echo "name=".$_GET['name'];
require("php_sql.php");
 
function utf8_urldecode($str) {
    $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\1;",urldecode($str));
    return html_entity_decode($str,null,'UTF-8');
  }
// var_dump($_FILES['image']['name']);



// Gets data from URL parameters
$name = utf8_urldecode($_POST['name']);
$address = utf8_urldecode($_POST['address']);

if ($_FILES["image"]["name"]!=""){
	downloadfoto();	
	$image = utf8_urldecode($_FILES["image"]["name"]);
} else{$image = utf8_urldecode($_POST['oldimage']);
	};
 
// Insert new row with user data
$query = sprintf("UPDATE markers SET".
         " name='%s',address='%s',image='%s'" .
         "WHERE name='".$_POST['oldname']."'",
         mysql_real_escape_string($name),
         mysql_real_escape_string($address),
		 mysql_real_escape_string($image));
	//echo $query;
	
	//var_dump($_POST);
	$result = mysql_query($query);
	 
	if (!$result) {
	  die('Invalid query: ' . mysql_error());
	}
	 header("Location:\users.php");
 
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