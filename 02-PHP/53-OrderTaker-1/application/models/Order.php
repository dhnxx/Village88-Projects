<?php

class Order extends CI_Model {

    public function get_all_orders() {
        return $this->db->query("SELECT * FROM orders LIMIT 6")->result_array();
    }

    public function new_order($post){
        
        $query = "INSERT INTO orders (content, created_at, updated_at) VALUES (?,NOW(),NOW())"; 

        return $this->db->query($query, $post["content"]); 
    }

    public function validate_new_order(){
        
        //! Add Validations 


    }
}
