<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:LoginForm.php');
};

if(isset($_GET['logout'])){
   unset($userid);
   session_destroy();
   header('location:LoginForm.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>


</head>
<body>
    <!-- dito yung container1 for css-->
<div class="container1">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `usertable` WHERE userid = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="assets/images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['firstname']; ?></h3>
      <a href="updateprofile.php" class="btn">update profile</a>
      <a href="Index.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <p>new <a href="LoginForm.php">login</a> or <a href="SignUp.php">register</a></p>
   </div>

</div>

</body>
</html>