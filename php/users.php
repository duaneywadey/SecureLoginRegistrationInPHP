<?php  
require_once 'core.php';

if (isset($_POST['registerBtn'])) {
	$username = trim($_POST['username']);
	$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

	if($userObj->registerAUser($username, $password)) {
		header('Location: ../login.php');
	}
}

if (isset($_POST['loginBtn'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($userObj->loginUser($username, $password)) {
		header('Location: ../index.php');
	}

}

if(isset($_GET['logoutBtn'])) {
	session_unset();
	header('Location: ../index.php');

}

?>