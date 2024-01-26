<?php
require("process.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v5">
</head>

<body>
    <form action="process.php" method="POST">
        <h1>Reset Password</h1>
        <?php if (isset($_SESSION["messages-reset"])) { ?>
            <div class="message <?= $_SESSION["messages-reset"]["color"] ?>">
                <?php foreach ($_SESSION["messages-reset"]["message"] as $message) { ?>
                    <p><?= $message ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        <label for="reset">Enter your contact number</label>
        <input type="text" name="number" id="reset">
        <input class="submit" type="submit" name="reset-button" value="Submit">
        <input class="submit-alt" type="submit" name="reset-back" value="Go back to the main menu">
    </form>
</body>

</html>