<?php

class Main extends CI_Model {
    function get_all() {
        return $this->db->query("SELECT * FROM Manufacturers")->result_array();
    }
    function get_by_id($manufacturer_id) {
        return $this->db->query("SELECT * FROM Manufacturers WHERE id = ?", array($manufacturer_id))->row_array();
    }
    function add($manufacturer) {
        $query = "INSERT INTO Manufacturers(name, created_at, updated_at) VALUES (?,?,?)";
        $values = array($manufacturer['name'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
}