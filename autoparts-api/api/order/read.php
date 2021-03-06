<?php
/*
A file that will output JSON data based on "orders" database records.
Skeleton: 0.1
Author: Lord-tx
*/

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/order.php';

// instantiate database and order object
$database = new Database();
$db = $database->getConnection();

// initialize object
$order = new Order($db);

// read orders