<?php

require_once '../../source/input.php';
require_once __DIR__ . '/../../php/db_connect.php';
//require_once __DIR__ . '';

function pageController($dbc) {

	$sql = "SELECT * FROM national_parks";

	$page = max([Input::get('page', 0), 0]); 
    $offset = $page * 4 - 4;
    $sql .= " LIMIT 4 OFFSET $offset";


	$stmt = $dbc->query($sql);
	$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$count = $dbc->query("SELECT COUNT(*) FROM national_parks")->fetchColumn();
	$pages = ceil($count/4);

	if (!empty($_POST)) {
		$name = Input::get('name');
		$location = Input::get('location');
		$dateEstablished = Input::get('date_established');
		$areaInAcres = Input::get('area_in_acres');
		$description = Input::get('description');
	
		$insert = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)";
		$stmt = $dbc->prepare($insert);
		$stmt->bindValue(':name', $name, PDO::PARAM_STR);
		$stmt->bindValue(':location', $location, PDO::PARAM_STR);
		$stmt->bindValue(':date_established', $dateEstablished, PDO::PARAM_STR);
		$stmt->bindValue(':area_in_acres', $areaInAcres, PDO::PARAM_STR);
		$stmt->bindValue(':description', $description, PDO::PARAM_STR);
		$stmt->execute();

	}

	return [

		'parks' => $parks,
		'pages' => $pages

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
	<title></title>
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
                            <th>Date Established</th>
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
                        placeholder="1890-10-01"
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