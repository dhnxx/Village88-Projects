<ul>
    <?php foreach ($orders as $order) { ?>
        <li>
            <form action="<?= base_url("main/delete_order") ?>" method="post" class="delete-order">
            <input type="hidden" name="id" value ="<?= $order["id"] ?>">
            <input type="image" src="<?= base_url("assets/images/close.png") ?>" >
            </form>
            <h2>#<?= $order["id"] ?></h2>
            <form action="<?= base_url("main/edit_order") ?>" method="post" class="edit-order">
                <input type="hidden" name="id" value ="<?= $order["id"] ?>">
                <p><?php echo (!empty($order["content"])) ? $order["content"] : "Empty" ?></p>
            </form>
        </li>
    <?php } ?>
</ul>