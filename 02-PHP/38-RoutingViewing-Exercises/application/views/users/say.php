<?php if (is_numeric($reps)) {
    for ($i = 0; $i < $reps; $i++) { ?>
        <h1><?php echo $message ?></h1>
    <?php }
} else { ?>
    <h1><?php echo "Sorry. This url does not meet our requirement." ?></h1>
<?php } ?>