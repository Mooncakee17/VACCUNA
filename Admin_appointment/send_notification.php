<?php 
include '../Homepage/config.php';
$appt_id = $_POST['notify_appt'];
//Get the user id using appointment id
$select = mysqli_query($conn, "SELECT * FROM appointmenttable WHERE appt_id = $appt_id") or die('query failed');
$get_userid = mysqli_fetch_all($select, MYSQLI_ASSOC);
foreach($get_userid as $value){
	$notif_userid =  $value['userid'];
    $appt_date = $value['appt_date'];
    $appt_time = $value['appt_time'];
}
//update is_notified column
$sql = "UPDATE usertable SET is_notified = 1 WHERE userid = $notif_userid";
mysqli_query($conn, $sql);


require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

// Your Twilio phone number (bought from twilio.com/console)
$twilio_number = '+12568125860';

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = "AC82f1a8e171ff4800faeb0aae6d264101";
$token = "481510161a7aecca17d3eda8ccfa7a08";
$serviceSid = "IS2c1479644f3d239905261ce25fe290da"; 
$client = new Client($sid, $token);
//'+639279424856'
$to_number = '+639764029844';
$content = 'Welcome to Vaccuna, This message is to inform you that you have upcoming Appointment on '.$appt_date.' at '.$appt_time.' This message is system generated Do not reply.';
// Create a notification
try {
    $notification = $client
        ->notify->v1->services($serviceSid)
        ->notifications->create([
            "toBinding" => '{"binding_type":"sms", "address":"' . $to_number . '"}',
            'body' => $content 
        ]);

    echo "Notification SID: " . $notification->sid;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
header('location: ../Admin/Appointment-TAB.php');

?>
