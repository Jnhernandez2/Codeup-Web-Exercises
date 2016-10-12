<?php

require_once '../../source/input.php';
require_once __DIR__ . '/../../php/db_connect.php';
//require_once __DIR__ . '';

function pageController($dbc) {

	$sql = "SELECT * FROM national_parks";

	$page = max([Input::getNumber('page', 1), 1]); 
    $offset = $page * 4 - 4;
    $sql .= " LIMIT 4 OFFSET $offset";


	$stmt = $dbc->query($sql);
	$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$count = $dbc->query("SELECT COUNT(*) FROM national_parks")->fetchColumn();
	$pages = ceil($count/4);

    $errors = [];
    $name = '';
    $location = '';
    $dateEstablished = '';
    $areaInAcres = '';
    $description = '';

	if (!empty($_POST)) {
        
        try {
		  $name = Input::getString('name');
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }

        try {
            $location = Input::getString('location');
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }

        try {
            $dateEstablished = Input::getDate('date_established');
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }

        try {
		    $areaInAcres = Input::getNumber('area_in_acres');
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }

        try {
            $description = Input::getString('description', 50, 500);
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }

	    
        if(empty($errors)) {
    		$insert = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)";
    		$stmt = $dbc->prepare($insert);
    		$stmt->bindValue(':name', $name, PDO::PARAM_STR);
    		$stmt->bindValue(':location', $location, PDO::PARAM_STR);
    		$stmt->bindValue(':date_established', $dateEstablished->format('Y-m-d'), PDO::PARAM_STR);
    		$stmt->bindValue(':area_in_acres', $areaInAcres, PDO::PARAM_STR);
    		$stmt->bindValue(':description', $description, PDO::PARAM_STR);
    		$stmt->execute();
        }

	}

	return [

		'parks' => $parks,
		'pages' => $pages,
        'errors' => $errors,
        'name' => $name,
        'location' => $location,
        'dateEstablished' => $dateEstablished,
        'areaInAcres' => $areaInAcres,
        'description' => $description

		];
}

extract(pageController($dbc));


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
    <style>
        body {
            background-image: url('../IMG/subtle-patterns-7.jpeg');
            background-size: 100%;
        }
    </style>
	<title>National Parks Database</title>
</head>
<body>
	<div class="container">
		<section class="row">
            <div class="col-md-8">
                <header class="page-header">
                    <h1>National Parks</h1>
                </header>
            </div>
        </section>
        <article class="row contacts">
            <section class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Date Established (Y-M-D)</th>
                            <th>Area in Acres</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($parks as $key => $park): ?>
                            <td><?= $parks[$key]['name'] ?></td>
                            <td><?= $parks[$key]['location'] ?></td>
                            <td><?= $parks[$key]['date_established'] ?></td>
                            <td><?= $parks[$key]['area_in_acres'] ?></td>
                            <td><?= $parks[$key]['description'] ?></td>
                        </tr><?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      	<tr>
                          	<td colspan="12">
                              <!-- The values in this pagination control indicate you're currently viewing page 2 -->
                              	<nav aria-label="Page navigation" class="text-center">
                                  	<ul class="pagination">
                                  		<?php foreach (range(1, $pages) as $page): ?>
	                                    <li><a href="?page=<?= $page ?>"><?= $page ?></a></li>
	                                <?php endforeach; ?>
                                  	</ul>
                              	</nav>
                         	</td>
                      	</tr>
                    </tfoot>
                </table>
            </section>
        </article>
        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <h4><?= $error ?><h4>
            <?php endforeach; ?>
        <?php endif; ?>
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
                        id="name"
                        placeholder="Yosemite"
                        <?php if (!empty($errors)): ?>
                        value="<?= $name ?>"
                        <?php endif; ?>
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="location" class="col-sm-2 control-label">
                    Location
                </label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        name="location"
                        id="location"
                        placeholder="California"
                        <?php if (!empty($errors)): ?>
                        value="<?= $location ?>"
                        <?php endif; ?>
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="date_established" class="col-sm-2 control-label">
                    Date Established
                </label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        name="date_established"
                        id="date_established"
                        placeholder="1890-10-01 / YEAR-MONTH-DATE"
                        <?php if (!empty($errors)): ?>
                        value="<?= $dateEstablished->format('Y-m-d') ?>"
                        <?php endif; ?>
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="area_in_acres" class="col-sm-2 control-label">
                    Area in Acres
                </label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        name="area_in_acres"
                        id="area_in_acres"
                        placeholder="761226.91"
                        <?php if (!empty($errors)): ?>
                        value="<?= $areaInAcres ?>"
                        <?php endif; ?>
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">
                    Description
                </label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        name="description"
                        id="description"
                        placeholder="Yosemite features towering granite cliffs."
                        <?php if (!empty($errors)): ?>
                        value="<?= $description ?>"
                        <?php endif; ?>
                    >
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