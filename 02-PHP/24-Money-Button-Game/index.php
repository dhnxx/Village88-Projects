<?php
session_start();
$datetime = date("m/d/Y h:i:sa");
if (!isset($_SESSION["Currency"])) {
    $_SESSION["Currency"] = 500;
}
if (!isset($_SESSION["Logs"])) {
    $_SESSION["Logs"] = array(
        array(
            "message" => "{$datetime} - Game Started",
            "color" => "white"
        )
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css?v=2">
    <title>Money Button</title>

</head>

<body>
    <header>
        <h1>Your money: $<?= $_SESSION["Currency"] ?> </h1>
        <form action="process.php" method="post">
            <input type="submit" name="reset" id="reset" value="Reset Game">
        </form>
    </header>
    <main>
        <section class="bet-options">
            <div class="low-risk" id="low">
                <h2>Low Risk</h2>
                <form action="process.php" method="post">
                    <input type="hidden" name="risk-level" value=0>
                    <p>by -25 up to 100</p>
                    <img src="img/Ace_of_spades.svg.png" alt="">
                    <input type="submit" value="BET">
                </form>


            </div>
            <div class="moderate-risk" id="moderate">
                <h2>Moderate Risk</h2>
                <form action="process.php" method="post">
                    <input type="hidden" name="risk-level" value=1>
                    <p>by -100 up to 1000</p>
                    <img src="img/Jack_of_spades2.svg.png" alt="">
                    <input type="submit" value="BET">
                </form>

            </div>
            <div class="high-risk" id="high">
                <h2>High Risk</h2>
                <form action="process.php" method="post">
                    <input type="hidden" name="risk-level" value=2>
                    <p>by -500 up to 2500</p>
                    <img src="img/English_pattern_queen_of_hearts.svg.png" alt="">
                    <input type="submit" value="BET">
                </form>

            </div>
            <div class="severe-risk" id="severe">
                <h2>Severe Risk</h2>
                <form action="process.php" method="post">
                    <input type="hidden" name="risk-level" value=3>
                    <p>by -3000 up to 5000</p>
                    <img src="img/download.png" alt="">
                    <input type="submit" value="BET">
                </form>
            </div>
        </section>
        <section class="game-host-message">
            <h3>Game Host:</h3>
            <div class="message">
                <?php foreach ($_SESSION["Logs"] as $logs) {
                ?>
                    <p style="color: <?= $logs["color"] ?>"><?= $logs["message"] ?></p>
                <?php } ?>
            </div>
        </section>
    </main>
</body>

</html>