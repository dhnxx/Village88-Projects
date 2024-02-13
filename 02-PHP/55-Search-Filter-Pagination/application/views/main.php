<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view("partials/header.php"); ?>

<header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

         //* Set default values 
        let name = null; 
        let min_val = null;  
        let max_val = null;
        let order = "ASC"; 
        let page = 0; 
        let csrf_name = "<?= $this->security->get_csrf_token_name() ?>";
        let csrf_val = "<?= $this->security->get_csrf_hash() ?>";

        $.get("<?= base_url("main/page_index") ?>", function(res){
            $(".products").html(res);
            $("#" + page).addClass("active"); 
        });

        function filter(){

            $.post('<?= base_url("main/filter/") ?>' + page, 
            {by_name: name, min: min_val, max: max_val, order: order, [csrf_name]: csrf_val},     
            function(res){     
                $(".products").html(res);                
                $("#" + page).addClass("active"); 
                page = 0;                   
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

        $(document).on("click", ".link", function(e){
            e.preventDefault();    
            page = $(this).attr('href');
            filter(); 
        });

    });
</script>

</header>

<body>
    <header>
        <h1>Pagination</h1>
    </header>
    <form action="<?= base_url("main/filter") ?>" method="post">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash() ?>">
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