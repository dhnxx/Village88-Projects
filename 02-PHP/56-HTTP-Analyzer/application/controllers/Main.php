<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function index() {

		$this->load->view('main');
	}

	public function fetch_content() {
    $content = file_get_contents("https://www.youtube.com/");
    echo $content;
}

}