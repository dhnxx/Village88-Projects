<?php

class User extends CI_Model {

    public function __construct() {

        parent::__construct();

        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    }

    public function user_login() {
        $email = $this->security->xss_clean($this->input->post("email"));
        $password = md5($this->security->xss_clean($this->input->post("password"))); 

        $query = "SELECT id FROM Users WHERE email_address = ? AND password = ?";
        $values = array($email, $password);
        $user = $this->db->query($query, $values)->row_array();

        if ($user) {
            return $user;
        } else {
            return NULL; 
        }
    }

    public function user_register() {

        $query = "INSERT INTO Users (first_name, last_name, email_address, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";

        $first_name = $this->security->xss_clean($this->input->post("first_name"));
        $last_name = $this->security->xss_clean($this->input->post("last_name"));
        $email_address = $this->security->xss_clean($this->input->post("email"));
        $password = $this->security->xss_clean($this->input->post("password"));
        $values = array($first_name, $last_name, $email_address, md5($password), date("Y-m-d h:i:s"), date("Y-m-d h:i:s"));
        return $this->db->query($query, $values);
    }

    public function get_edit_profile($id) {
        $query = "SELECT email_address, first_name, last_name FROM Users WHERE id = {$id}";

        return $this->db->query($query)->row_array();
    }

    public function update_edit_profile($id) {

        $query = "UPDATE Users SET email_address = ?, first_name = ?, last_name = ? WHERE id = {$id}";

        $values = array($this->security->xss_clean($this->input->post("email")), $this->security->xss_clean($this->input->post("first_name")), $this->security->xss_clean(($this->input->post("last_name"))));

        return $this->db->query($query, $values);
    }

    public function change_password($id) {
        // Retrieve the current password
        $query = "SELECT password FROM Users WHERE id = ?";
        $old_password_row = $this->db->query($query, array($id))->row_array();
        $stored_password = $old_password_row['password'];

        // Hash the input old password
        $old_password_input = $this->input->post("old_password");
        $old_password_hashed = md5($old_password_input);

        // Compare the input old password hash with the stored password hash
        if (trim($old_password_hashed) !== $stored_password) {
            // Passwords don't match
            return array("old_password" => "The current password doesn't match");
        } else {
            // Passwords match, update the password
            $new_password_input = $this->input->post("new_password");
            $new_password_hashed = md5($new_password_input);

            $update_query = "UPDATE users SET password = ? WHERE id = ?";
            $this->db->query($update_query, array($new_password_hashed, $id));

            return NULL; // No errors
        }
    }

    public function validate_edit_profile() {
        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');

        // Run form validation
        if ($this->form_validation->run() === FALSE) {
            // If validation fails, build an array of errors
            $errors = array();
            $errors["email"] = form_error("email");
            $errors["first_name"] = form_error("first_name");
            $errors["last_name"] = form_error("last_name");

            // Return the array of errors
            return $errors;
        } else {
            // If validation passes, return NULL (no errors)
            return NULL;
        }
    }


    public function validate_change_password() {
        // Validate if the new password and confirm password are the same 
        $this->form_validation->set_rules("old_password", "Old Password", "required");
        $this->form_validation->set_rules("new_password", "New Password", "required");
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|matches[new_password]");

        if ($this->form_validation->run() === FALSE) {
            // Validation failed, return errors
            $errors = array(
                "old_password" => form_error("old_password"),
                "new_password" => form_error("new_password"),
                "confirm_password" => form_error("confirm_password")
            );
            return $errors;
        } else {
            // Validation successful, return NULL (no errors)
            return NULL;
        }
    }

    public function validate_register() {

        $this->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->form_validation->set_rules("first_name", "First Name", "required");
        $this->form_validation->set_rules("last_name", "Last Name", "required");
        $this->form_validation->set_rules("password", "Password", "required|min_length[8]");
        $this->form_validation->set_rules("confirm_password", "Password", "required|matches[password]");

        if ($this->form_validation->run() === FALSE) {

            $errors = array("email" => form_error("email"), "first_name" => form_error("first_name"), "last_name" => form_error("last_name"), "password" => form_error("password"), "confirm_password" => form_error("confirm_password"));

            return $errors;
        }
    }

    public function validate_login() {

        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("password", "Password", "required");

        if ($this->form_validation->run() === FALSE) {

            $errors = array("email" => form_error("email"), "password" => form_error("password"));
            return $errors;
        } else {
            return NULL; 
        }
    }
}
