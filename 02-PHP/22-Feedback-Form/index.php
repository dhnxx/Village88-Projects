<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section>

        <form action="result.php" method="POST">
            <h1>Feedback Form</h1>
            <label for="user_name">Your name (optional)</label>
            <input type="text" name="user_name" id="user_name">
            <label for="course_title">Course Title:</label>
            <select name="course_title" id="course_title">
                <option value="Web Fundamentals">Web Fundamentals</option>
                <option value="PHP Track">PHP Track</option>
                <option value="JS Track">JS Track</option>
            </select>
            <label for="given_score">Given Score:</label>
            <select name="given_score" id="given_score">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <label for="user_reason">Reason:</label>
            <input type="text" name="user_reason" id="user_reason">
            <input id="submit" type="submit" value="Submit">
        </form>
    </section>

</body>

</html>