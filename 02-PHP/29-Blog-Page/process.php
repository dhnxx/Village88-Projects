<?php session_start(); require_once("new-connection.php");
//session_destroy();


//* Fetch all users
function fetchUsers($user_id)
{
    $query = ("SELECT id, first_name, last_name FROM users WHERE id = {$user_id}");

    return fetch_record($query);
}
//* Fetch all reviews 
function fetchReviews()
{
    $query = ("SELECT
    reviews.user_id AS user_id,
    reviews.id AS review_id,
    reviews.context AS review_content,
    reviews.created_at AS review_created
    FROM reviews ORDER BY review_created"
    );

    return fetch_all($query);
}

//* Fetch all replies based on each reviews
function fetchReplies($review_id)
{
    $query = ("SELECT
    replies.user_id AS user_id,
    replies.review_id AS replies_id,
    replies.context AS replies_content,
    replies.created_at AS replies_created
    FROM replies
    WHERE review_id = {$review_id}");

    return fetch_all($query);
}

//* Fetch user's ID based on email and first name
function fetchUsersID($email, $first_name)
{
    $query = ("SELECT * FROM users WHERE email = '{$email}' AND first_name = '{$first_name}'");
    $id = fetch_record($query);
    return $id["id"];
}

//* Insert a review 
function insertReview($id, $content)
{
    $query = ("INSERT INTO reviews (user_id, context, created_at, updated_at) VALUES ('{$id}','{$content}', NOW(), NOW())");

    run_mysql_query($query);
}

//* Insert a replies 
function insertReply($user_id, $review_id, $content)
{

    $query = "INSERT INTO replies (user_id, review_id, context, created_at, updated_at) VALUES ('{$user_id}', '{$review_id}', '{$content}', NOW(), NOW())";


    run_mysql_query($query);
}

//* Convert sql time format
function convertTime($sql_date)
{
    $datetime = strtotime($sql_date);
    return date("F d Y h:i:A", $datetime);
}

if (isset($_SESSION["logged"])) 
{
    //* Gets the current user's ID 
    $user_id = fetchUsersID($_SESSION["logged"]["email"], $_SESSION["logged"]["first_name"]);
    $reviews = fetchReviews();

}

//* Submit Review 
if (isset($_POST["add_review"])) 
{
    $review_content = $_POST["review"];
    insertReview($user_id, $review_content);
    header("Location: index.php");
}

//* Submit Replies 
if (isset($_POST["add_reply"])) 
{
    header("Location: index.php");
    insertReply($user_id, $_POST["review_id"], $_POST["review_content"]);
}
