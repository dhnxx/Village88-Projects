<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>


<body>
    <h1>test</h1>

    <?= form_open("/", "method=post") ?>
    <input type="text">
    <input type="submit" value="">
    <? form_close() ?>
</body>