<?php

require_once 'input-output-functions.php';
require_once 'middleware-functions.php';
require_once 'validation-functions.php';
require_once 'view-functions.php';
require_once 'controller-functions.php';
require_once 'functions.php';

// Model
function addContact(&$contacts, $name, $number, $id = null)
{
	if ($id == null) {
		$id = uniqid();
	}
    
    $contacts[] = [
        'name' => $name,
        'number' => $number,
        'id' => $id
    ];

}

function searchContact($contacts, $name)
{
    $matches = [];
    foreach ($contacts as $contact) {
        if (stripos($contact['name'], $name) !== false) {
            $matches[] = $contact;
        }
    }
    return $matches;
}

function deleteContacts(&$contacts, $id)
{
    foreach ($contacts as $index => $contact) {
        if (strpos($contact['id'], $id) !== false) {
            unset($contacts[$index]);
        }
    }
}