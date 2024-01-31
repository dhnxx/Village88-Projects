<body>

    <?php $this->load->view('partials/header') ?>
    <h1><?php echo $count; ?></h1>
    <?php
    for ($x = 0; $x < $count; $x += 5) {
        for ($i = 1; $i <= 5; $i++) {
            if (($x + $i) > $count) { 
                break; 
            }
    ?>
            <img src="<?php echo $ninja . $i; ?>" alt="">
    <?php }
    }
    ?>

</body>