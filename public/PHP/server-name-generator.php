<?php

function pageController() {
	$adjectives = ['Frisky', 'Smokey', 'Lickable', 'Throbbing', 'Wrinkly', 'Filthy', 'Sultry', 'Steamy', 'Hairy', 'Perpendicular', 'Bloated', 'Massacred', 'Wonderful', 'Galvanistic', 'Aggressive'];

	$nouns = ['Lemur', 'Rascal', 'Rhino', 'Algorithm', 'Cameron', 'Cereal', 'Laser', 'Whiskers', 'Finger', 'Tip', 'Gavin', 'Wonder', 'Peppers', 'Flanges', 'Rings', 'Boat', 'Family', 'Empire'];

	$randomAdjective = array_rand($adjectives, 1);
	$randomNoun = array_rand($nouns, 1);

	return['adjective' => $adjectives[$randomAdjective], 'noun' => $nouns[$randomNoun]];
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Server Name Generator</title>
	</head>
	<body>
		<h1> <?= $adjective . ' ' . $noun ?> </h1>
	</body>
</html>
