<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Button 2</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/main.css?v3") ?>">
</head>

<body>
    <header>
        <h1>Your Money: <?= $this->session->userdata("currency") ?></h1>
        <p>Chances Left: <?= $this->session->userdata("chances") ?></p>
        <?= form_open("main/index", array("method" => "post",)); ?>
        <?= form_submit(array("value" => "Reset Game", "name" => "reset", "class" => "submit")); ?>
        <?= form_close(); ?>
    </header>

    <main>
        <div class="wrapper">
            <?php //* Change data between predefined elements
            foreach ($risks as $risk) {
                $data = array(
                    "name" => $risk["name"],
                    "value" => $risk["value"],
                    "description" => $risk["description"]
                );
                $this->load->view("partials/risk-level", $data);
            } ?>
        </div>
    </main>

    <footer>
        <h3>Game Host:</h3>
        <section class="messages">
            <?php if ($this->session->has_userdata("messages")) {
                foreach ($this->session->userdata("messages") as $message) { ?>
                    <p style="color: <?= $message['color'] ?>"><?= $message['message'] ?></p>
            <?php }
            } ?>
        </section>
    </footer>
</body>

</html>