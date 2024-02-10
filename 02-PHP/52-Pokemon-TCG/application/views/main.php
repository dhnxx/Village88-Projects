<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view("partials/header.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.get("https://fakerapi.it/api/v1/images?_quantity=100&_type=kittens", function(res) {
            let images = "";
            for (let i = 0; i < res["data"].length; i++) {
                images += "<img src='" + res["data"][i].url + "'>"
            }
            console.log(images)
            $(".kittens").html(images);
        }, "json")
    })
</script>

<body>
    <h1>100 Kittens</h1>
    <div class="kittens"></div>
</body>