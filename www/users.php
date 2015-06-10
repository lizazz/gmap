<?php
require("php_sql.php");
$name=array();
$address=array();
$image=array();
$query = "SELECT * FROM markers";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
while ($row = @mysql_fetch_assoc($result)){
	$name[]=$row['name'];
	$address[]=$row['address'];
	$image[]=$row['image'];
}
?>
<!DOCTYPE html>

<html>
	<head>
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
		<a href="\index.php" id="link">back</a>
		<h1>Users</h1>
		<table class="users" border='1'>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Address</th>
				<th>Action</th>
			</tr>
			<?php
			for($i=0;$i<count($name);$i++){?>
				<tr>
				<td><?php
					if($image[$i]!=NULL){echo '<img src="/image/'.$image[$i].'" height="100px" width="100 px">';}
					else{echo "No photo";};?></td><td><?php echo $name[$i];?></td><td><?php echo $address[$i];?></td>
				<td><input type="button" value="Edit profile" onclick="location.href='edituser.php?name=<?php echo $name[$i]."&address=".$address[$i]."&image=".$image[$i];?>'">
					<input  type="button" value="Delete profile" onclick="DeleteUser('<?php echo $name[$i];?>');">
				</td>
				</tr>
			<?php
				};
			?>	
		
		</table>
	</body>
</html>