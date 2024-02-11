<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function order_html(){

		$data["orders"] = $this->order->get_all_orders(); 
		$this->load->view("partials/orders", $data); 
	}

	public function index() {
		$this->load->view('main');
	}

	public function new_order(){

		if (strlen($this->input->post("content")) > 1 ) {
			$this->order->new_order($this->input->post());		
		} 
		$this->order_html(); 		
	}
	
}
