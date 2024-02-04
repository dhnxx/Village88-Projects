<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header") ?>

<body>
    <a href="<?php echo base_url("contacts") ?>">Go back</a>
    <a href="<?php echo base_url("contacts/edit/{$id}")?>">Edit</a>
    <h1>Contact<?php echo (" #{$id}") ?></h1>
    <p>Name: <?php echo $name ?></p>
    <p>Contact Number <?php echo $contact_number ?></p>
</body>