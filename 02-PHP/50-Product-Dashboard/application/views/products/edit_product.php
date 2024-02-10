<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>

<body>
    <div class="wrapper">
        <h2>Edit Product</h2>
        <?= form_open(base_url("products/validate_edit_product/{$product["id"]}"), "method=post") ?>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $product["name"] ?>">
        <?php if (isset($errors['name'])) { ?>
            <span class="error"><?= $errors['name'] ?></span>
        <?php } ?>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= $product["description"] ?></textarea>
        <?php if (isset($errors['description'])) { ?>
            <span class="error"><?= $errors['description'] ?></span>
        <?php } ?>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?= $product["price"] ?>">
        <?php if (isset($errors['price'])) { ?>
            <span class="error"><?= $errors['price'] ?></span>
        <?php } ?>

        <label for="count">Inventory Count:</label>
        <input type="number" id="count" name="count" value="<?= $product["count"] ?>">
        <?php if (isset($errors['count'])) { ?>
            <span class="error"><?= $errors['count'] ?></span>
        <?php } ?>

        <label for="quantity_sold">Quantity Sold:</label>
        <input type="number" id="sold" name="sold" value="<?= $product["sold"] ?>">
        <?php if (isset($errors['sold'])) { ?>
            <span class="error"><?= $errors['sold'] ?></span>
        <?php } ?>

        <input type="submit">
        <?= form_close() ?>
    </div>
</body>