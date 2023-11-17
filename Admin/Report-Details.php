
<?php 
include('../templates/Header.php'); 

 
?>
<link rel="stylesheet" href="./css/style5.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

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
           <div style="
                       background-color: #ffffff;
                       margin: 0 0px 0 100px;
                       width: 90%;
                       max-width: 1500px;
                       min-height: 500px;
                       flex-shrink: 0;
                       border-radius: 10px;
                       box-shadow: 0 0 4px rgba(142, 5, 196, 0.849);
                       padding: 30px;
                       box-sizing: border-box;  ">
           
                    <div class="title" >
                    <h2>PERSONAL INFORMATION</h2>
                    </div>
                      <p><span class="label">Age</span> 2</p>
                      <p><span class="label">Gender</span> Male</p>
                      <p><span class="label">Birth Date</span> November 24, 2022</p>
                      <p><span class="label">Birth Place</span> St Luke's Medical Center</p>
                      <p><span class="label">Address</span> Santa Mesa, Manila</p>
                      <p><span class="label">Mother's Name</span> Mary Rose A. Coloma</p>
                      <p><span class="label">Father's Name</span> Mark G. Coloma</p>
                      <p><span class="label">Contact Number</span> 09132567445</p>
                        
                        <div class="title">
                          <h2>VACCINE INFORMATION</h2>
                         </div>
                          <p><span class="label">POLIO DOSE 1</span> YES</p>
                          <p><span class="label">POLIO DOSE 2</span> NO</p>
                          <button >Close</button>                 
                     </div>                    
               </div>
        </div>
</div>
           
                    
  
    
   

</body>
</html>
<!--merge -->