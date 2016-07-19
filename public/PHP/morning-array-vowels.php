<?php 

$lettersArray = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'];

function removeVowels($array) {
	$noVowels = $array;
	for ($i = 0; $i < count($array); $i++) {
		if ($array[$i] == 'a' || $array[$i] == 'e' || $array[$i] == 'i' || $array[$i] == 'o' || $array[$i] == 'u') {
			unset($noVowels[$i]);
			
		}
	}
	return $noVowels;
}

$noVowelsArray = removeVowels($lettersArray);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Get Those Vowels OUTTA THERE!</title>
</head>
<body>
	<h1>Original Array</h1>
	<h2><?php print_r($lettersArray); ?></h2>
	<h1>No More Vowels<h1>
	<h2><?php print_r($noVowelsArray); ?></h2>
</body>
</html>



