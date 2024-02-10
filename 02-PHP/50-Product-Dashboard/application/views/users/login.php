<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>


<body>
    <div class="wrapper">
        <h2>Login</h2>
        <?= form_open(base_url("users/validate_login"), "method=post") ?>
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email">
        <?php if (isset($errors["email"])) echo $errors["email"]; ?>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <?php if (isset($errors["password"])) echo $errors["password"]; ?>
        <input type="submit" value="Login">
        <?= form_close() ?>
        <a href="<?= base_url("register") ?> ">Don't have an account? Login</a>
    </div>
</body>