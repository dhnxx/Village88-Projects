<?php

class Bookmarks extends CI_Model {
    function fetch_all() {
        return $this->db->query("SELECT * FROM bookmarks")->result_array();
    }

    function insert_bookmark($bookmark) {
        $query = "INSERT INTO bookmarks(name, url, folder, created_at, updated_at) VALUES (?,?,?,?,?)";
        $values = array($bookmark['name'], $bookmark['url'], $bookmark['folder'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }

    function delete_bookmark($id) {
        $query = "DELETE FROM bookmarks WHERE id = {$id}";
        return $this->db->query($query);
    }
}
