<?php  

class User {
	
	function __construct($conn) {
		try {
			$this->conn = $conn;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	function registerAUser($username, $password) {

		// Select first if the username already exists from the database
		$sql = "SELECT * FROM users WHERE username=?";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([$username]);

		// If it doesn't exist yet, insert the record into the database
		if($stmt->rowCount()==0) {
			$sql = "INSERT INTO users (username,password) VALUES(?,?)";
			$stmt = $this->conn->prepare($sql);
			return $stmt->execute([$username, $password]);
		}
		else {
			return false;
		}

	}

	function loginUser($username, $password) {

		// Select if username exists first
		$sql = "SELECT * FROM users WHERE username=?";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([$username]);

		// If it exists, get all values from the row
		if($stmt->rowCount() == 1) {

			// This returns associative array; fetch() returns only one row while fetchAll() returns multiple rows
			$userInfoRow = $stmt->fetch();

			// Get individual values from userInfoRow
			$user_id = $userInfoRow['user_id'];
			$is_admin = $userInfoRow['is_admin'];
			$username = $userInfoRow['username'];
			$hashedPassword = $userInfoRow['password'];

			// Verify if the inputted passwword is correct; '$password' is the variable that stores the inputted password while '$hashedPassword' is the variable that stores the password as stated from the database.  
			if(password_verify($password, $hashedPassword)) {

				// If the inputted password and password from the database are both same, store user info as session variables. 
				$_SESSION['user_id'] = $user_id;
				$_SESSION['is_admin'] = $is_admin;
				$_SESSION['username'] = $username;
				return true;
			}
		}
	}
}


?>