<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Players extends CI_Controller {

	private $players;

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model("player");
		$this->players = $this->player->get_player_info();
	}

	public function index() {

		$data["players"] = $this->players;
		$this->load->view('main', $data);
	}

	public function filter() {

		$query = array();
		$query_sports = array();
		

		if ($this->input->get("name")) {
			$query[] = "NAME = '{$this->input->get("name")}'";
		}

		if ($this->input->get("female")) {
			$query[] = "gender = '0'";
		}

		if ($this->input->get("male")) {
			$query[] = "gender = '1'";
		}

		if ($this->input->get("basketball")) {
			$query_sports[] = "sport_id = '1'";
		}

		if ($this->input->get("volleyball")) {
			$query_sports[] = "sport_id = '2'";
		}

		if ($this->input->get("baseball")) {
			$query_sports[] = "sport_id = '3'";
		}

		if ($this->input->get("soccer")) {
			$query_sports[] = "sport_id = '4'";
		}

		if ($this->input->get("football")) {
			$query_sports[] = "sport_id = '5'";
		}


		$query = implode(" AND ", $query);
		$complete_query[] = $query;
		
		if (!empty($query_sports)) {
			$query_sports = implode(" OR ", $query_sports);
			$complete_query[] = "({$query_sports})";
		}
		if (!empty($query) && !empty($query_sports)) {
			$complete_query = implode(" AND ", $complete_query);
		} else {
			$complete_query = implode(" ", $complete_query);
		}

		$complete_query = "WHERE " . $complete_query;
		var_dump($complete_query);
		return $complete_query;
	}

	public function filter2(){
		$filter_get = array("name" => $this->input->get("name"), "female" => $this->input->get("female"), "male" => $this->input->get("male"), "sports" => array("basketball" => "1", "volleyball" => "2", "baseball" => "3", "soccer" => "4", "football" => "5") );
	}

	
}
