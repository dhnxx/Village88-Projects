<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>

<body>
    <header>
        <h1>My Store</h1>
        <a href="<?php echo base_url("Store/catalog") ?> ">Cart <?php echo $count ?> </a>
    </header>
    <main>
        <?php foreach ($products as $index => $product) { ?>
            <div class="container">
                <img src="<?php echo "{$product['image_url']}" ?>" alt="">
                <div class="info">
                    <div class="product-info">
                        <h2><?php echo $product['name'] ?></h2>
                        <p><?php echo "$ {$product['price']}" ?></p>
                    </div>
                    <div class="buy-info">
                        <div class="quantity">
                            <!-- Add CSRF protection -->
                            <?php echo form_open(base_url(html_escape("Store/add_to_cart/{$index}"))); ?>
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="5" value="1">
                            <!-- Include CSRF token -->
                            <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                        </div>
                        <input type="submit" value="Buy">
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main>
</body>