<head>
    <meta charset="utf-8">
    <title>Feedback Form 2</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/main.css?v1'); ?>">
</head>
<h1>Feedback Form</h1>
<div class="form">
    <h1>Submitted Entry</h1>
    <p>Your name: <?= $name ?></p>
    <p>Course Title: <?= $course_title ?></p>
    <p>Given Score: <?= $rating ?></p>
    <p>Reason: <?= $reason ?></p>
    <a href="<?= base_url("main/index") ?>">Return</a>
</div>