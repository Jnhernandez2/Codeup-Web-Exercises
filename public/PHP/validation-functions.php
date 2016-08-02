<?php 

require_once 'input-output-functions.php';
require_once 'middleware-functions.php';
require_once 'model-functions.php';
require_once 'view-functions.php';
require_once 'controller-functions.php';
require_once 'functions.php';

// Validation
function isValidName($name)
{
    return !empty(trim($name));
}

function isValidPhoneNumber($phoneNumber)
{
    return !empty(trim($phoneNumber)) && is_numeric($phoneNumber)
        && (strlen($phoneNumber) == 7 || strlen($phoneNumber) == 10);
}

function inputName($message)
{
    $name = prompt($message);
    if (isValidName($name)) {
        return $name;
    }
    alert('Please enter a non-empty name');
    return inputName($message);
}

function inputNumber($message)
{
    $number = prompt($message);
    if (isValidPhoneNumber($number)) {
        return $number;
    }
    alert('Please enter a phone number with 7 or 10 digits');
    return inputNumber($message);
}