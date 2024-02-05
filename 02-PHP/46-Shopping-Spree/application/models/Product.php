<?php

class Product extends CI_Model {

    public function get_product_info() {
        return $this->db->query("SELECT id,name,price,image_url FROM products")->result_array();
    }

    public function get_by_id($id) {
        return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
    }

    public function add_record($phonebook) {
        $query = "INSERT INTO phonebook(name, contact_number, created_at, updated_at) VALUES (?,?,?,?)";
        $values = array($phonebook['name'], $phonebook['contact_number'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
}