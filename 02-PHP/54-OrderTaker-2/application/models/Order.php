<?php

class Order extends CI_Model {

    public function get_all_orders() {
        return $this->db->query("SELECT * FROM orders ORDER BY created_at")->result_array();
    }

    public function new_order($post) {

        $query = "INSERT INTO orders (content, created_at, updated_at) VALUES (?,NOW(),NOW())";

        return $this->db->query($query, $this->security->xss_clean($post["content"]));
    }

    public function delete_order($post) {
        return $this->db->query("DELETE FROM orders WHERE id = ?", $post["id"]); 
    }

    public function edit_order($post){

        $query = "UPDATE orders SET content = ?, updated_at = NOW() WHERE id = ?";
        $values = array($this->security->xss_clean($post["content"]), $post["id"]);

        return $this->db->query($query, $values);
    }

}
