<?php defined('BASEPATH') or exit('No direct script access allowed');

?>

<?php $this->load->view("partials/header.php"); ?>


<body>
    <div class="container">
        <div class="signup">
            <h2>Sign up</h2>
            <form action="<?php echo base_url('Main/register') ?>" method="post">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email">
                <?php echo form_error('email', '<p class="error">', '</p>') ?>
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name">
                <?php echo form_error('first_name', '<p class="error">', '</p>') ?>
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name">
                <?php echo form_error('last_name', '<p class="error">', '</p>') ?>
                <label for="contact_number">Contact Number:</label>
                <input type="text" name="contact_number" id="contact_number">
                <?php echo form_error('contact_number', '<p class="error">', '</p>') ?>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <?php echo form_error('password', '<p class="error">', '</p>') ?>
                <label for="confirm_pw">Confirm Password</label>
                <input type="password" name="confirm_pw" id="confirm_pw">
                <?php echo form_error('confirm_pw', '<p class="error">', '</p>') ?>
                <input type="submit" value="Sign up">
            </form>
        </div>

        <div class="login">
            <h2>Login</h2>
            <form action="<?php echo base_url("Main/login") ?>" method="post">
                <label for="contact_number_email">Contact Number/Email</label>
                <input type="text" name="contact_number_email" id="contact_number_email">
                <?php echo form_error('contact_number_email', '<p class="error">', '</p>') ?>
                <label for="password">Password</label>
                <input type="password" name="login_password" id="password">
                <?php echo form_error('login_password', '<p class="error">', '</p>') ?>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>