<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>

<body>
    <div class="wrapper">
        <h2><?= $product["name"] . " $" . $product["price"] ?> </h2>
        <p>Added since: <?= $product["created_at"] ?></p>
        <p>Product ID #<?= $product["id"] ?></p>
        <p>Description: <?= $product["description"] ?></p>
        <p>Total sold: <?= $product["sold"] ?></p>
        <p>Number of available stocks: <?= $product["count"] ?></p>
        <?= form_open(base_url("reviews/validate_add_review/{$product["id"]}"), "method=post") ?>
        <h3>Leave a Review</h3>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <?php if (isset($errors["content"])) {
            echo $errors["content"];
        } ?>
        <input type="submit" value="Post">
        <?= form_close() ?>
        <?php foreach ($reviews as $review) { ?>
            <div class="reviews">
                <h4><?= $review["name"] . " wrote" ?>:</h4>
                <p><?= date("M d, Y", strtotime($review["created_at"])) ?></p>
                <p><?= $review["content"] ?></p>
                <?php foreach ($comments[$review["id"]] as $comment) { ?>
                    <div class="comments">
                        <h4><?= $comment["name"] . " replied:" ?></h4>
                        <p><?= date("M d, Y", strtotime($comment["created_at"])) ?></p>
                        <p><?= $comment["content"] ?></p>
                    </div>
                <?php } ?>
                <?= form_open(base_url("reviews/validate_add_comment/{$review["id"]}/{$product["id"]}"), array("method" => "post", "class" => "comments")) ?>
                <input type="text" name="comment" id="comment" placeholder="add a comment">
                <?php if (isset($comment_error[$review["id"]]["comment"])) { ?>
                    <?= $comment_error[$review["id"]]["comment"]; ?>
                <?php } ?>
                <input type="submit" value="Post">
                <?= form_close() ?>
            </div>
        <?php } ?>
    </div>
</body>