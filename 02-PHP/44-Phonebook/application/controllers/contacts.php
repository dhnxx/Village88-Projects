<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contacts extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}

	public function index() {

		$this->load->model('contact');

		$contacts = $this->contact->get_all();
		$data = array("contacts" => $contacts);
		$this->load->view('main', $data);
	}

	public function show($id) {
		$this->load->model('contact');
		$contact = $this->contact->get_by_id($id);
		$data = array("contact" => $contact);
		$this->load->view('show', $contact);
	}

	public function new() {
		$this->load->view('new');
	}

	public function edit($id) {
		$data = array("id" => $id);
		$this->load->view('edit', $data);
	}

	public function create() {
		$this->load->model('contact');

		//* Form Validation 
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required|numeric|min_length[11]|max_length[11]');

		if ($this->form_validation->run() == FALSE) {
			//* Display with indicated errors
			$this->load->view('new');
		} else {
			$phonebook = array("name" => $this->input->post('name'), "contact_number" => $this->input->post('contact_number'));
			$add = $this->contact->add_record($phonebook);
			if ($add === True) {
				echo "Added Successfully";
			}
			redirect("contacts");
		}
	}

	public function update($id) {
		$this->load->model('contact');

		//* Form Validation 
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required|numeric|min_length[11]|max_length[11]');

		if ($this->form_validation->run() == False) {
			//* Display with indicated errors
			$data["id"] = $id; 
			$this->load->view("edit", $data); 
		} else {
			$phonebook = array("id" => $id, "name" => $this->input->post('name'), "contact_number" => $this->input->post('contact_number'));
			$update = $this->contact->update_record($phonebook);
			if ($update === True) {
				echo "Updated Successfully";
			}
			redirect("contacts");
		}
	}

	public function destroy() {
		$this->load->model('contact');
		$delete = $this->contact->remove_row_by_id($this->input->post('id'));
		if ($delete === True) {
			echo "Deleted Successfully";
		}
		redirect("contacts");
	}
}
