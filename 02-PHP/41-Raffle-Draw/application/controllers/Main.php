<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper("form");
		$this->load->library('session');
	}

	public function index() {
		$visited = $this->session->userdata('visited');

		if ($visited === false) {
			$visited = 0;
		} else {
			$data = array("rand" => rand(1000000, 9999999));
			$visited++;
		}
		$this->session->set_userdata('visited', $visited);

		if ($this->input->post("pick")) {
		} elseif ($this->input->post("reset")) {
			$this->session->unset_userdata("visited");
			$this->session->userdata('visited');
			$data["rand"] = ""; 
		}
		var_dump($visited);

		$this->load->view('main', $data);
	}
}
