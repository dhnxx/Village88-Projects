<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function index() {
		$this->is_logged();
	}

	public function register() {

		$data = array();
		if ($this->session->flashdata("register_errors")) {
			$data['errors'] =  $this->session->flashdata("register_errors");
		}
		$this->load->view('users/register', $data);
	}


	public function login() {

		$data = array();
		if ($this->session->flashdata("login_errors")) {
			$data['errors'] =  $this->session->flashdata("login_errors");
		}
		$this->load->view('users/login', $data);
	}

	public function edit_profile() {

		if ($this->session->flashdata("password_errors") || $this->session->flashdata("information_errors")) {
			$data["information_errors"] = $this->session->flashdata("information_errors");
			$data["password_errors"] = $this->session->flashdata("password_errors");
		}
		$user_id = $this->session->userdata("current_user");
		$data["information"] = $this->user->get_edit_profile($user_id["id"]);

		$this->load->view('users/edit', $data);
	}

	public function validate_edit_profile() {
		$validation_errors = $this->user->validate_edit_profile();
		if ($validation_errors === NULL) {
			$user_id = $this->session->userdata("current_user");
			$this->user->update_edit_profile($user_id["id"]);
			redirect(base_url("users/edit"));
		} else {
			$this->session->set_flashdata("information_errors", $validation_errors);
		}
		var_dump($this->session->flashdata("information_errors"));
		redirect(base_url("users/edit"));
	}

	public function validate_change_password() {
		$user_id = $this->session->userdata("current_user");
		$validation_errors = $this->user->validate_change_password();

		if ($validation_errors === NULL) {
			$this->user->change_password($user_id["id"]);
		} else {
			$this->session->set_flashdata("password_errors", $validation_errors);
		}
		redirect(base_url("users/edit"));
	}

	public function validate_register() {

		$validation = $this->user->validate_register();
		if ($validation === FALSE) {
			$this->session->set_flashdata("register_errors", $validation);
			redirect("register");
		} else {
			$this->user->user_register();
			redirect("login");
		}
	}

	public function validate_login() {

		$validation = $this->user->validate_login();

		if (!empty($validation)) {
			$this->session->set_flashdata("login_errors", $validation);
			redirect("login");
		} else {
			$current_user = $this->user->user_login();
			if ($current_user) {
				$this->session->set_userdata("current_user", $current_user);
				redirect(base_url("users"));
			} else {
				redirect(base_url("login"));
			}
		}
	}

	public function is_logged() {

		$current_user = $this->session->userdata("current_user");
		if (!$current_user) {
			redirect(base_url("login"));
		} else {
			redirect("dashboard");
		}
	}

	public function logout() {
		$this->session->unset_userdata("current_user");
		redirect(base_url("login"));
	}
}
