

<?php include('../templates/Header.php'); ?>
<link rel="stylesheet" href="./css/style5.css">

<body>
<div class="container1">
        <div class="column1">
        <?php include('../templates/Admin-Dash.php'); ?> <!------------call side bar template------------>
        </div>

        <div class="column">
            <div class="dashboard">
                <img src="./images/Appointment.png">
            <div class="dashboard-text">
                    
                 <?php
                    $select = mysqli_query($conn, "SELECT * FROM `usertable` WHERE userid = '$user_id'") or die('query failed');
                     if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                    }      
                    ?>
                <h1>Hi <?php echo $fetch['firstname']; ?>! </h1>
               
            </div>
            </div>
        </div>
</div>

    <script src="./js/index.js"></script>

</body>
</html>