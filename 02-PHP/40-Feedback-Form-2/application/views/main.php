<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Feedback Form 2</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/main.css?v1'); ?>">

</head>

<body>
	<h1>Feedback Form</h1>

	<section class="form">
		<?= form_open("main/display", array("method" => "post")); ?>
		<?= form_label("Your Name (optional)", "name", array("class" => "label")) ?>
		<?= form_input(array("type" => "text", "name" => "name")) ?>
		<?= form_label("Course Title", "course_title", array("class" => "label")) ?>
		<?= form_dropdown("course", $course_titles, "web") ?>
		<?= form_label("Given Score (1-10)", "ratings", array("class" => "label")) ?>
		<?= form_dropdown("rating", $ratings, "9") ?>
		<?= form_label("Reason", "reason", array("class" => "label")) ?>
		<?= form_textarea(array("name" => "reason")); ?>
		<?= form_submit(array("value" => "Submit!", "class" => "submit")); ?>
		<?= form_close() ?>
	</section>


</body>

</html>