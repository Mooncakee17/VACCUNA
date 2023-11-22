
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
                            <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="editModal" class="modal">
                <div class="editModal-content">
                    <form action="#" method="POST">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">First Name</span>
                                <input type="text" name="first_name" placeholder="User's first name" value="Marijo" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Last Name</span>
                                <input type="text" name="last_name" placeholder="User's last name" value="Pedian" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input type="text" name="user's_email" placeholder="User's email" value="marijo@gmail.com" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Usertype</span>
                                <input type="text" name="User_type" placeholder="Usertype" value="Parent" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Contact Number</span>
                                <input type="text" name="contact_number" placeholder="Contact number" value="09453845638" required>
                            </div>
                            <div class="input-box">
                            <span class="details">Status</span>
                            <div class="styled-select">
                                <select required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="parent">Active</option>
                                    <option value="admin">Inactive</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <button onclick="closeModal('edit')">Close</button>
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>

        </div>
           
                    
        </div>
</div>

    <script src="./js/User Management Edit Button Modal.js"></script>

</body>
</html>
<!--merge -->