<?php


class Review extends CI_Model {

    public function __construct() {

        parent::__construct();

        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    }

    public function get_reviews($id) {

        $query = "SELECT  reviews.id, CONCAT(users.first_name, ' ', users.last_name) AS name, content, reviews.created_at, reviews. updated_at FROM reviews LEFT JOIN users ON reviews.user_id = users.id WHERE product_id = $id;";

        return $this->db->query($query)->result_array();
    }

    public function get_comment($review_id) {

        $query = "SELECT user_id, review_id, CONCAT(users.first_name, ' ', users.last_name) AS name, content, comments.created_at FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE review_id = $review_id";

        return $this->db->query($query)->result_array();
    }

    public function add_review($product_id) {

        $query = "INSERT INTO reviews (user_id, product_id, content, created_at, updated_at) VALUES (?,?,?,?,?)";

        $user_id = $this->security->xss_clean($this->session->userdata("current_user"));
        $product_id = $this->security->xss_clean($product_id);
        $content = $this->security->xss_clean($this->input->post("content"));

        $values = array($user_id["id"], $product_id, $content, date("Y-m-d h:i:s"),  date("Y-m-d h:i:s"));

        return $this->db->query($query, $values);
    }

    public function add_comment($review_id) {

        $query = "INSERT INTO comments (user_id, review_id, content, created_at, updated_at) VALUES (?,?,?,?,?)";

        $user_id = $this->security->xss_clean($this->session->userdata("current_user"));
        $review_id = $this->security->xss_clean($review_id);
        $content = $this->security->xss_clean($this->input->post("comment"));

        $values = array($user_id["id"], $review_id, $content, date("Y-m-d h:i:s"),  date("Y-m-d h:i:s"));

        return $this->db->query($query, $values);
    }

    public function validate_review() {

        $this->form_validation->set_rules("content", "Content", "required");

        if ($this->form_validation->run() === FALSE) {

            return array("content" => form_error("content"));
        }
    }

    public function validate_comment() {

        $this->form_validation->set_rules("comment", "Comment", "required");

        if ($this->form_validation->run() === FALSE) {

            return array("comment" => form_error("comment"));
        }
    }
}
