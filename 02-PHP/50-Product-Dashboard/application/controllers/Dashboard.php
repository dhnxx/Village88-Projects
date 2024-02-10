<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    /* 
    * Display the dashboard, where admin has extra features
    */
    public function index() {
        $this->is_logged();
        $data["current_user"] = $this->session->userdata("current_user");
        $data["products"] = $this->product->get_product();
        $this->load->view("dashboard/dashboard", $data);
    }

    public function admin_dashboard() {
        $this->load->view("dashboard/dashboard");
    }

    public function user_dashboard() {
        $this->load->view("dashboard/dashboard");
    }

    public function is_logged() {

        $current_user = $this->session->userdata("current_user");
        if (!$current_user) {
            redirect("login");
        }
    }
}
