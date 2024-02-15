<?php

class Employee extends CI_Model {

    public function fetch_all($count) {

        $query = "SELECT * FROM employees LIMIT {$count}"; 
        return $this->db->query($query)->result_array(); 
    }

    public function fetch_count() {
        $query = "SELECT count(id) AS count FROM employees"; 

        $result =  $this->db->query($query)->row_array(); 
        
        return $result["count"];
    }

}
