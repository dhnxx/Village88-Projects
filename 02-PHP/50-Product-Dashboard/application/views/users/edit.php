<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>

<body>
    <div class="wrapper">
        <h2>Edit Profile</h2>
        <?= form_open(base_url("users/validate_edit_profile"), "method=post") ?>
        <h3>Edit Information</h3>
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email" value="<?= $information["email_address"] ?>">
        <?php if (isset($information_errors["email"])) : ?>
            <p class="error"><?= $information_errors["email"] ?></p>
        <?php endif; ?>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="<?= $information["first_name"] ?>">
        <?php if (isset($information_errors["first_name"])) : ?>
            <p class="error"><?= $information_errors["first_name"] ?></p>
        <?php endif; ?>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="<?= $information["last_name"] ?>">
        <?php if (isset($information_errors["last_name"])) : ?>
            <p class="error"><?= $information_errors["last_name"] ?></p>
        <?php endif; ?>
        <input type="submit" value="Save">
        <?= form_close() ?>
        <?= form_open(base_url("users/validate_change_password"), "method=post") ?>
        <h3>Change Password</h3>
        <label for="old_password">Old Password</label>
        <input type="password" name="old_password" id="old_password">
        <?php if (isset($password_errors["old_password"])) : ?>
            <p class="error"><?= $password_errors["old_password"] ?></p>
        <?php endif; ?>
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password">
        <?php if (isset($password_errors["new_password"])) : ?>
            <p class="error"><?= $password_errors["new_password"] ?></p>
        <?php endif; ?>
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <?php if (isset($password_errors["confirm_password"])) : ?>
            <p class="error"><?= $password_errors["confirm_password"] ?></p>
        <?php endif; ?>
        <input type="submit" value="Save">
        <?= form_close() ?>
    </div>
</body>