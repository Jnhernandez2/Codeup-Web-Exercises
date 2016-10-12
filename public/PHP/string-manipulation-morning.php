<?php 

$uncapitalized = ['arches', 'badlands', 'carlsbad', 'denali'];

$to_capitalize = ['denali', 'badlands'];

// for ($i = 0; $i < count($uncapitalized); $i++) {

// 	if ($uncapitalized[$i] ) {

// 		array_push($capitalized, $uncapitalized[$i]);

// 	}

// }

foreach ($to_capitalize as $capitalized) {

	ucfirst($capitalized);
}

var_dump($uncapitalized);
var_dump($to_capitalize);