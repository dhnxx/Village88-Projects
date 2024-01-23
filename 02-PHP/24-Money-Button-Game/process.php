<?php

session_start();

if (!isset($_SESSION["Currency"])) {
    $_SESSION["Currency"] = 500;
}

if (!isset($_SESSION["Logs"])) {
    $_SESSION["Logs"] = [];
    $_SESSION["Logs"] = array("{$datetime} - Game Started");
}

function risk_level($risk_level)
{
    //* Risk-level (0 - low, 1 - moderate, 2 - high, 3 - severe)
    //* array(min,max,level)
    if ($risk_level == 0) {
        return array(25, 100, "Low Risk");
    } elseif ($risk_level == 1) {
        return array(100, 1000, "Moderate Risk");
    } elseif ($risk_level == 2) {
        return array(500, 2500, "High Risk");
    } elseif ($risk_level == 3) {
        return array(3000, 5000, "Severe Risk");
    }
}

function gamble($currency, $risk)
{

    //* Set the current date and time
    $datetime = date("m/d/Y h:i:sa");
    //* 0 - Loss, 1 - Win
    $result = random_int(0, 1);
    $currency -= $risk[0];
    if ($result == 0) {
        //* Sets the last color 
        $color = "red";
    } elseif ($result == 1) {
        $color = "green";
        $currency += $risk[1];
    }
    $_SESSION["Logs"] [] = array(
        "message" => "{$datetime} - You Pushed {$risk[2]} Value is -{$risk[0]}. Your current money now is {$currency}",
        "color" => $color
    );
    return $currency;
}

//* Reset game button
if (isset($_POST["reset"])) {
    //$_SESSION["Currency"] = 500;
    session_destroy();
}

//* Risk button
if (isset($_POST["risk-level"])) {
    $value = risk_level($_POST["risk-level"]);
    if ($_SESSION["Currency"] >= $value[0]) {
        $_SESSION["Currency"] = gamble($_SESSION["Currency"], $value);
    } else {
        //* if less than the value
    }
}

header("location:index.php");
die();
