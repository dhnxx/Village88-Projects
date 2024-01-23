<?php

$SESSION_START();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Button</title>
</head>

<body>
    <header>
        <h1>Your money: 500</h1>
        <form action="process.php">
            <input type="submit" name="reset" value="Reset Game">
        </form>
    </header>
    <main>
        <section class="bet-options">
            <div class="low-risk">
                <h2>Risk</h2>
                <form action="">
                    <input type="hidden" name="">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="moderate-risk">
                <h2>Risk</h2>
                <form action="">
                    <input type="hidden" name="">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="high-risk">
                <h2>Risk</h2>
                <form action="">
                    <input type="hidden" name="">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="severe-risk">
                <h2>Risk</h2>
                <form action="">
                    <input type="hidden" name="">
                    <input type="submit" value="">
                </form>
            </div>
        </section>
    </main>
<section class="game-host-message">
    <h3>Game Host:</h3>
    <div class="message">
        
    </div>
</section>
</body>

</html>