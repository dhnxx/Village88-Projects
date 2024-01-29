<?php require("process.php");
unset($_SESSION["logged"]) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="https://sencss.kilianvalkhof.com/minified/sen.full.min.css?v1">
    <link rel="stylesheet" href="style.css?v8">
</head>

<body>
    <header>
        <h1>Blog post</h1>
    </header>
    <div class="auth">
        <form class="multiple-forms" action="process-auth.php" method="post">
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
            <label for=" password">Password:</label>
            <input type="password" name="Password" id="password">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="Confirm Password" id="confirm_password">
            <input type="submit" value="Register" name="register" class="button">
        </form>
        <form class="multiple-forms" action="process-auth.php" method="post">
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
            <input type="submit" value="Login" name="login" class="button">
        </form>
    </div>
</body>

</html>