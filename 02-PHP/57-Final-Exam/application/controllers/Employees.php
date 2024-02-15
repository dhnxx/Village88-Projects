<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employees extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('employee');
	}

	public function index($count = 5) {

		$data["employees"] = $this->employee->fetch_all($count);
		$data["result"] = $this->employee->fetch_count();
		$data["count"] = $count;
		
		foreach ($data['employees'] as $key => $val) {

    		$data['employees'][$key]["request_date"] = date("m/d/y", strtotime($val["request_date"]));

			$data['employees'][$key]["from_date"] = date("m/d/y", strtotime($val["from_date"]));

			$data['employees'][$key]["to_date"] = date("m/d/y", strtotime($val["from_date"]));
		}

		$this->load->view('main', $data);
	}

}
