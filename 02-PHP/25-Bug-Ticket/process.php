<?php
session_start();

if (isset($_POST["resubmit"])) {
    session_destroy();
    header("Location: index.php");
    die();
}

//* Defaults 
if (!isset($_SESSION["errors"])) {
    $_SESSION["errors"] = array();
}

//* Store all POST in a SESSION 
$_SESSION["bug_report"] = array(
    "Date" => $_POST["date_today"],
    "First Name" => $_POST["first_name"],
    "Last Name" => $_POST["last_name"],
    "Email Address" => $_POST["email_address"],
    "Issue Title" => $_POST["issue_title"],
    "Issue Details" => $_POST["issue_details"],
    "Screenshot" => $_FILES["screenshot"]["name"] ?? null
);

//* Store all the error message
$errors = [];

//* Check if required fields are empty
foreach ($_SESSION["bug_report"] as $key => $content) {
    if (empty($content) && $key != "Screenshot") {
        $errors[] = "The field {$key} has no input";
    }
}

//* Verify if the date inputted is the date today E.g.(01/24/2024)
$date_today = date("m/d/Y");
if ($_SESSION["bug_report"]["Date"] != $date_today) {
    $errors[] = "The Date is Incorrect {$date_today} <br>";
}

//* Verify if the names have numeric values
if ((is_numeric($_SESSION["bug_report"]["First Name"])) || (is_numeric($_SESSION["bug_report"]["Last Name"]))) {
    $errors[] = "The name has a numeric value";
}

//* Verify if the email is in the correct pattern
if (!filter_var($_SESSION["bug_report"]["Email Address"], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Incorrect email pattern";
}

//* Check issue title's 50 character limit
if (strlen($_SESSION["bug_report"]["Issue Title"]) > 50) {
    $errors[] = "Issue's Title is more than 50 characters";
}

//* Check issue details' 250 character limit
if (strlen($_SESSION["bug_report"]["Issue Details"]) > 250) {
    $errors[] = "Issue's details are more than 250 characters";
}

//* If user uploads a screenshot
//* https://www.w3schools.com/php/php_file_upload.asp
if (!empty($_FILES["screenshot"]["name"])) {
    $target_dir = "uploads/";
    $original_file_name = basename($_FILES["screenshot"]["name"]);
    $imageFileType = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));

    //* Ensure the target directory exists
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    //* Generate a unique filename
    $target_file = $target_dir . $original_file_name;
    $counter = 1;

    while (file_exists($target_file)) {
        $filename_parts = pathinfo($original_file_name);
        $target_file = $target_dir . $filename_parts['filename'] . "_" . $counter . "." . $imageFileType;
        $counter++;
    }

    $uploadOk = 1;

    $check = getimagesize($_FILES["screenshot"]["tmp_name"]);
    //* The file is not recognized as an image.
    if ($check === false) {
        $errors[] = "The file is not recognized as an image";
    }

    //* Check if the file format is among the allowed formats.
    $allowed_formats = ["jpg", "png", "jpeg", "gif"];
    if (!in_array($imageFileType, $allowed_formats)) {
        $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
    //* The file was not uploaded due to validation issues.
    if ($uploadOk == 0) {
        $errors[] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["screenshot"]["tmp_name"], $target_file)) {
            // The file has been successfully uploaded.
        } else {
            // There was an error uploading the file.
            $errors[] = "Sorry, there was an error uploading your file.";
        }
    }
}
$_SESSION["errors"] = $errors;

if (!empty($_SESSION["errors"])) {
    header("Location: index.php");
} else {
    header("Location: index2.php");
}

die();
