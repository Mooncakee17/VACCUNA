
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
            <div class="search">
                    <form action="" method="GET">
                    <input type="text" name="search" value="" placeholder="Search ">
                    <button type="submit" style=""><i class="fa fa-search"></i></button>
                    <button onclick="location.reload()" style="">Refresh</button>  
                    <button onclick="location.reload()" style=""><i class="fa fa-user-plus"></i> Register Child </button>  
                    </form>
                    
            </div>
            <div class="table3">
            
            <div class="table3_section">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CHILD NAME</th>
                            <th>GENDER</th>
                            <th>BIRTHDATE</th>
                            <th>PARENT/GUARDIAN</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          
                            $record =  "SELECT * FROM `childtable`";
                            if(isset($_GET['search'])){
                                $row = $_GET['search'];
                                $record =  "SELECT * FROM `childtable` WHERE CONCAT(child_firstname, child_lastname, mothername) LIKE '%$row%'";
                              
                        }
                            $record_run = mysqli_query($conn, $record);
                     
                            if(mysqli_num_rows($record_run) > 0 ){
                            foreach($record_run as $row){
                              
                                ?>
                            
                            <tr>
                            <td><?= $row['cid']; ?></td>
                            <td><?= $row['child_firstname']; ?>  <?= $row['child_lastname']; ?></td>
                            <td><?= $row['gender']; ?></td>
                            <td><?= $row['birthdate']; ?></td>
                            <td><?= $row['mothername']; ?></td>
                            <td>
                                <a href="Report-Details.php?id=<?= $row['cid']; ?>"><i class="fas fa-eye"></i></a>
                        

                            </td>
                        </tr>
                                <?php
                            }
                            }
                            else{
                                echo "No Record Found";
                            }
                    ?>
                    
                   
                    </tbody>
                </table>
            </div>
        </div>
           
                    
        </div>
</div>


</body>
</html>