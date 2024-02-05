<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>

<body>
    <header>
        <h1>My Store</h1>
        <a href="<?php echo base_url("Store") ?> ">Catalog</a>
    </header>

    <?php if ($cart) { ?>

        <div class="title-info">
            <h2>Check out</h2>
            <?php
            $price = 0;
            foreach ($cart as  $item) {
                $price += $item["price"];
            } ?>
            <p>Total: <?php echo html_escape("$ {$price}") ?></p>
        </div>

        <table>
            <tr>
                <th>Item name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php foreach ($cart as $index => $item) { ?>
                <tr>
                    <td><?php echo $item["name"] ?></td>
                    <td><?php echo $item["quantity"] ?></td>
                    <td><?php echo "$ {$item["price"]}" ?></td>
                    <td><a href="<?php echo base_url("Store/delete_item/{$index}") ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>

        <div class="billing">
            <h2>Billing Info</h2>
            <form action="<?php echo base_url("Store/success")?>" method="post">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
                <label for="address">Address</label>
                <input type="text" name="address" id="address">
                <label for="card_number">Card Number</label>
                <input type="text" name="card_number" id="card_number">
                <input type="submit" value="Submit Order">
            </form>
        </div>
    <?php } else { ?>
        <h1>Your cart is empty</h1>
    <?php  } ?>
</body>