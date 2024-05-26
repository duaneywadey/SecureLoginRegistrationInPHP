<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Login</h1>
	<form action="php/users.php" method="POST">
		<p><input type="text" name="username"></p>
		<p><input type="password" name="password"></p>
		<p><input type="submit" value="Submit" name="loginBtn"></p>
	</form>
	<p>Dont have an account yet? You may register <a href="register.php">here</a></p>
</body>
</html>