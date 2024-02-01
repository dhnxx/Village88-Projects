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

		$data = array(
			"course_titles" =>
			array("PHP Track" => "PHP Track", "JavaScript Track" => "JavaScript Track", "Web Fundamentals" => "Web Fundamentals"),
			"ratings" => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10")
		);
		$this->load->view('main', $data,);
	}

	public function display() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
		$data = array("name" => $this->input->post("name"), "course_title" => $this->input->post("course"), "rating" => $this->input->post("rating")+1, "reason" => $this->input->post("reason"));
		$this->load->view('display', $data);
		}else{
			redirect("main/index");
		}
	}
}
