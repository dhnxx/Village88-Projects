<?php

class Player extends CI_Model {

    public function get_player_info() {
        return $this->db->query("SELECT name, image_url FROM players")->result_array();
    }

}
