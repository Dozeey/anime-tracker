<?php
/*
Contains properties and methods for "order" database queries.
Skeleton: 0.1
Author: Lord-tx
*/

class Order
{

    // database connection and table name
    private $conn;
    private $table_name = "orders";

    // object properties
    public $id;
    public $user_id;
    public $product_id;
    public $created;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
}

