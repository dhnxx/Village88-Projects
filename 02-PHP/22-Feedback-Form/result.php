<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v2">
    <title>Submitted Entry</title>
</head>

<body>
    <section class="submitted-form-entry">
        <h1>Submitted Entry</h1>
        <p> Your Name (optional): <?= $_POST["user_name"] ?> </p>
        <P>Course Title: <?= $_POST["course_title"] ?> </P>
        <p>Given Score: <?= $_POST["given_score"] ?> </p>
        <p>Reason: <?= $_POST["user_reason"] ?> </p>

    </section>
</body>

</html>