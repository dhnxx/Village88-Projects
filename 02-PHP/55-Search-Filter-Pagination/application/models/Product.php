<?php

class Product extends CI_Model {

    public function get_all() {

        return $this->db->query("SELECT * FROM products ORDER BY price LIMIT 5")->result_array();
    }

    public function filter($post, $page) {

        $post = $this->clean($post);
        $where_temp = array(); 

        $where_temp[] = $this->filter_by_name($post["by_name"]);

        //* If either min or max is set otherwise, do not include in the query

        if ($post["min"] || $post["max"]) {
            $where_temp[] = $this->filter_by_min_max($post["min"], $post["max"]);
        }

        $where = " WHERE ";
        $where .= implode(" AND ", $where_temp);
        $order = " ORDER BY price {$post["order"]}, item_name ASC";
        $limit = " LIMIT 5 OFFSET " . $page * 5; 

        $query = "SELECT * FROM products" . $where . $order . $limit;
        $count = "SELECT count(id) as count FROM products" . $where . $order;

        $result["filtered"] = $this->db->query($query)->result_array();

        $count_result = $this->db->query($count)->row_array();
        $result["count"] = ceil($count_result["count"]/5); 


        return $result;
    }

    public function filter_by_name($by_name) {

        return "item_name LIKE '%{$by_name}%'"; 
    }

    public function filter_by_min_max($min, $max) {

        //* Set values if one of the posts is undefined
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
