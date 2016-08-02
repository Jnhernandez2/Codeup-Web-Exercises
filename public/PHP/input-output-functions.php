<?php

require_once 'middleware-functions.php';
require_once 'model-functions.php';
require_once 'validation-functions.php';
require_once 'view-functions.php';
require_once 'controller-functions.php';
require_once 'functions.php';



// Input / Output
function prompt($message)
{
    alert($message);
    return trim(fgets(STDIN));
}

function confirm($message)
{
    return strtolower(prompt($message)) === 'y';
}

function alert($message)
{
    fwrite(STDOUT, $message . PHP_EOL);
}







// // Front controller
// function contactsManager()
// {
//     $menu = <<<MENU
// 1. View contacts.
// 2. Add a new contact.
// 3. Search a contact by name.
// 4. Delete an existing contact.
// 5. Exit.
// Enter an option (1, 2, 3, 4 or 5):
// MENU;
//     do {
//         $contacts = loadContacts();
//         $option = prompt($menu);
//         switch ($option) {
//             case 1:
//                 viewContacts($contacts);
//                 break;
//             case 2:
//                 newContact($contacts);
//                 break;
//             case 3:
//                 findContact($contacts);
//                 break;
//             case 4:
//                 deleteContact($contacts);
//                 break;
//             default:
//                 alert('See you!');
//         }
//         saveContacts($contacts);
//     } while ($option != 5);
// }

// contactsManager();