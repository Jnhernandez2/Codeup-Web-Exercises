<?php 

function pageController() {
	$myFavoriteThings = ['Wife', 'Son', 'Music', 'Reading', 'Hiking', 'Coffee', 'Food', 'Art'];
	return['thing' => $myFavoriteThings];
}


extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<title>Favorite Things</title>
</head>
<body>
	<h1>My Favorite Things</h1>
	<table>
		
		<tr><td><?php print_r($thing); ?></td></tr>
		
	</table>
</body>
</html>