<?php

class Information extends CI_Model {

    public function login_by_contact_number($user) {
        return $this->db->get_where("users", array("contact_number" => $user["contact_number"], "password" => $user["password"]))->row_array();
    }

    public function login_by_email($user) {
        return $this->db->get_where("users", array("email" => $user["email"], "password" => $user["password"]))->row_array();
    }

    public function sign_up($user) {
        $query = "INSERT INTO users (first_name, last_name, email, contact_number, password, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
        $values = array($user['first_name'], $user['last_name'], $user['email'], $user['contact_number'], $user['password'], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"));
        return $this->db->query($query, $values);
    }
}
