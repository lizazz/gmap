<?php
require("php_sql.php");

function utf8_urldecode($str) {
    $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\1;",urldecode($str));
    return html_entity_decode($str,null,'UTF-8');
  }
  
  
$name = utf8_urldecode($_GET['name']);

// Insert new row with user data
$query = sprintf("DELETE FROM markers WHERE name='%s'",
         mysql_real_escape_string($name));
	//echo $query;
	$result = mysql_query($query);
	
	
//var_dump($_GET);
//echo $_GET['name'];
header("Location:\users.php");
?>