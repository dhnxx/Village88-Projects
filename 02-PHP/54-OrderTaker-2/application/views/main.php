<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view("partials/header.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $.get("<?= base_url('orders/fetch'); ?>", function(res) {
            $(".order-queue").html(res);
        });

        $(document).on("submit", "form", function() {
            $.post($(this).attr("action"), $(this).serialize(), function(res) {
                $(".order-queue").html(res);
            });
            return false;
        });

        $(document).on("click", ".edit-order p", function() {
            let text = $(this).text();
            let id = $(this).siblings('input[name="id"]').val(); //* Get the value of the hidden input field with name "id"
            $(this).replaceWith('<input type="text" name="content" id="content" value="' + text + '">');
            $(".edit-order").append('<input type="hidden" name="id" value="' + id + '">');
        });

        $(document).on("blur", ".edit-order #content", function() {
            $.post("<?= base_url("main/edit_order") ?>", $(this).closest("form").serialize(), function(res) {
                $(".order-queue").html(res);
            });
            return false;
        });
    });
</script>


<body>
    <div class="header">
        <h1>Order Queue</h1>
    </div>

    <div class="order-queue"></div>

    <form action="<?= base_url("main/new_order") ?>" method="POST" class="new-order">
        <label for="content">New Order:</label>
        <input type="text" name="content" id="content">
        <input type="submit" value="Submit">
    </form>

</body>