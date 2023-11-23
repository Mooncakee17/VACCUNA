<html>
<?php 
include('../templates/Header.php'); 
include('../Admin_appointment/vaccine_details.php'); 
?>
<link rel="stylesheet" href="./css/style5.css">
<link rel="stylesheet" href="./css/style6.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<!-- Include Bootstrap JavaScript and Popper.js from a CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<body>
<div class="container1">
        <div class="column1">
          <?php include('../templates/Admin-Dash.php'); ?> <!------------call side bar template------------>
        </div>

        <div class="column">
            <div class="dashboard">
                <img src="./images/Immunization Record.png">
            <div class="dashboard-text">
                    
                <h1>IMMUNIZATION RECORDS</h1>
               
            </div>
            </div>
            <div class="search">
            <form method="GET" action="Report.php">
                    <label for="vaccine_name">Select Vaccine Name:</label>
                    <select name="vaccine_name" id="vaccine_name">
                        <option value="">All</option>
                        <option value="BCG">BCG</option>
                        <option value="HepB">HepB</option>
                        <option value="DTap">DTap</option>
                        <option value="HiB">HiB</option>
                        <option value="IPV">IPV</option>
                        <option value="PCV">PCV</option>
                            <option value="Rota">Rotavirus</option>
                    <option value="Influenza">Influenza</option>
                    <option value="MMR">MMR</option>
                <option value="HepA">HepA</option>
                    </select>

                <label for="status">Select Status:</label>
                <select name="status" id="status">
                    <option value="">All</option>
                    <option value="1">For Approval</option>
                    <option value="2">Completed</option>
                    <option value="3">Missed</option>
                    <option value="4">Consultation</option>
                    <option value="5">Walk-In</option>
                    <!-- Add other status options here -->
                </select>

            <input type="submit" value="Filter">
                </form>
                </div>

                <div class="table3">
                    <div class="table3_section">
                        <table id="data_table">
                            <!-- Table Header -->
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CHILD NAME</th>
                                    <th>VACCINE NAME</th>
                                    <th>STATUS</th>
                                    <th>DATE</th>
                                    <th>ADMINISTRATOR</th>
                                </tr>
                            </thead>
                           
                        </table>
                    </div>
                </div>


<script>
    // Event delegation for dynamically added element
$("#search_button").on("click",  function () {
    // Handle the onchange event for #search_via_dropdown here
    var searchData = $("#search_data").val();
    $.ajax({
        url:'../Admin_appointment/admin_appointment_searchnew.php',
        type:'POST',
        data:{
            searchBy:3,
            searchData:searchData
        },
        success:function(data){
            $(".table3").html(data);
        }
    });


});
</script>
</body>
</html>