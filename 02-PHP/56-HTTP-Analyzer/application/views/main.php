<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<?php $this->load->view("partials/header.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        
        $('form').submit(function() {
            //* Fetch html content 
            $.post($(this).attr('action'), $(this).serialize(), function(res) {
                $('.result').text(res);
            });

            //* Request for each HTML element
            $.post('<?= base_url("main/count_elements")?>', $(this).serialize(), function(res) {
                $("#meta").text(res.meta);
                $("#div").text(res.div);
                $("#p").text(res.p);
                $("#a").text(res.a);
                $("#img").text(res.img);
                $("#ul").text(res.ul);
                $("#li").text(res.li);
                $("#h1").text(res.h1);
                $("#h2").text(res.h2);
                $("#h3").text(res.h3);
            }, "json");

            return false;
        });

    });
</script>


<body>
    <h1>HTTP Analyzer</h1>
    <form action="<?= base_url("main/fetch_content") ?>" method="post">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
    <label for="url">URL to fetch by AJAX</label>
    <input type="text" name="url" id="url">
    <input type="submit" value="Submit">
    </form>
    <h2>HTTP Response</h2>
    <div class="result"></div>
    <h2>HTML Tags Analyzer</h2>
    <table>
        <tr>
            <th>HTML Tags</th>
            <th>Number of Appearances</th>
        </tr>
        <tr>
            <td>Meta</td>
            <td id="meta">0</td>
        </tr>
        <tr>
            <td>div</td>
            <td id="div">0</td>
        </tr>
        <tr>
            <td>p</td>
            <td id="p">0</td>
        </tr>
        <tr>
            <td>a</td>
            <td id="a">0</td>
        </tr>
        <tr>
            <td>img</td>
            <td id="img">0</td>
        </tr>
        <tr>
            <td>ul</td>
            <td id="ul">0</td>
        </tr>
        <tr>
            <td>li</td>
            <td id="li">0</td>
        </tr>
        <tr>
            <td>h1</td>
            <td id="h1">0</td>
        </tr>
        <tr>
            <td>h2</td>
            <td id="h2">0</td>
        </tr>
        <tr>
            <td>h3</td>
            <td id="h3">0</td>
        </tr>
    </table>
</body>
