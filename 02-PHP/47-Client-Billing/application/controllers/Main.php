<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('billing');
	}

	public function index() {

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$date = array("from" => $this->input->post('from', TRUE), "to" => $this->input->post('to', TRUE));
		} else {
			$date = array("from" => "2011-01-01", "to" => "2011-12-31");
		}
		$data['billings'] = $this->billing->get_data($date);
		$data['date'] = $date;
		$monthNames = [
			'1' => 'January',
			'2' => 'February',
			'3' => 'March',
			'4' => 'April',
			'5' => 'May',
			'6' => 'June',
			'7' => 'July',
			'8' => 'August',
			'9' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December'
		];

		foreach ($data['billings'] as &$entry) {
			$entry["Month"] = $monthNames[$entry["Month"]];
		}


		$this->load->view('main', $data);
	}

}
