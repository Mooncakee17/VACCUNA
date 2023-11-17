<?php 
include '../Homepage/config.php';

$cid = $_POST['cid'];
$dose = $_POST['dose'];
$appointment_date = $_POST['appointment_date'];
$userid = $_POST['userid'];
$appt_id = $_POST['appt_id'];
$vacid = $_POST['vacid'];
$vaccine_name = $_POST['vaccine_administer'];
$doctor = $_POST['doctor']; // ito na yung value na papasok sa vaccine_administer sa vaccine table niyo hindi na yung kung sino nag update.
//since pinalay niyo na yung doctor name sa form. ok po

//Get the name of administrator 
$get_admin = mysqli_query($conn, "SELECT concat(firstname,' ',lastname) as admin_administrator FROM usertable WHERE userid = $userid ") or die('query failed');
$admin_list = mysqli_fetch_all($get_admin, MYSQLI_ASSOC);
foreach($admin_list as $value){
	$admin = $value['admin_administrator'];
}


//Get the current count of selected vaccine
$select = mysqli_query($conn, "SELECT stocks FROM vaccineinventory WHERE vacid = $vacid ") or die('query failed');
$stock_count = mysqli_fetch_all($select, MYSQLI_ASSOC);
foreach($stock_count as $value){
	$count = $value['stocks'];
}
//For stock reduction
$newcount = $count-=1;

//Get the table of specific vaccine
$vaccine_table = '';
if($vacid == 1){
$vaccine_table = "vac_bcg_table";
}
else if($vacid == 2 || $vacid == 3 || $vacid == 4){
$vaccine_table = "vac_hepb_table";
}
else if($vacid == 5 || $vacid == 6 || $vacid == 20){
$vaccine_table = "vac_dtop_table";
}
else if($vacid == 7 || $vacid == 8 || $vacid == 22){
$vaccine_table = "vac_hib_table";
}
else if($vacid == 9 || $vacid == 10 || $vacid == 11){
$vaccine_table = "vac_polio_table";
}
else if($vacid == 12 || $vacid == 13 || $vacid == 23){
$vaccine_table = "vac_pcv_table";
}
else if($vacid == 14 || $vacid == 15 || $vacid == 21){
$vaccine_table = "vac_rota_table";
}
else if($vacid == 16 || $vacid == 24){
$vaccine_table = "vac_measles_table";
}
else if($vacid == 17 || $vacid == 25){
$vaccine_table = "vac_influenza_table";
}
else if($vacid == 18 || $vacid == 19){
$vaccine_table = "vac_hepa_table";
}


//Check What dosage
$dosage = 'dose'.$dose;
$dose_date = 'dose'.$dose.'_date';
$dose_administrator = 'dose'.$dose.'_administrator'; 

$result = '';

//check if the CID is existing in table;
$record_count = mysqli_query($conn, "SELECT count(*) as num_rows FROM $vaccine_table a WHERE cid = $cid ") or die('query failed');
$check_for_record = mysqli_fetch_all($record_count, MYSQLI_ASSOC);
foreach($check_for_record as $value){
	$num_rows = $value['num_rows'];
}

//Meaning wala pa laman yung cid ng vax table need muna mag insert
if($num_rows < 1){
		$sql = "INSERT INTO $vaccine_table (cid, $dosage, $dose_date, $dose_administrator) 
		VALUES ($cid, $dose, '$appointment_date', '$doctor')";
		if (mysqli_query($conn, $sql)) {
		    //once insert na yung data update the stocks count in inventory
		    $sql = "UPDATE vaccineinventory SET stocks = $newcount WHERE vacid = $vacid";
		    //After updating the inventory update the appointment status = 0 
		    if(mysqli_query($conn, $sql)){
				$sql = "UPDATE child_vaccine_status SET status = 2 WHERE vac_name = '$vaccine_name'";
				if(mysqli_query($conn, $sql)){
					$sql = "UPDATE appointmenttable SET appointment_status = 2 WHERE appt_id = '$appt_id'";
					mysqli_query($conn, $sql);
					$result = 'success';
				}
		    }
		} else {
		    //echo "Error: " . $sql . "<br>" . mysqli_error($conn); for debuggin
		    $result  = 'error';
		}
}
//meron na siyang record sa vax table so iaupdate nalang yung existing. base sa dosage niya. 
else{
		$sql = "UPDATE $vaccine_table SET $dosage = $dose , $dose_date = '$appointment_date' , $dose_administrator = '$doctor' WHERE cid = $cid ";
		if (mysqli_query($conn, $sql)) {
		    $sql = "UPDATE vaccineinventory SET stocks = $newcount WHERE vacid = $vacid";
		    //After updating the inventory update the appointment status = 0 
		    if(mysqli_query($conn, $sql)){
				$sql = "UPDATE child_vaccine_status SET status = 2 WHERE vac_name = '$vaccine_name'";
				if(mysqli_query($conn, $sql)){
					$sql = "UPDATE appointmenttable SET appointment_status = 2 WHERE appt_id = '$appt_id'";
					mysqli_query($conn, $sql);
					$result = 'success';
				}
		    }
		} else {
		    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		    $result  = 'error';
		}
}




echo $result;


?>
<!--merge -->