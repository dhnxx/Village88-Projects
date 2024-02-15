<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employees extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('employee');
	}

	public function index_table() {

		$post["date"] = "";
		$post["leave_type"] = ""; 
		$output = $this->employee->filter($post, "result");

		$data["employees"] = $output;

		$this->load->view("partials/table.php", $data); 
	}

	public function update_table() {

		$output = $this->employee->filter($this->input->post(NULL, TRUE), "result");

		$data["employees"] = $output;


		$this->load->view("partials/table.php", $data); 
		
	}

	public function get_count(){

		$output = $this->employee->filter($this->input->post(NULL, TRUE), "count");

		echo(json_encode($output));
	}

	public function index() {
		$this->load->view('main');
	}

}
