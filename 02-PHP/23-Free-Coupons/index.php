<?php
session_start();

if (!isset($_SESSION["coupon_left"])) {
    $_SESSION["coupon_left"] = 10;
}

if (!isset($_SESSION["user_name"])) {
    $_SESSION["user_name"] = "Customer";
}

if (!isset($_SESSION["coupon-discount"])) {
    $_SESSION["coupon-discount"] = "50% Discount";
}

if (!isset($_SESSION["coupon_message"])) {
    $_SESSION["coupon_message"] = ($_SESSION["coupon_left"] > 0) ? "for the first {$_SESSION["coupon_left"]} customer(s)" : "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Free Coupons</title>
</head>

<body>
    <header>
        <section class="welcome">
            <h1>Welcome <?= $_SESSION["user_name"] ?> </h1>
            <p>We're giving away <span>free coupons</span> </p>
            <p>as token of appreciation</p>
            <p><?= $_SESSION["coupon_message"] ?></p>
        </section>
        <section class=section-form>
            <?php if (!isset($_SESSION["coupon_number"])) { ?>
                <form action="coupon.php" method="POST">
                    <label for="user_name">Kindly type your name: </label>
                    <input type="text" name="user_name" id="user_name">
                    <input type="submit" name="submit" value="Submit" id="submit">
                </form>
            <?php } ?>
        </section>
    </header>
    <main>
        <?php if (isset($_SESSION["coupon_number"])) { ?>
            <section class="coupon">
                <p class=" discount"><?= $_SESSION["coupon-discount"] ?></p>
                <p class="coupon-number"><?= $_SESSION["coupon_number"] ?></p>
                <form action="coupon.php" method="GET">
                    <input type="submit" name="reset" value="Reset Count" id="reset">
                    <input type="submit" name="claim" value="Claim Again" id="claim">
                </form>
            </section>
        <?php } ?>
    </main>
</body>

</html>