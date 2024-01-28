<?php require("process.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="https://sencss.kilianvalkhof.com/minified/sen.full.min.css?v1">
    <link rel="stylesheet" href="style.css?v101">
</head>
<body>
    <header>
        <h1>Blog post</h1>
        <div class="right-contents">
            <p> <?= (!isset($_SESSION["logged"])) ? "To post a review or comment, please log in." : " Welcome {$_SESSION["logged"]["first_name"]}" ?></p>
            <a href="auth.php"><?= (!isset($_SESSION["logged"])) ? "Login/Register" : "Logout" ?> </a>
        </div>
    </header>
    <main>
        <article class="blog">
            <h1>EcoHarmony: Innovating Sustainability for a Greener Tomorrow</h1>
            <div class="main-content">
                <section>
                    <h2>The Power of EcoHarmony:</h2>
                    <p>
                        At the heart of EcoHarmony lies a commitment to sustainable practices and an unwavering belief that small changes can make a significant difference. This innovative product encompasses a range of features that seamlessly integrate into various aspects of everyday life.
                    </p>
                </section>

                <section>
                    <h2>1. Smart Energy Management:</h2>
                    <p>
                        EcoHarmony intelligently monitors and optimizes energy consumption, allowing users to reduce their carbon footprint effortlessly. Whether it's at home or in the office, this product ensures that energy is used efficiently without compromising comfort or productivity.
                    </p>
                </section>

                <section>
                    <h2>2. Eco-Friendly Materials:</h2>
                    <p>
                        From the packaging to the product itself, EcoHarmony is crafted using eco-friendly materials that are not only sustainable but also recyclable. Minimizing waste and promoting a circular economy is at the core of our design philosophy.
                    </p>
                </section>

                <section>
                    <h2>3. Sustainable Lifestyle App:</h2>
                    <p>
                        Empowering users with knowledge, the EcoHarmony app provides insights into sustainable living practices, tips on reducing waste, and personalized eco-friendly challenges. It transforms sustainable living from a choice into a rewarding lifestyle.
                    </p>
                </section>

                <section>
                    <h2>4. Water Conservation Technology:</h2>
                    <p>
                        EcoHarmony takes water conservation seriously. With advanced sensors and technology, it helps users monitor and minimize water usage, promoting responsible consumption without compromising on daily needs.
                    </p>
                </section>

                <section>
                    <h2>5. Endless Versatility:</h2>
                    <p>
                        Whether you're at home, at work, or on the go, EcoHarmony seamlessly integrates into your lifestyle. From smart home functionalities to portable eco-friendly accessories, the product adapts to your needs while championing sustainability.
                    </p>
                </section>

                <section>
                    <h2>Why EcoHarmony Matters:</h2>
                    <p>
                        In a world grappling with environmental challenges, EcoHarmony stands as a beacon of change. By choosing EcoHarmony, consumers actively participate in a movement toward a more sustainable future. It's not just a product; it's a commitment to harmony between human activities and the planet we call home.
                    </p>
                </section>

                <section>
                    <h2>Join Us:</h2>
                    <p>
                        Join us in the journey towards a greener tomorrow. Embrace EcoHarmony and be part of the solution—one small, sustainable choice at a time.
                    </p>
                </section>
            </div>
        </article>
<?php if (isset($_SESSION["logged"])) { ?>
            <section class="leave-review">
                <form action="process.php" method="POST">
                    <h2>Leave a Review</h2>
                    <textarea name="review" id="review" cols="30" rows="10" placeholder="Add a review"></textarea>
                    <div class="button"><input type="submit" name="add_review" value="Post"></div>
                </form>
            </section>
<?php } ?>
<?php $reviews = fetchReviews();
        foreach ($reviews as $review) { ?>
            <section class="review">
                <form action="process.php" method="POST">
<?php $review_user = fetchUsers($review["user_id"]);
                    $review_datetime = convertTime($review["review_created"]); ?>
                    <h3><?= "{$review_user["first_name"]} {$review_user["last_name"]}" ?> <span class="date"> <?= "{$review_datetime}" ?> </span> </h3>
                    <p><?= "{$review["review_content"]} " ?></p>
                    <input type="hidden" name="review_id" value="<?= $review["review_id"] ?>">
                    <div class="replies-container">
                        <section class="replies"><?php $replies = fetchReplies($review["review_id"]);
                            foreach ($replies as $reply) { ?>
<?php $reply_user = fetchUsers($reply["user_id"]);
                                $reply_datetime = convertTime($reply["replies_created"]); ?>
                                <h3><?= "{$reply_user["first_name"]} {$reply_user["last_name"]}" ?> <span class="date"> <?= "{$reply_datetime}" ?> </span> </h3>
                                <p><?= $reply["replies_content"] ?></p>
<?php } ?>
                        </section>
                        <section class="leave-reply">
<?php if (isset($_SESSION["logged"])) { ?>
                                <textarea name="review_content" id="review" cols="30" rows="10" placeholder="Reply to this review"></textarea>
                                <div class="button"><input type="submit" value="Reply" name="add_reply"></div>
                        </section>
<?php } ?>
                    </div>
                </form>
            </section>
            </section>
<?php } ?>
    </main>
</body>
</html>