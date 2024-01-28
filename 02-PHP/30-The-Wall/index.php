<?php

require_once("new-connection.php")

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Register</h1>
    <form action="process.php" method="post">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname">
        <label for="pw">Password</label>
        <input type="password" name="pw" id="pw">
        <label for="confirmpw">Confirm Password</label>
        <input type="password" name="confirmpw" id="confirmpw">
        <input type="submit" value="Register">
    </form>

    <h1>Login</h1>
    <form action="process.php" method="post">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="pw">Password</label>
        <input type="password" name="pw" id="pw">
        <input type="submit" value="Login">
    </form>
</body>

</html>