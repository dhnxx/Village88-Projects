<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index() {

		$this->load->view('main');
	}

	public function csrf(){

		$csrf["name"] = $this->security->get_csrf_token_name();
		$csrf["hash"] = $this->security->get_csrf_hash();
		echo json_encode($csrf); 
	}

	public function page_index() {
		
		$result = $this->product->filter(array("by_name" => "", "min" => "", "max" => "", "order" => ""), 0);
		
		$data["products"] = $result["filtered"];
		$data["count"] = $result["count"];
		
		$this->load->view('partials/table.php', $data);
	}

	public function filter($page) {
	
		$result = $this->product->filter($this->input->post(NULL, TRUE), $page);
		
		$data["products"] = $result["filtered"];
		$data["count"] = $result["count"];
		
		$this->load->view('partials/table.php', $data);
	}

}
