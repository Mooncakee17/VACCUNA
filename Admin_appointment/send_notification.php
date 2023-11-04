<?php 
include '../Homepage/config.php';
$appt_id = $_POST['notify_appt'];
//Get the user id using appointment id
$select = mysqli_query($conn, "SELECT * FROM appointmenttable WHERE appt_id = $appt_id") or die('query failed');
$get_userid = mysqli_fetch_all($select, MYSQLI_ASSOC);
foreach($get_userid as $value){
	$notif_userid =  $value['userid'];
}
//update is_notified column
$sql = "UPDATE usertable SET is_notified = 1 WHERE userid = $notif_userid";
mysqli_query($conn, $sql);




header('location: ../Admin/Appointment-TAB.php');

?>