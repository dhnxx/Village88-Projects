<div class="error"><?= $this->session->flashdata('input_errors'); ?></div>

<h1>Login</h1>
<form action="<?= base_url("signin/validate") ?>" method="post">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
    <label for="email">Email address:</label> 
    <input type=" text" name="email">
    <label for="password">Password:</label>
    <input type="password" name="password">
    <input type="submit" value="Signin">
    <a href="<?= base_url("register") ?>">Don't have an account? Register</a>
</form>


</body>

</html>