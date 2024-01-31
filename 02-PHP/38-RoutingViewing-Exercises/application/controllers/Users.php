<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper("form");
        $this->load->library('session');
    }

    public function index() {
        $this->load->view("users/index");
    }

    public function new_user() {
        $this->load->view("users/new");
    }

    public function create() {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $first_name = $this->input->post("first_name");
            $last_name = $this->input->post("last_name");
            $email = $this->input->post("email");

            echo "<p>$first_name</p>";
            echo "<p>$last_name</p>";
            echo "<p>$email</p>";

            $this->load->view("users/create");
        } else {
            redirect("users/index");
        }
    }

    public function count() {
        $visited = $this->session->userdata('visited');
        if ($visited === false) {
            $visited = 1;
        } else {
            $visited++;
        }
        $this->session->set_userdata('visited', $visited);
        echo $visited;
        $this->load->view("users/count");
    }

    public function reset() {
        $this->session->unset_userdata('visited');
        echo "SITE VISIT COUNT RESET";
        $this->load->view("users/reset");
    }

    public function say($input, $rep) {

        $word = array("message" => $input, "reps" => $rep);
        $this->load->view("users/say", $word);
    }

    public function mprep() {
        $view_data = array(
            'name' => "Michael Choi",
            'age'  => 40,
            'location' => "Seattle, WA",
            'hobbies' => array("Basketball", "Soccer", "Coding", "Teaching", "Kdramas")
        );
        $this->load->view('users/mprep', $view_data);
    }
}
