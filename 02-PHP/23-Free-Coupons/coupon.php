<?php
session_start();

function decreaseCoupon()
{
    $_SESSION["coupon_left"] -= 1;
}

function randomDigits()
{
    return rand(1000000, 9999999);
}

if (isset($_POST["submit"])) {
    decreaseCoupon();
    $_SESSION["user_name"] = $_POST["user_name"];
    $_SESSION["coupon_number"] = randomDigits();
    $_SESSION["coupon_message"] = ($_SESSION["coupon_left"] > 0) ? "for the first {$_SESSION["coupon_left"]} customer(s)" : "";
}

if (isset($_GET["reset"])) {
    session_destroy();
}

if (isset($_GET["claim"])) {
    unset($_SESSION["coupon_number"]);
    unset($_SESSION["user_name"]);
    $_SESSION["coupon-discount"] = "50% Discount";
    $_SESSION["coupon_message"] = ($_SESSION["coupon_left"] > 0) ? "for the first {$_SESSION["coupon_left"]} customer(s)" : "";
} elseif ($_SESSION["coupon_left"] < 1) {
    $_SESSION["coupon_message"] = "";
    $_SESSION["coupon-discount"] = "Sorry";
    $_SESSION["coupon_number"] = "Unavailable";
    $_SESSION["coupon_left"] = 0;
}

header("Location: index.php");
