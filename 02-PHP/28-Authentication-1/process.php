<?php
session_start();
require_once("new-connection.php");

//session_destroy();

function validateRegister($post)
{
    $error = array();
    var_dump($post);
    $empty_fields = array();

    //* Check empty fields and store the field names with empty values
    foreach ($post as $keys => $fields) {
        if (empty($fields)) {
            $empty_fields[] = str_replace("_", " ", $keys);
        }
    }
    //* If there are empty fields 
    if (!empty($empty_fields)) {
        $error[] = implode(", ", $empty_fields) . " is missing";
    } else {
        //* Check if email is valid 
        if (!filter_var($post["Email"], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Invalid email format";
        }

        //* Check if first and last name are not numeric and have greater than 2 characters
        if (is_numeric($post["First_Name"])) {
            if (strlen($post["First_Name"]) < 2) {
                $error[] = "First name has less than 2 characters";
            }
        } else {
            $error[] = "First name has numeric values";
        }

        if (!is_numeric($post["Last_Name"])) {
            if (strlen($post["Last_Name"]) < 2) {
                $error[] = "Last name has less than 2 characters";
            }
        } else {
            $error[] = "Last name has numeric values";
        }

        //* Check if contact number is valid 
        if (strlen($post["Contact_Number"]) != 11) {
            $error[] = "Contact number is not 11 digits";
        } elseif ($post["Contact_Number"][0] != 0 || $post["Contact_Number"][1] != 9) {
            $error[] = "Contact number's starting digit is incorrect";
        } elseif (!is_numeric($post["Contact_Number"])) {
            $error[] = "Contact number should only contain numbers";
        }

        //* Check password's length 
        if (strlen($post["Password"]) < 8) {
            $error[] = "Password should have 8 characters or more";
        }

        //* Check if password is the same as confirm password with MD5
        if (md5($post["Password"]) != md5($post["Confirm_Password"])) {
            $error[] = "Password doesn't match with Confirm Password";
        }
    }

    return $error;
}

function insertUser($post)
{
    $email = $post["Email"];
    $fname = $post["First_Name"];
    $lname = $post["Last_Name"];
    $number = $post["Contact_Number"];
    $password = md5($post["Password"]);

    $query = "INSERT INTO users (email, first_name, last_name, contact_number, password, created_at, updated_at) VALUES ('{$email}','{$fname}', '{$lname}', '{$number}', '{$password}', NOW(), NOW())";

    run_mysql_query($query);
}


function userLogin($post)
{
    $error = array();

    //* Check empty fields and store the field names with empty values
    foreach ($post as $keys => $fields) {
        if (empty($fields)) {
            $empty_fields[] = str_replace("_", " ", $keys);
        }
    }
    //* If there are empty fields 
    if (!empty($empty_fields)) {
        header("Location: index.php");
        $error[] = implode(", ", $empty_fields) . " is missing";
        $_SESSION["messages-login"] = array("message" => $error, "color" => "have-error");
    } else {
        $inputted_email = $post["Email"];
        $inputted_password = md5($post["Password"]);

        $query = "SELECT first_name FROM users WHERE email = '{$inputted_email}' AND password = '{$inputted_password}'";

        if ($result = fetch_record($query)) {
            header("Location: success.php");
            $_SESSION["logged_user"] = $result;
        } else {
            //* Failed
            header("Location: index.php");
            $error[] = "Login Unsuccessfully, Check your Email and Password";
            $_SESSION["messages-login"] = array("message" => $error, "color" => "have-error");
        }
    }
}

function resetPassword($post)
{
    $inputted_number = $post["number"];
    $default_password = md5("village88");
    $query = "UPDATE users SET password = '{$default_password}' WHERE contact_number = '{$inputted_number}';";

    run_mysql_query($query);
    $_SESSION["messages-reset"] = array(
        "message" => array("Successfully changed your password to 'village88'"),
        "color" => "no-error"
    );

    header("Location: reset-password.php");
}

//* User Register
if (isset($_POST["register"])) {

    $errors = validateRegister($_POST);
    $_SESSION["messages-register"] = array(
        "message" => $errors,
        "color" => "have-error"
    );

    if (empty($errors)) {
        header("Location: index.php");
        $_SESSION["messages-register"] = array("message" => array("Successfully Registered"), "color" => "no-error");
        //* Insert data to the database 
        insertUser($_POST);
        die();
    } else {
        header("Location: index.php");
        die();
    }
}
//* User Login 
if (isset($_POST["login"])) {
    userLogin($_POST);
}

//* User Logout
if (isset($_POST["logout"])) {
    header("Location: index.php");
    session_destroy();
    die();
}

//* Reset Password
if (isset($_POST["reset"])) {
    header("Location: reset-password.php");
}
if (isset($_POST["reset-button"])) {
    resetPassword($_POST);
}
if (isset($_POST["reset-back"])) {
    header("Location: index.php");
    session_destroy();
    die();
}
