<?php

class Product extends CI_Model {

    public function get_all() {

        return $this->db->query("SELECT * FROM products ORDER BY price")->result_array();
    }

    public function filter($post) {

        $post = $this->clean($post);
        $where_temp = array(); 

        $where_temp[] = $this->filter_by_name($post["by_name"]);

        if ($post["min"] || $post["max"]) {
            $where_temp[] = $this->filter_by_min_max($post["min"], $post["max"]);
        }

        $where = " WHERE ";
        $where .= implode(" AND ", $where_temp);
        $order = " ORDER BY price {$post["order"]}, item_name ASC";

        $query = "SELECT * FROM products";
        $query .= $where; 
        $query .= $order; 

        return $this->db->query($query)->result_array();
        //? return $query;  
    }

    public function filter_by_name($by_name) {

        return "item_name LIKE '%{$by_name}%'"; 
    }

    public function filter_by_min_max($min, $max) {

        //* Set values if one of the post is undefined
        if (!isset($min)) { 
            $min = 0;           
        } 
        if (!isset($max)) {
            $max = 0; 
        }      
        if (!$min) {
            return "price <= {$max}";
        }
        if (!$max) {
            return "price >= {$min}";
        }
        if ($min && $max) {
            return "price BETWEEN {$min} AND {$max}";
        }
    }

    public function clean($posts) {
        
        foreach($posts as $key => $value){
            $posts[$key] = $this->security->xss_clean($value); 
        }
        return $posts;
    }

}
