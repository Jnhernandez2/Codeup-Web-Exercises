<?php
	// if (isset($_GET['countup'])) {
	// 	$count = $count++;
	// } else if (isset($_GET['countdown'])) {
	// 	$count = $count--;
	// } else{
		
	// }

//$count = 0;
function pageController() {

	if (isset($_REQUEST['count'])) {
		$count = $_REQUEST['count'];
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
	<title>Zhe Countah!</title>
</head>
<body>
	<h1>The Official Counter</h1>
	<h2>Count: <?= $count; ?></h2>
	<p><a href="counter.php?count=<?= $count+1 ?>">Count Up!</p>
	<p><a href="counter.php?count=<?= $count-1 ?>">Count Down!</p>
</body>
</html>