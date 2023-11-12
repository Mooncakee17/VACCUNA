<?php
session_start();
include('config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

//Resend email function
function resend_email_verify($username, $email, $token_verified)
{
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
    $mail->Subject = "Resend - Email Verification from VACCUNA";
    $email_template ="
    <h2> You have registered with VACCUNA </h2>
    <h5> Verify your email address to Login with the below given link </h5>
    <br/> <br/>
    <a href='http://localhost/VACCUNA/Homepage/verify-email.php?token=$token_verified'> Click Me </a>
    ";

    $mail ->Body =$email_template;
    $mail ->send(); 
} //Resend email condition
if(isset($_POST['submitemail']))
{
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $email_query ="SELECT * FROM usertable WHERE user_email= '$email' LIMIT 1";
        $email_query_run = mysqli_query($conn, $email_query);

        if(mysqli_num_rows($email_query_run) > 0)
        {
            $row = mysqli_fetch_array($email_query_run);
            if($row['status_verified'] =="0")
            {
                $username = $row['username'];
                $email = $row['user_email'];
                $token_verified['token_verified'];

                resend_email_verify($username,$email,$token_verified);
                $_SESSION['status']= "Verification email link has been sent to your email address.";
                header("Location: LoginForm.php");
                exit(0);
            }
            else{
                $_SESSION['status']= "Email already verified. Please Log in";
                header("Location: resend-email.php");
                exit(0);
            }
        }
        else{
            $_SESSION['status']= "Email is not registered. Please register first";
            header("Location: SignUp.php");
            exit(0);
        }


    }
    else
    {
        $_SESSION['status']= "Please enter the email field";
        header("Location: resend-email.php");
        exit(0);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in Login form</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        if(isset($_POST['status']))
        {
            ?>
            <div class="alert alert-success">
                <h5><?= $_SESSION['status']; ?></h5>
            </div>
         <?php
        unset($_SESSION['status']);
    } ?>

    <div class="wrapper">
        
        <a href="Index.php"><img src="../assets/images/VACUNNA logo.png" class="logo"></a>

        <form action="" method="post" enctype="multipart/form-data">
                
        <center> <h1>Resend Email Verification</h1> </center>
      
        <div class="input-box">
            <center>   <input type="text" name="email" placeholder="Enter your email address" required> </center>
            <input type="submit" name="submitemail" value="Resend" class="btn">
        </div>


        </form>
    </div>

</body>
</html>