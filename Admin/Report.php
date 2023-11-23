<?php
require('../fpdf/fpdf.php');
include '../Homepage/config.php';
$vaccine_name = $_GET['vaccine_name'] ?? '';
    $status = $_GET['status'] ?? '';

    // Prepare SQL query based on selected options
    $sql = "SELECT * FROM appointmenttable a
            LEFT JOIN vaccineinventory b ON a.vacid = b.vacid ";

    if (!empty($vaccine_name) && !empty($status)) {
        $sql .= "WHERE b.vac_name LIKE '%$vaccine_name%' AND a.appointment_status = '$status' ";
    } elseif (!empty($vaccine_name)) {
        $sql .= "WHERE b.vac_name LIKE '%$vaccine_name%' ";
    } elseif (!empty($status)) {
        $sql .= "WHERE a.appointment_status = '$status' ";
    }

    $sql .= "ORDER BY appointment_status ASC";

    // Execute the SQL query
    $select = mysqli_query($conn, $sql) or die('query failed');

    // Create a new PDF document
    require('fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font and other styling
    $pdf->SetFont('Arial', 'B', 12);
    
    // Add data to the PDF
    $pdf->Cell(40, 10, 'ID');
    $pdf->Cell(40, 10, 'CHILD NAME');
    $pdf->Cell(40, 10, 'VACCINE NAME');
    $pdf->Cell(40, 10, 'STATUS');
    $pdf->Cell(40, 10, 'DATE');
    $pdf->Cell(40, 10, 'ADMINISTRATOR');
    $pdf->Ln();

    // Loop through the fetched data and add it to the PDF
    foreach ($select as $row) {
        $pdf->Cell(40, 10, $row['cid']);
        $pdf->Cell(40, 10, $row['child_name']);
        $pdf->Cell(40, 10, $row['vac_name']);
        $statusText = '';
        switch ($row['appointment_status']) {
            case 1:
                $statusText = 'For Approval';
                break;
            case 2:
                $statusText = 'Completed';
                break;
            case 3:
                $statusText = 'Missed';
                break;
            case 4:
                $statusText = 'Consultation';
                break;
            case 5:
                $statusText = 'Walk-In';
                break;
            default:
                $statusText = $row['appointment_status'];
                break;
        }
        $pdf->Cell(40, 10, $statusText);
        $pdf->Cell(40, 10, $row['appt_date']);
        $pdf->Cell(40, 10, $row['vaccine_administer']);
        $pdf->Ln();
    }


// Framed rectangular area 

  
// Set it new line 
$pdf->Ln(); 
$image='../assets/images/VACUNNA logo.png';

$pdf->Image($image, 10, 10, 60);
// Set font format and font-size 
$pdf->SetFont('Times', 'B', 13); 
// Get the current date
$currentDate = date('Y-m-d');
$pdf->Cell(280, 5, '', 0, 1, 'C');
// Add the current date to the PDF
$pdf->Cell(190, 5, 'Date: ' . $currentDate, 0, 1, 'R');

// Framed rectangular area 

// Set font for header
$pdf->SetFont('Arial', 'B', 9);

$pdf->Cell(190, 7, '1016 Anonas, Santa Mesa, Maynila,', 0, 1, 'R'); 
$pdf->Cell(190, 5, ' Kalakhang Maynila', 0, 1, 'R'); 
$pdf->Cell(280, 5, '', 0, 1, 'C'); 
$pdf->Cell(280, 5, '', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(190, 5, 'VACCINATION CARD', 0, 1, 'C'); 
$pdf->Ln();



?>