<?php

class reviews extends CI_Controller {

    public function validate_add_review($product_id) {

        $validations = $this->review->validate_review();

        if ($validations) {
            $this->session->set_flashdata("review_errors", $validations);
            redirect(base_url("products/show/{$product_id}"));
        } else {
            $this->review->add_review($product_id);
            redirect(base_url("products/show/{$product_id}"));
        }
    }

    public function validate_add_comment($review_id, $product_id) {

        $validations[$review_id] = $this->review->validate_comment();

        if ($validations[$review_id]) {
            $this->session->set_flashdata("comment_error", $validations);
            redirect(base_url("products/show/{$product_id}"));
        } else {
            $this->review->add_comment($review_id);
            redirect(base_url("products/show/{$product_id}"));
        }
    }
}
