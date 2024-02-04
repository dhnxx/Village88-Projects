<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header") ?>

<body>
    <a href="<?php echo base_url("contacts") ?>">Go back</a>
    <a href="<?php echo base_url("contacts/show/{$id}") ?>">Show</a>
    <h1>Edit Contact<?php echo (" #{$id}") ?></h1>
    <form action="<?php echo base_url("contacts/update/{$id}") ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <?php echo form_error('name', '<div class="error"> <p>', '</p></div>'); ?>
        <label for="contact_number">Contact number:</label>
        <input type="text" name="contact_number" id="contact_number">
        <?php echo form_error('contact_number', '<div class="error"> <p>', '</p></div>'); ?>
        <input type="submit" value="Save">
    </form>
</body>