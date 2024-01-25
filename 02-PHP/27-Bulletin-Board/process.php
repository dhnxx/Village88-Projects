<?php

require_once("new-connection.php");

//* Set the list's background color randomly 
$random_color = array("#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d");

$random = rand(0, count($random_color));

//* Set timezone and current date/time 
date_default_timezone_set("Asia/Manila");
$display = ("SELECT * FROM bulletin_board.board");
$date_today = date('Y-m-d H:i:s');
$board_list = fetch_all($display);

//* Save data in a variable


//* Add function 
if (isset($_POST["add"])) {

    $subjects = $_POST["subjects"];
    $details = $_POST["details"];

    //* Redirect to main
    $add_list = "INSERT INTO bulletin_board.board (subjects, details, created_at) 
    VALUES ('$subjects', '$details', '$date_today')";
    //* Check validations
    if (strlen($subjects) <= 50 && strlen($details) <= 255 && (!empty($subjects)) && (!empty($details))) {
        //* Run the query
        if (run_mysql_query($add_list)) {
            header("Location: main.php");
            exit();
        } else {
            header("Location: index.php");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
}

//* Redirect to the main
if (isset($_POST["skip"])) {
    header("Location: main.php");
}

//* Redirect to index to add more 
if (isset($_POST["add_more"])) {
    header("Location: index.php");
}
