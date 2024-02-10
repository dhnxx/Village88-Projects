<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller {

    public function new_product() {

        $data = array();
        if ($this->session->flashdata("new_product_error")) {
            $data["errors"] = $this->session->flashdata("new_product_error");
        }

        $this->load->view("products/add_product", $data);
    }

    public function edit_product($id) {

        $data = array();
        if ($this->session->flashdata("edit_product_error")) {
            $data["errors"] = $this->session->flashdata("edit_product_error");
        }

        $data["product"] = $this->product->get_product_by_id($id);

        $this->load->view("products/edit_product", $data);
    }

    public function show_product($product_id) {

        $data["errors"] = $this->session->flashdata("review_errors");
        $data["product"] = $this->product->get_product_by_id($product_id);
        $data["product"]["created_at"] = date("M d, Y", strtotime($data["product"]["created_at"]));
        $data["reviews"] = $this->review->get_reviews($product_id);
        $data["comment_error"] =
            $this->session->flashdata("comment_error");

        foreach ($data["reviews"] as $review) {
            $data["comments"][$review["id"]] = $this->review->get_comment($review["id"]);
        }



        $this->load->view("products/show_product", $data);
    }

    public function delete_product($id) {
        $this->product->delete_product($id);
        redirect("dashboard");
    }


    public function validate_new_product() {

        $validation = $this->product->validate_insert_product();
        if ($validation === FALSE) {
            $this->session->set_flashdata("new_product_error", $validation);
            redirect("products/new");
        } else {
            $this->product->insert_product();
            redirect("dashboard");
        }
    }

    public function validate_edit_product($id) {

        $validation = $this->product->validate_update_product();

        if (!empty($validation)) {
            $this->session->set_flashdata("edit_product_error", $validation);
            redirect("products/edit/$id");
        } else {
            $this->product->update_product($id);
            redirect("dashboard");
        }
    }
}
