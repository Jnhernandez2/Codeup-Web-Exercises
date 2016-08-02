<?php
require_once 'debug-functions.php';
require_once '../../source/password-auth-class.php';

function pageController() {
	session_start();

    Auth::logout();
    redirect("debug-login.php");
}

pageController();