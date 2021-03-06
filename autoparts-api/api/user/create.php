<?php
/*
A file that will accept posted "user" data to be saved to the database.
Skeleton: 0.1
Author: Lord-tx
*/


// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate user object
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if (
    !empty($data->name) &&
    !empty($data->phone) &&
    !empty($data->location) &&
    !empty($data->device_type) &&
    !empty($data->network_latency)
) {

    // set user property values
    $user->name = $data->name;
    $user->phone = $data->phone;
    $user->location = $data->location;
    $user->device_type = $data->device_type;
    $user->network_latency = $data->network_latency;
    $user->created = date('Y-m-d H:i:s');

    // create the user
    if ($user->create()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "account was created successfully."));
    } // if unable to create the user, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create account."));
    }
} // tell the user data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create account. Information is incomplete."));
}
