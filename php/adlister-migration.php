<?php

require_once 'ad_db_connect.php';

$query = 'DROP TABLE IF EXISTS users;';

$dbc->exec($query);

$query = 'CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(240) NOT NULL,
    username VARCHAR(240) NOT NULL,
    email VARCHAR(240) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
)';

$dbc->exec($query);