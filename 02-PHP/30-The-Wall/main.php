<?php
require("process.php");
var_dump($_SESSION["user"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <p><?= (isset($_SESSION["user"])) ? "hello {$_SESSION["user"]["first_name"]}" : "Hello user"; ?> </p>
        <a href="index.php">logout</a>
    </header>

    <main>
        <h1>CREATE A POST</h1>
        <form action="process.php" method="POST">
            <textarea name="content" id="content" cols="30" rows="10" placeholder="write a post"></textarea>
            <input type="submit" name="submit-button" value="POST">
        </form>

        <div class="post">
<?php $posts = fetch_posts();
            foreach ($posts as $post) { ?>
<?php $name = get_user($post["user_id"]); ?>
                <h1><?= $name["first_name"] ?></h1>
<?php $date = convertTime($post["created_at"]) ?>
                <p><?= $date ?> </p>
                <p><?= $post["post"] ?></p>
                <div style="margin-left: 25px " class="replies">
<?php $replies = get_replies($post["id"]);
                    foreach ($replies as $reply) { ?>
<?php $reply_name = get_user($reply["user_id"]) ?>
                        <h2><?= $reply_name["first_name"] ?> said: </h2>
<?php $reply_date = convertTime($reply["created_at"]) ?>
                        <p><?= $reply_date ?> </p>
                        <p><?= $reply["reply"] ?></p>
<?php } ?>
                    <form action="process.php" method="post">
                        <input type="hidden" name="review_id" value="<?= $post["id"] ?>">
                        <textarea name="reply" id="reply" cols="30" rows="10"></textarea>
                        <input type="submit" value="reply" name="reply-button">
                    </form>
                </div>
<?php } ?>

        </div>
    </main>

</body>


</html>