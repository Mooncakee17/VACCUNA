
<?php 
include('../templates/Header.php'); 

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
            <div class="IT-search">
                    <form action="" method="GET">
                    <input type="text" name="search" value="" placeholder="Search ">
                    <button type="submit" style=""><i class="fa fa-search"></i></button>
                    <button onclick="location.reload()" style="">Refresh</button>
                    </form>    
            </div>
            
            <div class="IT-table">
            <div class="ITtable_section">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>CONTACT NUMBER</th>
                            <th>PASSWORD</th>
                            <th>USERTYPE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Marijo Pedian</td>
                            <td>marijo@gmail.com</td>
                            <td>09123435786</td>
                            <td>123456</td>
                            <td>PARENT</td>
                            <td>
                            <a href="User Management-Details.php"><i class="fas fa-eye"></i></a>

                            </td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>

        </div>
           
                    
        </div>
</div>


</body>
</html>
<!--merge -->