<?php

class Player extends CI_Model {

    public function get_player_info() {
        return $this->db->query("SELECT name, image_url FROM players")->result_array();
    }

    public function fetch_filter($filter_get) {

        $sport_list = array(); 
        $this->db->select("players.name AS Name, players.image_url AS image_url, GROUP_CONCAT(player_sports.sport_id) AS sport_ids")
            ->from("player_sports")
            ->join("players", "players.id = player_sports.user_id")
            ->group_by("players.name");

        if (!empty($filter_get["name"])) {
            $this->db->where("players.name", $filter_get["name"]);
        }

        if (!empty($filter_get["female"])) {
            $this->db->where("players.gender", "1");
        }

        if (!empty($filter_get["male"])) {
            $this->db->where("players.gender", "0");
        }

        //* Iterate through the selected sports and add them to the list
        foreach ($filter_get["sports"] as $sport) {
            if ($sport) {
                $sport_list[] = $sport;
            }
        }

        //* Check if any sports were selected
        if ($sport_list) {
            //* Construct the HAVING clause to filter by selected sports
            $having_condition = 'GROUP_CONCAT(`player_sports`.`sport_id` ORDER BY `player_sports`.`sport_id`) = ' . $this->db->escape(implode(",", $sport_list));

            //* Apply the HAVING condition to the query
            $this->db->having($having_condition);
        }


        $complete_query = $this->db->get();
        return $complete_query->result_array();
    }
}
