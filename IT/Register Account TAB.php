
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
                <img src="./images/register account.png">
            <div class="dashboard-text">
                    
                <h1>REGISTER ACCOUNT</h1>
               
            </div>
            </div>

            <div class="container">
                <form action="">
                    <h1>REGISTER USER</h1>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">First Name</span>
                            <input type="text" placeholder="Enter your first name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Last Name</span>
                            <input type="text" placeholder="Enter your last name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" placeholder="Enter your username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="text" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" placeholder="Enter your number" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" placeholder="Enter your password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" placeholder="Confirm your password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">User Type</span>
                            <div class="styled-select">
                                <select required>
                                    <option value="" disabled selected>Select user type</option>
                                    <option value="parent">Parent</option>
                                    <option value="admin">Admin</option>
                                    <option value="it">IT</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="create-button">Create</button>

                </form>
            </div>
        </div>

        
           
                    
    </div>
</div>


</body>
</html>
<!--merge -->