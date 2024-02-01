<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Countdown</title>

	<style>
		body {
			text-align: center;
		}

		.container {
			border: 3px solid black;
			height: max-content;
			width: 300px;
			margin: 0 auto;
			padding: 25px;
		}
	</style>
</head>

<body>
	<h1>COUNTDOWN BEFORE DAY ENDS</h1>

	<div class="container">
		<?php echo ("<h2>$total_sec seconds </h2>") ?>
		<?php echo ("<h2>$main->h:$main->i:$main->s </h2>") ?>
		<?php echo (date_format($now, "m/d/Y")) ?>
	</div>
</body>

</html>