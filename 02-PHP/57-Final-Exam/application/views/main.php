<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        
        $.get("<?= base_url("employees/index_table")?>", function(res){
            $(".table").html(res);
        });
        //$("form").submit();

        $(document).on("submit", "form", function(){

            //* Fetch the html partial from the controller 

            $.post($(this).attr("action"), $(this).serialize(), function (res){
                $(".table").html(res); 
            });

            //* Fetch the total count of the data

            $.post("<?= base_url("employees/get_count")?>", $(this).serialize(), function (data){
                let initialH1 = " Initial Request"
                $("h1").text(data.count + initialH1);  
            }, "json");
            
            return false; 
        });

        $(document).on("change", "input, #leave_type", function(){
            $("form").submit();
        });

    });
</script>

<body>
    <h1 id="request">Leave Request</h1>
    <form action="<?= base_url("employees/update_table")?>" method="post" id="
    form">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
        <input type="radio" name="date" id="recent" value="recent"  class="date">
        <label for="recent">Most Recent</label>
        <input type="radio" name="date" id="old" value ="old" class="date">
        <label for="recent">Old Request</label>
        <select name="leave_type" id="leave_type">
            <option disabled selected value>Select an option</option>
            <option value="vacation">Vacation</option>
            <option value="sick_leave">Sick Leave</option>
            <option value="unpaid_leave">Unpaid Leave</option>
            <option value="paid_leave">Paid Leave</option>
            <option value="half_day_unpaid">Half day Unpaid</option>
        </select>
    </form>
    <div class="table"></div>
</body>