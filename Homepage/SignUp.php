<?php

include 'config.php';
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

//Send email function 
//need mag dl ng composer ng phpmailer sa terminal
function sendemail_verify($username,$email,$token_verified)
{
/*
    $mail = new PHPMailer();
    $mail->IsSMTP();
  
    $mail->SMTPDebug  = 0;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    //$mail->Host       = "smtp.mail.yahoo.com";
    $mail->Username   = "hatalagtag@gmail.com";
    $mail->Password   = "udiujxcblrowjpzm";
  */
    
    $mail = new PHPMailer(true);
    $mail ->IsSMTP();
    $mail ->SMTPAuth = true;
    $mail->Host       = "smtp.gmail.com";
  //$mail->Host       = "smtp.mail.yahoo.com";
    $mail->Username   = "hatalagtag@gmail.com";
    $mail->Password   = "udiujxcblrowjpzm";

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    $mail->AddAddress($email);
    $mail->SetFrom("hatalagtag@gmail.com", $username);

    $mail->IsHTML(true);
    //$mail->AddReplyTo("reply-to-email", "reply-to-name");
    //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
    $mail->Subject = "Email Verification from VACCUNA";
    $email_template ="
    <h2> You have registered with VACCUNA </h2>
    <h5> Verify your email address to Login with the below given link </h5>
    <br/> <br/>
    <a href='http://localhost/VACCUNA/Homepage/verify-email.php?token=$token_verified'> Click Me </a>
    ";

    $mail ->Body =$email_template;
    $mail ->send(); 
   // echo 'Message has been sent';
}
  //Conditions of inserting data into database
if(isset($_POST['submit'])){

   $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $username = mysqli_real_escape_string($conn, $_POST['uname']);
   $phonenumber = mysqli_real_escape_string($conn, $_POST['pnumber']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $usertype = $_POST ['usertype'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image; 
   $token_verified = md5(rand()); //++token verified, --user_verify

   $select= mysqli_query($conn, "SELECT * FROM `usertable` WHERE user_email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
         $message[] = 'user already exist!'; //need rin pala ng message css
   }else{
        if($pass != $cpass){
           $message[] = 'Confirm password not matched!';
        }elseif($image_size > 2000000){
           $message[] = 'image size is too large!';
        }
   else{
    $insert = mysqli_query($conn,"INSERT INTO reset_pass(email) VALUES('$email')") or die('query failed');
         $insert = mysqli_query($conn,"INSERT INTO usertable(firstname, lastname, user_email, username, phonenumber, password, usertype,token_verified, image) VALUES('$firstname','$lastname', '$email', '$username','$phonenumber','$pass', '$usertype','$token_verified', '$image')") or die('query failed');
         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            sendemail_verify("$username","$email","$token_verified");
            $message[] = 'registered successfully!'; 
            header('location:Signup-Confirmation.php');
         }else{
            $message[] = 'registration failed!';
         }
      }
   }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in Login form</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="path_to_sweetalert2.js"></script>
</head>
<body>
<?php
                  if(isset($message)){
                    foreach($message as $message){
                     echo "<script>
                             swal({
                             title: '$message',
                             icon: 'error',
                             showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                              },
                              hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                              }
                            })
        </script>";
         }
      }
      ?>
      
    <div class="container">
        <a href="Index.php"><img src="/assets/images/VACUNNA logo.png" class="logo"></a>
        <form action="" method="post" enctype="multipart/form-data">
            <h1>CREATING PROFILE</h1>
   
            <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" name="fname" placeholder="Enter your first name" required>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" name="lname" placeholder="Enter your last name" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="uname" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name="pnumber" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password"  placeholder="Enter your password" required>
                </div>
                
                    
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="cpassword" placeholder="Confirm your password" required>
                </div>
                
                  
                <input type="hidden" name="usertype" value="parent">
                <input type="hidden" name="userverify" value="2">

                <div class="input-box">
                    <span class="details">Profile Picture</span>
                        <label class="file-upload">
                            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="profile-picture-input">
                            <span class="file-label"></span>
                         </label>
                         
    </div>     
        
</div>

            <p class="login-link">
                By signing up, you agree to our <a href="#">Terms and Conditions</a>.
            </p>

            <input type="submit" name="submit" value ="Create" class="btn">

            <p class="login-link">
                Already have an account? <a href="LoginForm.php">Click here</a>.
            </p>

        </form>
    </div>

</body>
</html>