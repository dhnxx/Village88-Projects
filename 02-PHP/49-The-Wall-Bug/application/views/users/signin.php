<div class="error"><?= $this->session->flashdata('input_errors'); ?></div>

<h1>Login</h1>
<?php echo form_open('signin/validate'); ?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
Email address: <input type=" text" name="email">
Password: <input type="password" name="password">
<input type="submit" value="Signin">
<a href="<?="register"?>">Don't have an account? Register</a>
<?= form_close() ?>


</body>

</html>