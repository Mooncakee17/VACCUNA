
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

<link rel="stylesheet" href="./css/child-reg.css">
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
            <form action="" method="post">
           
           <div class="child-reg" >
           <p >REGISTER CHILD</p>
           <div class="user-details" >
           
                    <div class="userdetails1">
                    <div class="input-box">
                        <span class="details">Child's First Name</span>
                        <input type="text" name="Child_fname" placeholder="Enter your child's first name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Child's Last Name</span>
                        <input type="text" name="Child_lname" placeholder="Enter your child's last name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Child's Middle Name</span>
                        <input type="text" name="Childmname" placeholder="Enter your child's middle name" required>
                    </div>
                    <div class="date">
                        <span class="details">Child's Birthdate</span>
                        <input type="date" name="Child_bdate" placeholder="Enter your child's birthdate" required>
                    </div>
                    </div>
                    <div class="userdetails2">
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" name="Child_fname" placeholder="Enter your address" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Child's Father's Name</span>
                        <input type="text" name="Child_fthrname" placeholder="Enter child's father's name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Child's Mother's Name</span>
                        <input type="text" name="Child_mthrname" placeholder="Enter child's mother's name" required>
                    </div>
                    <div class="input-box">
                    <span class="details">Sex</span>
                        <select id="cars" name="Sex">
                        
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                    </div>
                    </div>
                   
                </div>
            </form>
                     </div>                    
               </div>
        </div>
</div>
           
                    
  
    
   

</body>
</html>