<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Countdown extends CI_Controller {

	public function main() {
		date_default_timezone_set('Asia/Manila');

		$now = new DateTime();

		$future_date = clone $now;
		$future_date->setTime(23, 59, 59);

		$interval = $future_date->diff($now);
		//* Hours to Seconds 
		$hrs_to_sec =  ($interval->h) * 3600;
		//* Mins to Seconds 
		$min_to_sec =  (($interval->i) * 60);
		$sec  = $interval->s;
		$total_seconds = $hrs_to_sec + $min_to_sec + $sec;

		$dates = array("main" => $interval, "total_sec" => $total_seconds, "now" => $now);

		$this->load->view("Main", $dates);
	}
}
