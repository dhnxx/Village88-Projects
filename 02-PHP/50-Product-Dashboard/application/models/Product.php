<?php

class Product extends CI_Model {

    public function __construct() {

        parent::__construct();

        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    }

    public function get_product() {
        $query = "SELECT * FROM products";
        return $this->db->query($query)->result_array();
    }

    public function get_product_by_id($id) {
        $query = "SELECT * FROM products WHERE id = ?";

        $id = $this->security->xss_clean($id);

        return $this->db->query($query, $id)->row_array();
    }

    public function insert_product() {

        $query = "INSERT INTO products (name, description, price, count, sold, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";

        $name = $this->security->xss_clean($this->input->post("name"));
        $description = $this->security->xss_clean($this->input->post("description"));
        $price = $this->security->xss_clean($this->input->post("price"));
        $count = $this->security->xss_clean($this->input->post("count"));
        $sold = $this->security->xss_clean($this->input->post("sold"));

        $values = array($name, $description, $price, $count, $sold, date("Y-m-d h:i:s"), date("Y-m-d h:i:s"));

        return $this->db->query($query, $values);
    }

    public function update_product($id) {

        $query = "UPDATE products SET name = ?, description = ?, price = ?, count = ? , sold = ? WHERE id = ?";

        $name = $this->security->xss_clean($this->input->post("name"));
        $description = $this->security->xss_clean($this->input->post("description"));
        $price = $this->security->xss_clean($this->input->post("price"));
        $count = $this->security->xss_clean($this->input->post("count"));
        $sold = $this->security->xss_clean($this->input->post("sold"));

        $values = array($name, $description, $price, $count, $sold, $id);

        return $this->db->query($query, $values);
    }

    public function delete_product($id) {

        $query = "DELETE FROM products where id = {$id}";
        $this->db->query($query);
    }



    public function validate_insert_product() {

        $this->form_validation->set_rules("name", "Name", "required");
        $this->form_validation->set_rules("description", "Description", "required");
        $this->form_validation->set_rules("price", "Price", "required|numeric");
        $this->form_validation->set_rules("count", "Inventory Count", "required|numeric");
        $this->form_validation->set_rules("sold", "Inventory Count", "required|numeric");
        if ($this->form_validation->run() == FALSE) {

            $errors =  array(
                "name" => form_error("name"),
                "description" => form_error("description"), "price" => form_error("description"), "price" => form_error("price"), "count" => form_error("count"),
            );

            return $errors;
        }
    }

    public function validate_update_product() {

        $this->form_validation->set_rules("name", "Name", "required");
        $this->form_validation->set_rules("description", "Description", "required");
        $this->form_validation->set_rules("price", "Price", "required|numeric");
        $this->form_validation->set_rules("count", "Inventory Count", "required|numeric");
        $this->form_validation->set_rules("sold", "Quantity Sold", "required|numeric");

        if ($this->form_validation->run() == FALSE) {

            $errors =  array(
                "name" => form_error("name"),
                "description" => form_error("description"), "price" => form_error("description"), "price" => form_error("price"), "count" => form_error("count"), "sold" => form_error("sold")
            );

            return $errors;
        }
    }
}
