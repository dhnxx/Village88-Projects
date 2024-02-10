<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view("partials/header.php"); ?>

<body>
    <div class="wrapper">
        <h2>Manage Product</h2>
        <?= form_open(base_url("products/new"), "method=post") ?>
        <input type="submit" value="Add new">
        <?= form_close() ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Inventory Count</th>
                <th>Quantity Sold</th>
                <?php if ($current_user["id"] == "1") { ?>
                    <th>Action</th>
                <?php } ?>
            </tr>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?= $product["id"] ?></td>
                    <td><a href="products/show/<?= $product["id"] ?>"><?= $product["name"] ?></a></td>
                    <td><?= $product["count"] ?></td>
                    <td><?= $product["sold"] ?></td>
                    <?php if ($current_user["id"] == "1") { ?>
                        <td>
                            <a href="<?= base_url("products/edit/{$product["id"]}") ?>" class="edit-link">Edit</a>
                            <a href="<?= base_url("products/delete/{$product["id"]}") ?>" onclick="return confirmDelete()">Remove</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this product?');
        }
    </script>
</body>