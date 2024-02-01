<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//* Create currency session variable if not set
		if (!$this->session->has_userdata('currency')) {
			$this->session->set_userdata('currency', 500);
		}
		//* Create chances session variable if not set
		if (!$this->session->has_userdata('chances')) {
			$this->session->set_userdata('chances', 10);
		}
		//* Create messages session variable if not set
		if (!$this->session->has_userdata('messages')) {
			$this->session->set_userdata('messages', array());
		}
	}

	public function index() {
		//* Set values for multiple risks
		$risks = array(
			array("name" => "Low Risk", "value" => array(-25, 100), "description" => "by -25 up to 100"),
			array("name" => "Moderate Risk", "value" => array(-100, 1000), "description" => "by -100 up to 1000"),
			array("name" => "High Risk", "value" => array(-500, 2500), "description" => "by -500 up to 2500"),
			array("name" => "Severe Risk", "value" => array(-3000, 5000), "description" => "by -3000 up to 5000"),
		);
		//* Pass the set values to the data
		$data = array("risks" => $risks);

		//* Reset game if "Reset Game" button is clicked
		if ($this->input->post('reset')) {
			$this->session->set_userdata('currency', 500);
			$this->session->set_userdata('messages', array());
			$this->session->set_userdata('chances', 10);
		}

		//* Check if chances are still available
		$chances = $this->session->userdata('chances');
		if ($chances > 0 && $this->input->post('value')) {
			$bet_name = $this->input->post("name");
			$initial_currency = $this->session->userdata('currency');
			$initial_currency = $this->randomize_update_currency($this->input->post("value"), $initial_currency);
			$message = $this->generate_message($initial_currency, $bet_name);
			$this->session->set_userdata('currency', $initial_currency);
			$this->add_message_to_session($message);
			$this->session->set_userdata('chances', $chances - 1);
		}

		//* Load the view and pass the data
		$this->load->view('main', $data);
	}

	public function randomize_update_currency($risk_value, $current_money) {
		//* Randomize from the selected risk values 
		return $current_money + rand($risk_value[0], $risk_value[1]);
	}

	public function generate_message($initial_currency, $bet_name) {
		$chances = $this->session->userdata('chances');
		$updated_currency = $this->session->userdata('currency');
		$date = date('m/d/Y g:i A');
		$value = $initial_currency - $updated_currency;

		if ($updated_currency < $initial_currency) {
			$message = "[{$date}] You pushed {$bet_name}. Value is {$value}. Your current money now is $updated_currency with $chances chances left";
			$color = "green";
		} else {
			$message = "[{$date}] You pushed {$bet_name}. Value is {$value} Your current money now is $updated_currency with $chances chances left";
			$color = "red";
		}

		return array(
			"message" => $message,
			"color" => $color
		);
	}


	private function add_message_to_session($message) {
		//* Get existing messages from session
		$messages = $this->session->userdata('messages');
		$messages[] = $message;
		$this->session->set_userdata('messages', $messages);
	}
}
