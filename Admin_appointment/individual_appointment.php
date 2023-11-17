<?php 
include '../Homepage/config.php';



$appt_id = $_POST['appt_id'];

	//Get All appointment Information
	$select = mysqli_query($conn, "SELECT a.*,b.vac_name FROM appointmenttable a 
		LEFT JOIN vaccineinventory b ON b.vacid = a.vacid
		WHERE appt_id = $appt_id ") or die('query failed');
	$appointmenttable = mysqli_fetch_all($select, MYSQLI_ASSOC);

	//Get appointment date
	foreach($appointmenttable as $value1){
		$appointment_date = $value1['appt_date'];
	}

	//Get doctor description
	$select = mysqli_query($conn, "SELECT description FROM business_day a 
		WHERE available_date = '$appointment_date' ") or die('query failed');
	$get_doctor_administer = mysqli_fetch_all($select, MYSQLI_ASSOC);
	foreach($get_doctor_administer as $value2){
		$doctor_administer = $value2['description'];
	}


	foreach($appointmenttable as $value){
		 $response = array(
		 	'status' => 'success', 
		 	'appt_id' =>  $value['appt_id'] , 
		 	'userid' => $value['userid'],
		 	'vacid' => $value['vacid'], 
		 	'appt_time' => $value['appt_time'],
		 	'appt_date' => $value['appt_date'],
		 	'dose' => $value['dose'],
		 	'child_name' => $value['child_name'],
		 	'guardian_name' => $value['guardian_name'],
		 	'contact_number' => $value['contact_number'],
		 	'age' => $value['age'],
		 	'email' => $value['email'],
		 	'vac_name' => $value['vac_name'],
		 	'cid' => $value['cid'],
		 	'doctor' => $doctor_administer 
		 );
	}
	
	// Send a JSON response back to the client
	header('Content-Type: application/json');
	echo json_encode($response);
?>
<!--merge -->