<?php

class Main extends CI_Model {

    public function get_all() {
        return $this->db->query("SELECT * FROM phonebook")->result_array();
    }

    public function get_by_id($id) {
        return $this->db->query("SELECT * FROM phonebook WHERE id = ?", array($id))->row_array();
    }

    public function add_record($phonebook) {
        $query = "INSERT INTO phonebook(name, contact_number, created_at, updated_at) VALUES (?,?,?,?)";
        $values = array($phonebook['name'], $phonebook['contact_number'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }

    public function remove_row_by_id($id) {
        $query = "DELETE FROM phonebook WHERE id = {$id}";
        return $this->db->query($query);
    }

    public function update_record($phonebook) {
        $query = "UPDATE phonebook SET name = '{$phonebook['name']}', contact_number = '{$phonebook['contact_number']}' WHERE id = {$phonebook['id']}";
        return $this->db->query($query);
    }
}
