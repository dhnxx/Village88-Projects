<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>

<body>
    <div class="wrapper">
        <h2>Add a new product</h2>
        <?= form_open(base_url("dashboard"), "method=post") ?>
        <input type="submit" value="Return to Dashboard">
        <?= form_close() ?>
        <?= form_open(base_url("products/validate_new_product"), "method=post") ?>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <?php if (isset($errors["name"])) echo $errors["name"] ?>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <?php if (isset($errors["description"])) echo $errors["description"] ?>
        <label for="price">Price</label>
        <input type="text" name="price" id="price">
        <?php if (isset($errors["price"])) echo $errors["price"] ?>
        <label for="count">Inventory Count</label>
        <input type="number" name="count" id="count">
        <?php if (isset($errors["count"])) echo $errors["count"] ?>
        <label for="sold">Quantity Sold:</label>
        <input type="number" id="sold" name="sold">
        <?php if (isset($errors["count"])) echo $errors["sold"] ?>
        <input type="submit" value="Create">

        <?= form_close() ?>
    </div>
</body>