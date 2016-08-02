<?php 

require_once 'input-output-functions.php';
require_once 'model-functions.php';
require_once 'validation-functions.php';
require_once 'view-functions.php';
require_once 'controller-functions.php';
require_once 'functions.php';

// Middleware
function loadContacts()
{
    $content = trim(file_get_contents('data/contacts.txt'));
    $lines = explode("\n", $content);
    $contacts = [];
    foreach ($lines as $line) {
        $contact = explode('|', $line);
        addContact($contacts, $contact[0], $contact[1], $contact[2]);
    }
    return $contacts;
}

$contacts = loadContacts();

function saveContacts($contacts)
{
    $content = '';
    foreach ($contacts as $contact) {
        $content .= implode('|', $contact) . "\n";
    }
    file_put_contents('data/contacts.txt', $content);
}