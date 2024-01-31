<?php

class databaseConnection {
    public $conn;
    public $output; 


    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli("localhost", "root", "", "lead_gen_business");

        if ($this->conn->connect_errno) {
            die("Failed to connect to MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error);
        }
    }

    public function fetch_all($query) {
        $data = array();
        $result = $this->conn->query($query);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function fetch_single($query) {
        $result = $this->conn->query($query);
        return mysqli_fetch_assoc($result);
    }

    public function run_query($query) {
        $result = $this->conn->query($query);
        return $this->conn->insert_id;
    }
}
