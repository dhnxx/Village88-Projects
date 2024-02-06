<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Players extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		$this->load->model("player");
		$this->players = $this->player->get_player_info();
		$this->filter_get =
			array("name" => $this->input->get("name"), "female" => $this->input->get("female"), "male" => $this->input->get("male"), "sports" => array("basketball" => $this->input->get("basketball"), "volleyball" => $this->input->get("volleyball"), "baseball" => $this->input->get("baseball"), "soccer" => $this->input->get("soccer"), "football" => $this->input->get("football")));
	}

	public function index() {

		$data["players"] = $this->filter(); 
		$this->load->view('main', $data);
	}

	public function filter() {

		return $this->player->fetch_filter($this->filter_get);

	}
}
