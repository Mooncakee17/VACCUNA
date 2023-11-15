

<?php include('../templates/Header.php'); ?>
<link rel="stylesheet" href="./css/style5.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

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

            <div class="values">
            <div class="val-box">
                <i class="fas fa-syringe"></i>
                <div>
                    <h3>1,458</h3>
                    <span>vaccines</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-hand-holding-medical"></i>
                <div>
                    <h3>867</h3>
                    <span>administered vaccines</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-bell-slash"></i>
                <div>
                    <h3>0</h3>
                    <span>missed appointments</span>
                </div>
            </div>
        </div>

        <div class="graphbox">
            <div class="box">
                <canvas id="myChart"></canvas>
            </div>
            <div class="box">
                <canvas id="administered"></canvas>
            </div>
        </div>
        </div>
</div>

    <script src="./js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="./js/my_chart.js"></script>

</body>
</html>