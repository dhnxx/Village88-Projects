<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        $.get("<?= base_url("main/page_index") ?>", function(res){
            $(".products").html(res); 
        });

        let name = null; 
        let min_val = null;  
        let max_val = null;
        let order = "ASC"; 

        function filter(){

            $.post('<?= base_url("main/filter") ?>', {by_name: name, min: min_val, max: max_val, order: order }, function(res){
                $(".products").html(res); 
            });
        }

        $(document).on("input", "#by_name", function(){          
            name = $(this).val(); 
            filter();    
        });

        $(document).on("change", "#order", function(){
            order = $(this).val(); 
            filter();
        });

        $(document).on("input", "#min", function(){
            min_val = $(this).val(); 
            filter(); 
        });

        $(document).on("input", "#max", function(){
            max_val = $(this).val();
            filter(); 
        });

    });
</script>

<?php $this->load->view("partials/header.php"); ?>


<body>
    <form action="<?= base_url("main/filter") ?>" method="post">
        <input type="text" name="by_name" id="by_name" placeholder="Search by name">
        <input type="text" name="min" id="min" placeholder="$min">
        <input type="text" name="max" id="max" placeholder="$max">
        <select name="order" id="order">
            <option value="ASC" selected>Low to High Price</option>
            <option value="DESC">High to Low Price</option>
        </select>
    </form>
    <div class="products"></div>
</body>