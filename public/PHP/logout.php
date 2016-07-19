<?php 
session_start();

function logout() {
	session_unset();
	session_regenerate_id(true);
	header('Location: login-exercise.php');
	exit();
}

function pageController() {
	logout();
}

pageController();

?>
<html>
<head>
	<title>Log Out</title>
</head>
<body>
	<h2>Redirecting...</h2>

</body>
</html>