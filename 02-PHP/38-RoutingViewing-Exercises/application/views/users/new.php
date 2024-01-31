<?php
$this->load->view("partials/header");


echo form_open(site_url("users/create"), array("method" => "post"));

echo form_label("First name: ", "first_name");
echo form_input(array("name" => "first_name", "type" => "text"));

echo form_label("Last name: ", "last_name");
echo form_input(array("name" => "last_name", "type" => "text"));

echo form_label("Email: ", "email");
echo form_input(array("name" => "email", "type" => "email"));

echo form_submit(array("value" => "submit"));
echo form_close();
