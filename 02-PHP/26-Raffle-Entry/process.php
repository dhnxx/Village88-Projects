<?php
require_once("new-connection.php");
session_start();

//* Defaults 

if (!isset($_POST["id"])) {
    $_POST["id"] = 0;
}

if (!isset($_SESSION["message"])) {
    $_SESSION["message"] = "";
}

//* Change the default timezone 

date_default_timezone_set("Asia/Manila");
$query = ("SELECT * FROM contacts.contacts");
$data = fetch_all("$query");
$date_today = date("y-m-d");
$time = date("h:iA");

//* If user submits a number 

if (isset($_POST["submit"])) {
    $number = $_POST["number"];
    $_SESSION["last_number"]
        = $_POST["number"];
    //* check if the number is valid 
    echo ("WORKING");
    if (strlen($number) != 11 || $number[0] != 0 || $number[1] != 9 || empty($number)) {
        header("Location: index.php");
    } else {
        $insert_number = "INSERT INTO contacts.contacts 
        (contact_number, date_inserted, time_inserted) 
        VALUES ('$number', '$date_today', '$time')";
        if (run_mysql_query($insert_number)) {
            $_SESSION["message"] = array(
                "text" => "Success! Contact Number:  {$_SESSION['last_number']} is now added.",
                "class" => "added"
            );
            header("Location: success.php");
            die();
        } else {
            header("Location: index.php");
            die();
        }
    }
}

//* Delete contact number

if (isset($_POST["delete"])) {
    header("Location: success.php");
    $deleted_id = $_POST["id"];
    $delete_query = "DELETE FROM contacts.contacts WHERE id=$deleted_id";

    $_SESSION["message"] = array(
        "text" => "Success! Contact Number:  {$_SESSION['last_number']} is now deleted.",
        "class" => "deleted"
    );

    run_mysql_query($delete_query);
    run_mysql_query($auto_increment);
    die();
}

//* Add a number
if (isset($_POST["add_number"])) {
    header("Location: index.php");
    die();
}
