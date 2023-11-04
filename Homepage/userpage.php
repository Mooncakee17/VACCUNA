<?php
//userpage dashboard example
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:/Homepage/LoginForm.php');
};

if(isset($_GET['logout'])){
   unset($userid);
   session_destroy();
   header('location:/Homepage/LoginForm.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccuna</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="header">

<nav class="navbar">

    <input type="checkbox" id="check">

    <label for="check" class="checkbtn">

        <i class="fas fa-bars"></i>

    </label>

    <a href="Index.php"><img src="/assets/images/VACUNNA logo.png" class="logo"></a>

        <ul>
            <li><a href="#home">HOME</a></li>
            <li><a href="#home">ABOUT</a></li>
            <li><a href="#home">CONTACT</a></li>
            <li><a href="#home">FAQS</a></li>           
        </ul>

</nav>
</header>
<div class="row">
     <div class="column1">
        <h1>HELLO, THIS IS THE PARENT'S PAGE </h1>
        <p>Have questions regarding vaccine? Try our chatbot! </p>
        <button>CHATBOT VACS</button>
     </div>
        <div class="column2">
            <img src="/assets/images/vacs.png" >
        </div>
   </div>
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