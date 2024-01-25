<?php


require_once("new-connection.php");
require("process.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v7">
</head>

<body>
    <form action="process.php" method="post" class="view">
        <h1>Bulletin Board View</h1>
        <div class="container">
            <?php foreach ($board_list as $row) { ?>
                <div class="bulletin-list" style="background-color: <?= $random_color[rand(0, count($random_color) - 1)] ?>">
                    <?php $convert = strtotime($row["created_at"]);
                    $date = date("m/d/Y", $convert); ?>
                    <h2><?= "{$date} - {$row["subjects"]} " ?></h2>
                    <p><?= "{$row["details"]}" ?></p>
                </div>

            <?php } ?>
        </div>
        <form action="process.php" method="post">
            <input type="submit" value="Add more" name="add_more" class="button-only submit">
        </form>
    </form>

</body>

</html>