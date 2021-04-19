<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>	
	
	<form action="ldap.php" method="post">
		<input type="text" name="username" value='<?php echo getenv("username"); ?>' readonly> <br>
		<input type="password" name="password"> <br>
		<input type="submit" value="Login"> <br>
	</form>	
</body>
</html>