<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function index() {
		$this->load->model('Bookmarks');
		$bookmarks = $this->Bookmarks->fetch_all();
		$data = array("bookmarks" => $bookmarks);
		$this->load->view('main', $data);
	}

	public function add_bookmarks() {
		$this->load->model('Bookmarks');
		$bookmark = array('name' => $this->input->post('name'), 'url' => $this->input->post('url'), 'folder' => $this->input->post('folder'));
		$insert_bookmarks = $this->Bookmarks->insert_bookmark($bookmark);
		if ($insert_bookmarks === TRUE) {
			echo "Added Bookmark";
		}
		redirect("Main/index");
	}

	public function delete_bookmarks($id) {
		$this->load->model('Bookmarks');

		$data = array("name" => $this->input->post('name'), "folder" => $this->input->post('folder'), "url" => $this->input->post('url'), "id" => $id);
		$this->load->view('delete', $data);
	}

	public function confirm_delete($id) {
		if ($this->input->post("confirm") === "Yes, I want to Delete") {
			$this->load->model('Bookmarks');
			$delete_bookmarks = $this->Bookmarks->delete_bookmark($id);
		}
		redirect("Main/index");
	}
}
