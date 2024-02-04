<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>

<a href="<?php echo base_url("main") ?>">logout</a>

<body>
    <h2>Basic Information</h2>
    <p>First Name: <?php echo "$result[first_name]" ?></p>
    <p>Last Name: <?php echo "$result[last_name]" ?></p>
    <p>Contact Number: <?php echo "$result[contact_number]" ?></p>
</body>