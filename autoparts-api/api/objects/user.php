<?php
/*
Contains properties and methods for "user" database queries.
Skeleton: 0.1
Author: Lord-tx
*/


class User{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $name;
    public $phone;
    public $location;
    public $device_type;
    public $network_latency;
    public $log_on_time;
    public $log_off_time;
    public $users_clicked;
    public $categories_visited;
    public $contemplation_period;
    public $verdict;
    public $created;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

            // CREATE USER ACCOUNT

    function create(){

        # query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, phone=:phone, location=:location, device_type=:device_type, network_latency=:network_latency";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->location=htmlspecialchars(strip_tags($this->location));
        $this->device_type=htmlspecialchars(strip_tags($this->device_type));
        $this->network_latency=htmlspecialchars(strip_tags($this->network_latency));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":device_type", $this->device_type);
        $stmt->bindParam(":network_latency", $this->network_latency);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

        // DELETE USER

    // delete the user
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

        // READ A SINGLE  USER DETAILS//

    function readOne(){

        // query to read single record
        $query = "SELECT
                *
            FROM
                " . $this->table_name . " 
                
            WHERE
                id = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of user to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];
        $this->phone = $row['phone'];
        $this->location = $row['location'];
        $this->device_type = $row['device_type'];
        $this->network_latency = $row['category_name'];
        $this->acc_creation_time = $row['acc_creation_time'];
    }

    // PAGINATION

    // read users with pagination
    public function readPaging($from_record_num, $records_per_page){

        // select query
        $query = "SELECT
                id, `name`, acc_creation_time
            FROM
                " . $this->table_name . "

            ORDER BY acc_creation_time ASC
            LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt;
    }


        // GET|USE USER COUNT

    // used for paging users
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }

    #READ ALL USERS //

    // read users
    function read(){

        // select all query
        $query = "SELECT
                id, `name`, acc_creation_time
            FROM
                " . $this->table_name . " 
                
                
            ORDER BY
                acc_creation_time DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }


        # SEARCH for A USER

    // search users
    function search($keywords){

        // select all query
        $query = "SELECT
                id, `name`, acc_creation_time, `location`
            FROM
                " . $this->table_name . " 
                
            WHERE
                name LIKE ? OR acc_creation_time LIKE ? OR location LIKE ?
            ORDER BY
                acc_creation_time DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    // UPDATE

    // update the user
    function update(){

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                phone = :phone,
                location = :location
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->location=htmlspecialchars(strip_tags($this->location));

        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':location', $this->location);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }



}
?>