
<?php 
include('../templates/Header.php'); 
if(isset($_GET['cid'])){
  $cid = mysqli_real_escape_string($conn, $_GET['cid']);
  $record =  "SELECT * FROM `childtable` WHERE cid = $cid";
  $record_run = mysqli_query($conn, $record);
  $row = mysqli_fetch_all($record_run);
   
  print_r($row);
}

   
 
?>
<link rel="stylesheet" href="./css/style5.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

<body>
<div class="container1">
        <div class="column1">
          <?php include('../templates/IT-Dash.php'); ?> <!------------call side bar template------------>
        </div>

        <div class="column">
            <div class="dashboard">
                <img src="./images/user management 1.png">
            <div class="dashboard-text">
                    
                <h1>USER MANAGEMENT</h1>
               
            </div>
            </div>
           
           <div id="Report-Details">
              <div class="ReportDetails-content">
                    <div class="header">
                        <h2>DAN XAVIER A. COLOMA</h2>
                        <img src="./images/User Profile.png" alt="">
                    </div>
                    <button id="editButton" onclick="enableEdit()">Edit</button>
                    <button id="saveButton" onclick="saveChanges()" style="display: none;">Save</button>
                    <div class="title">
                        <h2>PERSONAL INFORMATION</h2>
                    </div>
                    <div class="editable-info">
                      <p><span class="label">Age</span> <span id="age" contenteditable="false">28</span></p>
                      <p><span class="label">Gender</span> <span id="gender" contenteditable="false">Female</span></p>
                      <p><span class="label">Birth Date</span> <span id="birthDate" contenteditable="false">November 24, 2022</span></p>
                      <p><span class="label">Birth Place</span> <span id="birthPlace" contenteditable="false">St Luke's Medical Center</span></p>
                      <p><span class="label">Address</span> <span id="address" contenteditable="false">Santa Mesa, Manila</span></p>
                      <p><span class="label">Email</span> <span id="email" contenteditable="false">marijo@gmail.com</span></p>
                      <p><span class="label">Password</span> <span id="password" contenteditable="false">123456</span></p>
                      <p><span class="label">Contact Number</span> <span id="contactNumber" contenteditable="false">09132567445</span></p>
                    </div>                                 
            </div>
             
            <button onclick="goBack()" class="back-button">Back</button>  

        </div>
</div>
           
<script>
    function enableEdit() {
        var editableFields = document.querySelectorAll('.editable-info span');
        editableFields.forEach(function (field) {
            if (field.classList.contains('label')) {
                // Exclude labels from being editable
                return;
            }
            field.setAttribute('contenteditable', 'true');
            field.classList.add('editable');
        });
        document.getElementById('editButton').style.display = 'none';
        document.getElementById('saveButton').style.display = 'inline-block';
    }

    function saveChanges() {
        var editableFields = document.querySelectorAll('.editable-info span');
        editableFields.forEach(function (field) {
            field.setAttribute('contenteditable', 'false');
            field.classList.remove('editable');
        });
        document.getElementById('editButton').style.display = 'inline-block';
        document.getElementById('saveButton').style.display = 'none';
    }
</script>

<script>
    function enableVaccineEdit() {
        var editableFields = document.querySelectorAll('.modal-table tbody td');
        editableFields.forEach(function (field) {
            field.setAttribute('contenteditable', 'true');
            field.classList.add('editable');
        });
        document.getElementById('editVaccineButton').style.display = 'none';
        document.getElementById('saveVaccineButton').style.display = 'inline-block';
    }

    function saveVaccineChanges() {
        var editableFields = document.querySelectorAll('.modal-table tbody td');
        editableFields.forEach(function (field) {
            field.setAttribute('contenteditable', 'false');
            field.classList.remove('editable');
        });
        document.getElementById('editVaccineButton').style.display = 'inline-block';
        document.getElementById('saveVaccineButton').style.display = 'none';
    }
</script>    

<script>
        function goBack() {
            window.history.back();
        }
</script>
  
    
   

</body>
</html>
<!--merge -->