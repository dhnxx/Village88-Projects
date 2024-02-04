<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Information');
	}

	public function index() {
		$this->load->view('main');
	}

	public function register() {
		//* Validation rules for registration form
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required|numeric|min_length[11]|max_length[11]|is_unique[users.contact_number]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_pw', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
		} else {
			//* If validation passes, sign up the user
			$user = array(
				"first_name" => $this->input->post('first_name'),
				"last_name" => $this->input->post('last_name'),
				"email" => $this->input->post('email'),
				"contact_number" => $this->input->post('contact_number'),
				"password" => $this->input->post("password")
			);
			$this->Information->sign_up($user);
		}
		$this->load->view('main');
	}

	public function login() {
		//* Validation rules for login form
		$this->form_validation->set_rules('contact_number_email', 'Contact Number/Email', 'required');
		$this->form_validation->set_rules('login_password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			//* If validation fails, reload the login view
			$this->load->view('main');
		} else {
			//* If validation passes, attempt login
			$contact_number_email = $this->input->post('contact_number_email');
			$password = $this->input->post('login_password');

			//* Check if the input is an email or contact number
			if (filter_var($contact_number_email, FILTER_VALIDATE_EMAIL)) {
				//* Attempt login using email
				$user = array("email" => $contact_number_email, "password" => $password);
				$result = $this->Information->login_by_email($user);
			} else {
				//* Attempt login using contact number
				$user = array("contact_number" => $contact_number_email, "password" => $password);
				$result = $this->Information->login_by_contact_number($user);
			}

			//* Check the result of login attempt
			if ($result) {
				//* Login successful, redirect to dashboard or desired page
				$data['result'] = $result;
				$this->load->view("profile", $data);
			} else {
				//* Login failed, show error message
				echo "Invalid credentials. Please try again.";
				$this->load->view('main');
			}
		}
	}
}
