<?php
//require("downloadfoto.php");
?>
<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<title>Google Map for Taurus.ru</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/jquery.form.validation.js"></script>
		<script type="text/javascript"
			src="http://maps.googleapis.com/maps/api/js?&sensor=TRUE">
    </script>
	</head>
	<body>
		<div id="link"><a href="\users.php" >Manage users</a></div
		<div >
			
				<form action="/addtobase.php" class="form" method="POST" enctype="multipart/form-data">
					<p>Add new person</p>
					<p>Name</p>
					<input id="name" name="name" type="textbox" value="Enter name">
					<p>Address</p>
					<input id="address" name="address" type="textbox" value="Enter address">
					<p>Image for avatar</p>
					<input id="button picture" type="file" value="Load avatar" name="image" >
					<br>
					<input id="submit" type="submit" value="Save" onclick="addAddress();">
					<br>
				</form>
		</div>
		<div class="content">
			<div id="map_canvas"></div>
			
		</div>
		<div id="users"></div>
	</body>
</html>