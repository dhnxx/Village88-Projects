<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Report 🐛</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v4">
</head>

<body>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <h1>Bug Report 🐛</h1>
        <?php if (isset($_SESSION["errors"])) { ?>
            <section class="error-list">
                <?php foreach ($_SESSION["errors"] as $error) { ?>
                    <p class="errors"><?= $error ?></p>
                <?php } ?>
            </section> <?php } ?>
        <label for="date_today">Date Today (mm/dd/yyyy) *</label>
        <input type="text" name="date_today" id="user_name">
        <div>
            <div class="first-name">
                <label for="first_name">First Name *</label>
                <input id="first_name_input" type="text" name="first_name" id="first_name">
            </div>
            <div class="last-name">
                <label id="last_name_label" for="last_name">Last Name *</label>
                <input id="last_name_input" type="text" name="last_name" id="last_name">
            </div>
        </div>
        <label for="email_address">Email *</label>
        <input type="text" name="email_address" id="email_address">
        <label for="issue_title">Issue Title *</label>
        <input type="text" name="issue_title" id="issue_title">
        <label for="issue_details">Issue Details *</label>
        <input type="text" name="issue_details" id="issue_details">
        <label for="screenshot">Screenshot (optional)</label>
        <input type="file" name="screenshot" id="screenshot">
        <input id="submit" type="submit" value="Submit" name="submit">
    </form>
</body>

</html>