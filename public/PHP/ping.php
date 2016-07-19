<?php 

function pageController() {
	if (isset($_GET['count'])) {
		$count = $_GET['count'];
	} else {
		$count = 0;
	}

	return ['count' => $count];
}



extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
	<title>PING</title>
	<style>
		body {
			background-image: url("/IMG/Ping.png");
			background-size: 100%;
			background-repeat: no-repeat;
		}

		a, h1, h2 {
			color: white;
		}

	</style>
</head>
<body>
	<h1>PING!</h1>
	<h2>Score: <?= (int)$count; ?></h2>
	<p><a href="pong.php?paddle=HIT&count=<?= $count+1 ?>">HIT!</p>
	<p><a href="ping.php?paddle=MISS&count=<?= $count-$count ?>">MISS!</p>
</body>
</html>