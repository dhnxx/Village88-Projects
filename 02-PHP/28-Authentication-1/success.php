<?php
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
    <link rel="stylesheet" href="style.css?v5">
</head>

<body>

    <form action="process.php" method="post">
        <h1>Hello <?= isset($_SESSION["logged_user"]) ? $_SESSION["logged_user"]["first_name"] : "" ?></h1>
        <input class="submit" type="submit" name="logout" value="Logout">
    </form>

</body>

</html>