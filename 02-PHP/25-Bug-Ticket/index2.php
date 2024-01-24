<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Thank you!</title>
</head>

<body>
    <form action="process.php" method="POST">
        <h1>Bug Report 🐛</h1>
        <p>Thank you for your patience! Please wait for a response from our IT team.</p>
        <input id="submit" type="submit" value="Resubmit" name="resubmit">
    </form>
</body>

</html>