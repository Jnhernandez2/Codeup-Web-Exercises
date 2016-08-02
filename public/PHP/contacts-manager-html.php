<?php
require_once 'input-output-functions.php';
require_once 'middleware-functions.php';
require_once 'model-functions.php';
require_once 'validation-functions.php';
require_once 'view-functions.php';
require_once 'controller-functions.php';
require_once 'functions.php';

function pageController() {

    $contacts = loadContacts();

    if (count($_POST) > 0) {
        
        $data['name'] = inputGet('name');
        $data['number'] = inputGet('number');

        $name = $data['name'];
        $number = $data['number'];
        $number = formatNumber($number);

        addContact($contacts, $name, $number); 
        saveContacts($contacts); 
    }

    if (count($_GET) > 0) {

        if (isset($_GET['search-name']) && !empty($_GET['search-name'])) {

            $data['name'] = inputGet('search-name');
            $name = $data['name'];

            $contacts = searchContact($contacts, $name);

        } elseif (isset($_GET['id']) && !empty($_GET['id'])) {

                $data['id'] = inputGet('id');
                $id = $data['id'];

                deleteContacts($contacts, $id);
                saveContacts($contacts);
        }     

    }
   

    return['contacts' => $contacts];
}

extract(pageController());


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
            integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
            crossorigin="anonymous"
        >
        <title>Contacts manager</title>
        <style>

            body {
            background-image: url("../IMG/crumpled-paper.png");
            background-size: 100%;
            background-repeat: no-repeat;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <section class="row">
                <div class="col-md-8">
                    <header class="page-header">
                        <h1>Contacts Manager</h1>
                    </header>
                </div>
                <div class="col-md-4" style="padding-top: 3.5em">
                    <form class="form-inline" method="get">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                id="search-name"
                                name="search-name"
                                placeholder="John Doe">
                        </div>
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search" aria-hidden="true">
                            </span>
                            Search
                        </button>
                    </form>
                </div>
            </section>
            <article class="row contacts">
                <section class="col-md-6">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Your contacts should be here -->
                            <tr>
                                <?php foreach ($contacts as $contact): ?>
                                <td><?= $contact['name'] ?></td>
                                <td><?= formatNumber($contact['number']) ?></td>
                                <td hidden><?= $contact['id'] ?></td>
                                <td>
                                    <!-- The query string for this one should contain the contact name -->
                                    <a class="btn btn-danger" href="?id=<?= $contact['id'] ?>">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true">
                                        </span>
                                        Delete
                                    </a>
                                </td>
                            </tr><?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section class="col-md-6">
                    <form method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">
                                Name
                            </label>
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number" class="col-sm-2 control-label">
                                Number
                            </label>
                            <div class="col-sm-10">
                                <input
                                    type="number"
                                    class="form-control"
                                    name="number"
                                    id="number">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
                                    </span>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </article>
        </div>
        <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"
        ></script>
    </body>
</html>