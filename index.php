<?php  
require_once 'php/core.php';

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Hello there! <span style="color: green;"><?php echo $_SESSION['username']; ?></span></h1>
	<form action="php/users.php?" method="GET">
		<input type="submit" value="Logout" name="logoutBtn">
	</form>
</body>
</html>