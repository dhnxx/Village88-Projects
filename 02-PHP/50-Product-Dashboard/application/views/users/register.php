<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>

<body>
    <h2>Register</h2>
    <?= form_open(base_url("users/validate_register"), "method=post") ?>
    <label for="email">Email Address</label>
    <input type="text" name="email" id="email">
    <?php if (isset($errors["email"])) echo $errors["email"]; ?>
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name">
    <?php if (isset($errors["first_name"])) echo $errors["first_name"]; ?>
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name">
    <?php if (isset($errors["last_name"])) echo $errors["last_name"]; ?>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <?php if (isset($errors["password"])) echo $errors["password"]; ?>
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password">
    <?php if (isset($errors["confirm_password"])) echo $errors["confirm_password"]; ?>
    <input type="submit" value="Register">
    <?= form_close() ?>
    <a href="<?= base_url("login") ?> ">Don't have an account? Login</a>
</body>