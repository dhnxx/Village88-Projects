<?php
header('Content-type: text/javascript');

?>
$(document).ready(function(){
console.log("You are <?= rand(45, 100) ?>x better than before!");
});