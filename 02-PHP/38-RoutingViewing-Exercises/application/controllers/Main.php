<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index() {
		echo ("I am main class");
	}

	public function hello() {

		echo ("Hello World!");
	}

	public function sayHi() {
		echo ("Hi!");
	}

	public function say_anything($word) {
		echo (strtoupper($word));
	}

	public function danger() {
		redirect("main");
	}

	public function world() {
		$this->load->helper('url');
		$data = array("message" => "testing message", "img" => base_url("assets/2.jpg"), "img2" => base_url("assets/1.webp"), "img3" => base_url("assets/3.webp"));
		$this->load->view("world", $data);
	}

	public function ninja() {
		$this->load->helper("url");
		$data = array(
			"ninja" => base_url("assets/ninjas/")
		);
		$this->load->view("ninja", $data);
	}

	public function ninjas($count) {
		$this->load->helper("url");
		$data = array(
			"ninja" => base_url("assets/ninjas/")
		, "count" => $count);
		$this->load->view("ninjas", $data);
	}
}
