<?php
/*
A file that will output JSON data based on "users" database records.
Skeleton: 0.1
Author: Lord-tx
*/

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/user.php';

// instantiate database and user object
$database = new Database();
$db = $database->getConnection();

// initialize object
$user = new User($db);

// query users
$stmt = $user->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // users array
    $users_arr=array();
    $users_arr["records"]=array();

    // retrieve our table contents
    // fetch() is supposedly faster than fetchAll()

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $user_item = array(
            "id" => $id,
            "name" => $name,
            "acc_creation_time" => $acc_creation_time
        );

        array_push($users_arr["records"], $user_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show users data in json format
    echo json_encode($users_arr);
}

// no users found will be here
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no users found
    echo json_encode(
        array("message" => "No user found.")
    );
}