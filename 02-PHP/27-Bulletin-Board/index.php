<?php

session_start();
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
    <div>
        <form action="process.php" method="post">
            <h1>Bulletin Board Entry</h1>
            <label for="subjects">Subjects:</label>
            <input type="text" name="subjects" id="subjects">
            <label for="details">Details:</label>
            <textarea name="details" id="details" cols="30" rows="10"></textarea>
            <input type="submit" value="Add" class="submit" name="add">
            <input type="submit" value="Skip" class="submit-alt" name="skip">
        </form>
    </div>
</body>

</html>