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
            ->group_by("Name");

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

        if ($sport_list) {
            //* Construct the HAVING clause to filter by selected sports
            $having_conditions = [];
            foreach ($sport_list as $sport) {
                $having_conditions[] = 'sport_ids LIKE "%' . $this->db->escape_like_str($sport) . '%"';
            }

            //* Combine the HAVING conditions with AND
            $having_condition = '(' . implode(' AND ', $having_conditions) . ')';

            //* Apply the HAVING condition to the query
            $this->db->having($having_condition);
        }

        $complete_query = $this->db->get();
        return $complete_query->result_array();
    }
}
