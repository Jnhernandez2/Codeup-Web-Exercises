<?php

require_once 'User.php';

$user = new User();
$user->name = 'Dat John Doe';
$user->username = 'breadnbutter1';
$user->email = 'thedankestbutterboi5@hotmail.com';
$user->password = 'inquisitivemindcriticalthinker';
$user->save();

$user = User::find(1);
$user->email = "buttermybread1@gmail.com";
$user->save();

$users = User::all();
var_dump($users);

//$user = User::find(1);
$user->delete(12, 'users');
var_dump($users);