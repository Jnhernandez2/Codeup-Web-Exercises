<?php

function inputHas($key) {
	if ((isset($_REQUEST[$key]))) {
		return $_REQUEST[$key];
	}
	
}

function inputGet($key, $default = '') {
	if (inputHas($key)) {
		return inputHas($key);
	} else {
		$_REQUEST[$key] = $default;
		return $_REQUEST[$key];	
	}
	
}

function escape($input) {
	return htmlspecialchars(strip_tags($input));
}

