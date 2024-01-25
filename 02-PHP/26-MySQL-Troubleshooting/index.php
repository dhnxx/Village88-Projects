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
    <title>Raffle Entry</title>
</head>

<body>
    <main>
        <form action="process.php" method="POST">
            <label for="number">Enter your contact number</label>
            <input type="text" name="number" id="number">
            <input type="submit" name="submit" value="Save number" class="submit">
        </form>

    </main>
</body>

</html>