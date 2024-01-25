<?php
require_once("new-connection.php");
require("process.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v4">
    <title>Contact List</title>
</head>

<body>
    <header>
        <h1 class="<?= $_SESSION["message"]["class"] ?>"><?= $_SESSION["message"]["text"] ?></h1>
    </header>

    <main>
        <table>
            <tr>
                <th>Contact number</th>
                <th>Date Inserted</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($data as $index => $list) {
            ?>
                <tr>
                    <td>0<?= $list["contact_number"] ?></td>
                    <td><?= ("{$list["date_inserted"]} {$list["time_inserted"]}") ?></td>
                    <form action="process.php" method="POST">
                        <input type="hidden" name="id" value="<?= $list["id"] ?>">
                        <td><input id="delete" value="" name="delete" type=submit alt="delete"></td>
                    </form>
                </tr>
            <?php } ?>

        </table>
        <form class="button-only" action="process.php" method="POST">
            <input class="submit" type="submit" value="Add a number" name="add_number">
        </form>

    </main>

</body>

</html>