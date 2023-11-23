<?php
include('connection.php');

// Check if the user email is provided
if (isset($_POST['user_email'])) {
    $userEmail = mysqli_real_escape_string($conn, $_POST['user_email']);

    // Your logic to send an email using PHPMailer or another library
    // Example using mail() function:
    $subject = "Account Deactivation";
    $message = "Dear user, your account is scheduled for deactivation.";
    $headers = "From: percii6027@gmail.com"; 

    if (mail($userEmail, $subject, $message, $headers)) {
        $response = array('success' => true, 'message' => 'Email sent successfully');
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'message' => 'Error sending email');
        echo json_encode($response);
    }
} else {
    $response = array('success' => false, 'message' => 'User email not provided');
    echo json_encode($response);
}

mysqli_close($conn);
?>
