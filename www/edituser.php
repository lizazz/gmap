<?php
//require("downloadfoto.php");
?>
<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<title>Edit profile</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/checkform.js"></script>
		<script type="text/javascript" src="js/jquery.form.validation.js"></script>
	</head>
	<body>
		<div id="link"><a href="\users.php" >Manage users</a></div>
		<div>
			<p>Edit profile</p>
				<form action="updateDB.php" class="form" method="POST" enctype="multipart/form-data">
					<p>Enter name</p>
					<input id="name" name="name" type="textbox" value="<?php echo $_GET["name"]?>">
					<input id="oldname" name="oldname" type="hidden" value="<?php echo $_GET["name"]?>">
					<p>Enter address</p>
					<input id="address" name="address" type="textbox" value="<?php echo $_GET["address"]?>">
					<p><?php
						if($_GET["image"]!=NULL){echo '<img src="/image/'.$_GET["image"].'" height="100px" width="100 px">';}
						else{echo "No photo";}
						?>
					</p>
					<p>Choice image for avatar</p>
					<input id="button picture" type="file" name="image">
					<input id="oldimage" type="hidden" name="oldimage" value="<?php echo $_GET["image"];?>" >
					<br>
					<input id="submit" type="submit" value="Save">
					<br>
				</form>
		</div>
		<div id="users"></div>
	</body>
</html>