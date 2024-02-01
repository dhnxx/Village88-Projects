<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->helper('url');
		// $this->load->helper("form");
		// $this->load->library('session');
	}

	public function index() {
		$this->load->view('main');
	}
}
