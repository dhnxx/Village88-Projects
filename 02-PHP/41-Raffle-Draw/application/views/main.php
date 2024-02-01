<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Raffle Draw</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/main.css?v3'); ?>">

</head>

<body>
	<h1>Raffle Draw</h1>
	<section class="form">
		<h2><?= $message ?></h2>
		<p class="number"><?= $rand ?></p>
		<?= form_open("main/index", array("method" => "post")); ?>
		<?= form_submit(array("value" => "Pick More", "name" => "pick", "class" => "submit")); ?>
		<?= form_submit(array("value" => "Reset", "name" => "reset", "class" => "submit")); ?>
		<?= form_close(); ?>

	</section>




</body>

</html>