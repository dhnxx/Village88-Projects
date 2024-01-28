<?php

require_once("new-connection.php");
session_start();
//session_destroy();

function register_user($email, $first_name, $last_name, $password) {
    $query = "INSERT INTO user (email, first_name, last_name, password, created_at, updated_at) 
VALUES ('$email', '$first_name', '$last_name', '$password', NOW(), NOW());";

    run_mysql_query($query);
}

function login_user($email, $password) {
    $query = "SELECT id, first_name, last_name FROM user WHERE email = '$email' AND password = '$password'";
    $_SESSION["user"] = fetch_record($query);
}

function create_post($user_id, $post) {
    $query = "INSERT INTO post (user_id, post, created_at, updated_at) VALUES ('$user_id', '$post', NOW(), NOW());";

    run_mysql_query($query);
}

//* fetch all posts 
function fetch_posts() {
    $query = "SELECT * FROM post";
    return fetch_all($query);
}

//* fetch all replies based on id 
function get_replies($review_id) {
    $query = "SELECT * FROM reply WHERE review_id = '$review_id';";
    return fetch_all($query);
}

//* create reply 
function create_reply($user_id, $review_id, $reply) {
    $query = "INSERT INTO reply (user_id, review_id, reply, created_at, updated_at) VALUES ('$user_id', '$review_id', '$reply', NOW(), NOW());";

    run_mysql_query($query);
}

//* Get user info via user id
function get_user($user_id) {
    $query = "SELECT * FROM user WHERE id = '$user_id'";
    return fetch_record($query);
}

//* Convert sql time format
function convertTime($sql_date) {
    $datetime = strtotime($sql_date);
    return date("F d Y h:i:A", $datetime);
}

if (isset($_POST["register_user"])) {
    header("Location: index.php");
    register_user($_POST["email"], $_POST["fname"], $_POST["lname"], $_POST["pw"]);
}

if (isset($_POST["login_user"])) {
    header("Location: main.php");
    login_user($_POST["email"], $_POST["pw"]);
    echo "xd";
}

//* submit-button (POST)

if (isset($_POST["submit-button"])) {
    header("Location: main.php");
    create_post($_SESSION["user"]["id"], $_POST["content"]);
}

//* reply-button (POST)

if (isset($_POST["reply-button"])) {
    header("Location: main.php");
    create_reply($_SESSION["user"]["id"], $_POST["review_id"], $_POST["reply"]);

    var_dump($_POST);
}
