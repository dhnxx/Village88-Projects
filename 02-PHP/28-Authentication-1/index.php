<?php
require("process.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication-1</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v5">
</head>

<body>

    <form class="multiple-forms" action="process.php" method="post">
        <h1>Register</h1>
        <?php if (isset($_SESSION["messages-register"])) { ?>
            <div class="message <?= $_SESSION["messages-register"]["color"] ?>">
                <?php foreach ($_SESSION["messages-register"]["message"] as $message) { ?>
                    <p><?= $message ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        <label for="fname">Email:</label>
        <input type="text" name="Email" id="email">
        <label for=" fname">First Name:</label>
        <input type="text" name="First Name" id="fname">
        <label for="lname">Last Name:</label>
        <input type="text" name="Last Name" id="lname">
        <label for="contact_number">Contact Number:</label>
        <input type="text" name="Contact Number" id="contact_number">
        <label for=" password">Password:</label>
        <input type="password" name="Password" id="password">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="Confirm Password" id="confirm_password">
        <input type="submit" value="Register" name="register" class="submit">

    </form>

    <form class="multiple-forms" action="process.php" method="post">
        <h1>Login</h1>
        <?php if (isset($_SESSION["messages-login"])) { ?>
            <div class="message <?= $_SESSION["messages-login"]["color"] ?>">
                <?php foreach ($_SESSION["messages-login"]["message"] as $message) { ?>
                    <p><?= $message ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        <label for="email">Email:</label>
        <input type="text" name="Email" id="email">
        <label for="password">Password:</label>
        <input type="password" name="Password" id="password">
        <input type="submit" value="Login" name="login" class="submit">
        <input type="submit" value="Reset Password" name="reset" class="submit-alt">
    </form>

</body>

</html>