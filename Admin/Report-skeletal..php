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
                    <input  type="text" name="search" id="search_data" value="" placeholder="Search ">
                    <button type="button" id="search_button"><i class="fa fa-search"></i></button>
                    <button onclick="location.reload()" style="">Refresh</button>  
            </div>
            <div class="table3">
            
            <div class="table3_section">
                <table id="data_table">
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
                    <tbody>
                    <?php
                          include '../Homepage/config.php';
                          $select = mysqli_query($conn, "SELECT * FROM appointmenttable a
                            LEFT JOIN vaccineinventory b ON a.vacid = b.vacid  ORDER BY appointment_status ASC") or die('query failed');
                          //$record_run = mysqli_fetch_all($select, MYSQLI_ASSOC);
                   
                          if(mysqli_num_rows($select) > 0 ){
                          foreach($select as $row){
                            
                              ?>
                          
                          <tr>
                          <td><?= $row['cid']; ?></td>
                          <td><?= $row['child_name']; ?></td>
                          <td><?= $row['vac_name']; ?></td>
                          <td><?= $row['appointment_status']; ?></td>
                          <td><?= $row['appt_date']; ?></td>
                          <td><?= $row['vaccine_administer']; ?></td>
                          <td>
                              <a href="Report-Details.php?id=<?= $row['cid']; ?>"><i class="fas fa-eye"></i></a>
                          </td>
                      </tr>
                              <?php
                          }
                          }
                          else {
                              // Display a message when no records are found
                              ?>
                              <tr>
                                  <td colspan="6"> <!-- colspan should match the number of columns in your table -->
                                      <div>No Record Found</div>
                                  </td>
                              </tr>
                              <?php
                          }
                          ?>
                  </tbody>
              </table>
          </div>
      </div>
         
                  
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