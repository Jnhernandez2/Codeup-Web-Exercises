<?php 
session_start();
require_once 'functions.php';

function pageController() {

	if (!isset($_SESSION['logged_in_user'])) {
		header('Location: login-exercise.php');
		exit();
	} else {
		$username = isset($_SESSION['logged_in_user']) ? $_SESSION['logged_in_user'] : '';
	}

	return ['username' => $username];
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<title>Authenticated!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<h2>Username</h2>
    <p><?php echo escape($username); ?></p>
    <a href='logout.php'>Log Out</a>
</body>
</html>