<?php

require_once 'input-output-functions.php';
require_once 'middleware-functions.php';
require_once 'model-functions.php';
require_once 'validation-functions.php';
require_once 'view-functions.php';
require_once 'functions.php';

// Controllers
function viewContacts($contacts)
{
    $contactsTable = formatContacts($contacts);
    alert($contactsTable);
}

function newContact(&$contacts)
{
    $name = inputName('Enter a new contact name:');
    $number = inputNumber('Enter phone number');
    $matches = searchContact($contacts, $name);
    if (count($matches) > 0) {
        $message = "There's already a contact named $name. Do you want to overwrite it? (y/n)";
        if (confirm($message)) {
            deleteContacts($contacts, $name);
        } else {
            newContact($contacts);
        }
    }
    addContact($contacts, $name, $number);
    alert('Contact saved successfully!');
}

function findContact($contacts)
{
    $name = inputName('Enter the name to search:');
    $matches = searchContact($contacts, $name);
    alert(formatContacts($matches));
}

function deleteContact(&$contacts)
{
    $name = prompt('Enter the name of the contact to delete:');
    deleteContacts($contacts, $name);
    alert('Contacts deleted successfully!');
}