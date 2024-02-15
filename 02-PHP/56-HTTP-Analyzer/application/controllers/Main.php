<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		require('application/libraries/simple_form_dom.php');
	}

	public function index() {

		$this->load->view('main');
	}

	public function fetch_content() {
		
		$url = $this->input->post("url");
		$html = file_get_html($url);

		echo $html; 

	}

	public function count_elements() {
		
		$url = $this->input->post("url");
		$html = file_get_html($url);

		$elementTypes = array('meta', 'div', 'p', 'a', 'img', 'ul', 'li', 'h1', 'h2', 'h3');

		$counts = array();

		foreach ($elementTypes as $elementType) {
			$elements = $html->find($elementType);
			$count = count($elements);
			$counts[$elementType] = $count;
		}

		echo json_encode($counts); 
	}
}
