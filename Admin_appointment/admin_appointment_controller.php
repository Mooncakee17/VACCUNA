<?php
error_reporting(0);
include '../Homepage/config.php';
$select = mysqli_query($conn, "SELECT a.* FROM appointmenttable a WHERE a.appointment_status = 1 ") or die('query failed');
$appointmenttable = mysqli_fetch_all($select, MYSQLI_ASSOC);


?>