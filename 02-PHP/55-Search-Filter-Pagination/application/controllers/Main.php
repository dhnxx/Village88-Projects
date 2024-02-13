<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//? $this->output->enable_profiler(TRUE);
	}

	public function index() {
		$this->load->view('main');
	}

	public function page_index() {
		
		$data["products"] = $this->product->get_all(); 
		$this->load->view('partials/table.php', $data);
	}

	public function filter() {

		$data["products"] = $this->product->filter($this->input->post(NULL, TRUE)); 
		//? $query = $this->product->filter($this->input->post());
		//? var_dump($query);
		$this->load->view('partials/table.php', $data);
	}

}
