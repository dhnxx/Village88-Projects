<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<?php $this->load->view("partials/header.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $.get("main/fetch_content", function(res){
            $(".result").text(res); 
            var p_count = (res.match(/<p[^>]*>/g) || []).length; // Count occurrences of <p> tags in the response
            $("#total-p").text(p_count); 
        });
    });
</script>


<body>
    <h1>HTTP Analyzer</h1>
    <form action="/" method="post">
    <label for="search">URL to fetch by AJAX</label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Fetch">
    </form>
    
    <div class="result"></div>
    <p id="total-p">total p</p>
</body>
