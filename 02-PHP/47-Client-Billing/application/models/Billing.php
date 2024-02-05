<?php

class Billing extends CI_Model {

    public function get_data($date) {

        $query = "SELECT MONTH(charged_datetime) AS Month, 
    YEAR(charged_datetime) AS Year, amount FROM `billing` WHERE charged_datetime 
    BETWEEN ? AND ? 
    GROUP BY  YEAR(charged_datetime), MONTH(charged_datetime)  
    ORDER BY YEAR(charged_datetime), MONTH(charged_datetime)";

        $values = array($date['from'], $date['to']);
        return $this->db->query($query, $values)->result_array();
    }
}
