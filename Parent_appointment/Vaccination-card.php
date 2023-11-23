<?php
require('../fpdf/fpdf.php');
include '../Homepage/config.php';
$cid = $_POST['cid_pdf'];

// get the information of child
$select = "SELECT * FROM childtable a WHERE a.cid = $cid";
$result = $conn->query($select); 


$pdf = new FPDF('P','mm', "A4");
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 25); 
  
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

$pdf->SetFont('Arial', 'B', 12);
while($row = $result->fetch_object()){
    $id = $row->cid;
    $name = $row->child_firstname." ".$row->child_middlename." ".$row->child_lastname;
    $age = $row->child_age;
    $birthdate = $row->birthdate;
    }
$pdf->Cell(20,8,"ID : ",0);
$pdf->Cell(40,8,$id,0);
$pdf->Ln();
$pdf->Cell(20,8,"Name : ",0);
$pdf->Cell(40,8,$name,0);
$pdf->Ln();
$pdf->Cell(20,8,"Age : ",0);
$pdf->Cell(40,8,$age,0);
$pdf->Ln();
$pdf->Cell(30,8,"Birthdate : ",0);
$pdf->Cell(60,8,$birthdate,0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(193, 229, 252);
$pdf->Cell(60, 10, 'VACCINE NAME', 1, 0, 'C');
$pdf->Cell(30, 10, 'STATUS', 1, 0, 'C');
$pdf->Cell(40, 10, 'DATE', 1, 0, 'C');
$pdf->Cell(60, 10, 'ADMINISTRATOR NAME', 1, 1, 'C');

// Set font for table body
$pdf->SetFont('Arial', '', 9);
$bcg = mysqli_query($conn, "SELECT DISTINCT
CASE
WHEN a.status = 2 AND c.appt_date is not null THEN 'YES'
WHEN c.appt_date is not null THEN 'YES'
WHEN c.appt_date is null THEN ''
WHEN a.status = 0 AND c.appt_date is null THEN 'NO'
WHEN a.status = 1 AND c.appt_date is null THEN 'NO'
END AS vaccine_status,
a.vac_name,
c.vaccine_administer,
c.appt_date
FROM child_vaccine_status a
LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name AND b.active = 1
LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date is not null
WHERE a.cid = '$cid' AND b.vac_name = 'BCG'
ORDER BY
CASE
WHEN a.status = 2 AND c.appt_date is not null AND c.vaccine_administer is not null THEN 0
WHEN a.status = 0 AND c.appt_date is not null AND c.vaccine_administer is not null THEN 2
WHEN a.status = 1 AND c.appt_date is not null AND c.vaccine_administer is not null THEN 1
END DESC");

$bcg_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC);

// Initialize FPDF
// Set font and title

// Set font for table data
$pdf->SetFont('Arial', '', 10);


foreach ($bcg_record as $value) {
    $pdf->Cell(60, 10, $value['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $value['vaccine_status'], 1, 0,  'C');
    $pdf->Cell(40, 10, $value['appt_date'], 1, 0,  'C');
    $pdf->Cell(60, 10, $value['vaccine_administer'], 1, 1,  'C');
}
$bcg = mysqli_query($conn, "SELECT DISTINCT     
            CASE
            WHEN a.status = 2 AND c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 0 AND c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 1 AND c.appt_date IS NULL THEN 'NO'
            END AS vaccine_status,
            a.vac_name,
            c.vaccine_administer,
            c.appt_date
            FROM child_vaccine_status a 
            LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name 
            LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date IS NOT NULL
            WHERE a.cid = '$cid' AND b.vac_name LIKE '%HepB%'
            ORDER BY vac_name ASC") or die('query failed');
$hepb_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC); 
$pdf->Cell(0, 10, 'Hepatitis B Vaccine', 1, 1, 'C');

foreach ($hepb_record as $value) {
    $pdf->Cell(60, 10, $value['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $value['vaccine_status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $value['appt_date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $value['vaccine_administer'], 1, 1, 'C');
}// Add table data

$bcg = mysqli_query($conn, "SELECT DISTINCT     
        CASE
        WHEN a.status = 2 AND c.appt_date IS NOT NULL THEN 'YES'
        WHEN c.appt_date IS NOT NULL THEN 'YES'
        WHEN c.appt_date IS NULL THEN 'NO'
        WHEN a.status = 0 AND c.appt_date IS NULL THEN 'NO'
        WHEN a.status = 1 AND c.appt_date IS NULL THEN 'NO'
        END AS vaccine_status,
        a.vac_name,
        c.vaccine_administer,
        c.appt_date
        FROM child_vaccine_status a 
        LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name 
        LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date IS NOT NULL
        WHERE a.cid = '$cid' AND b.vac_name LIKE '%DTaP%'
        ORDER BY vac_name ASC") or die('query failed');
$dtap_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC);  

$pdf->Cell(0, 10, 'DTaP Vaccine', 1, 1, 'C');

foreach ($dtap_record as $value) {
    $pdf->Cell(60, 10, $value['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $value['vaccine_status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $value['appt_date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $value['vaccine_administer'], 1, 1, 'C');
}
// Get HiB1 vaccine record
$bcg = mysqli_query($conn, "SELECT DISTINCT     
        CASE
        WHEN a.status = 2 AND c.appt_date IS NOT NULL THEN 'YES'
        WHEN c.appt_date IS NOT NULL THEN 'YES'
        WHEN c.appt_date IS NULL THEN 'NO'
        WHEN a.status = 0 AND c.appt_date IS NULL THEN 'NO'
        WHEN a.status = 1 AND c.appt_date IS NULL THEN 'NO'
        END AS vaccine_status,
        a.vac_name,
        c.vaccine_administer,
        c.appt_date
        FROM child_vaccine_status a 
        LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name 
        LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date IS NOT NULL
        WHERE a.cid = '$cid' AND b.vac_name LIKE '%HiB%'
        ORDER BY vac_name ASC") or die('query failed');
$hib_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC);  

$pdf->Cell(0, 10, 'HiB Vaccine', 1, 1, 'C');
foreach ($hib_record as $value) {
    $pdf->Cell(60, 10, $value['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $value['vaccine_status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $value['appt_date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $value['vaccine_administer'], 1, 1, 'C');
}

$bcg = mysqli_query($conn, "SELECT DISTINCT     
            CASE
            WHEN a.status = 2 AND c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 0 AND c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 1 AND c.appt_date IS NULL THEN 'NO'
            END AS vaccine_status,
            a.vac_name,
            c.vaccine_administer,
            c.appt_date
            FROM child_vaccine_status a 
            LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name 
            LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date IS NOT NULL
            WHERE a.cid = '$cid' AND b.vac_name LIKE '%IPV%'
            ORDER BY vac_name ASC") or die('query failed');
$ipv_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC); 
$pdf->Cell(0, 10, 'IPV VACCINE', 1, 1, 'C');
foreach ($ipv_record as $row) {
    $pdf->Cell(60, 10, $row['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['vaccine_status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['appt_date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['vaccine_administer'], 1, 1, 'C');
}
$bcg = mysqli_query($conn, "SELECT DISTINCT     
            CASE
            WHEN a.status = 2 AND c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 0 AND c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 1 AND c.appt_date IS NULL THEN 'NO'
            END AS vaccine_status,
            a.vac_name,
            c.vaccine_administer,
            c.appt_date
            FROM child_vaccine_status a 
            LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name 
            LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date IS NOT NULL
            WHERE a.cid = '$cid' AND b.vac_name LIKE '%PCV%'
            ORDER BY vac_name ASC") or die('query failed');
$pcv_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC);
$pdf->Cell(0, 10, 'PCV VACCINE', 1, 1, 'C');
foreach ($pcv_record as $row) {
    $pdf->Cell(60, 10, $row['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['vaccine_status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['appt_date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['vaccine_administer'], 1, 1, 'C');
}
$bcg = mysqli_query($conn, "SELECT DISTINCT     
            CASE
            WHEN a.status = 2 AND c.appt_date is not null THEN 'YES'
            WHEN c.appt_date is not null THEN 'YES'
            WHEN c.appt_date is null THEN 'NO'
            WHEN a.status = 0 AND c.appt_date is null THEN 'NO'
            WHEN a.status = 1 AND c.appt_date is null THEN 'NO'
            END AS vaccine_status,
            a.vac_name,
            c.vaccine_administer,
            c.appt_date
            FROM child_vaccine_status a 
            LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name 
            LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date is not null
            WHERE a.cid = '$cid' AND b.vac_name like '%Rota%'
            ORDER BY 
            vac_name asc") or die('query failed');
$rota_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC);
$pdf->Cell(0, 10, 'Rota VACCINE', 1, 1, 'C');
foreach ($rota_record as $row) {
    $pdf->Cell(60, 10, $row['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['vaccine_status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['appt_date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['vaccine_administer'], 1, 1, 'C');
}
$bcg = mysqli_query($conn, "SELECT DISTINCT     
            CASE
            WHEN a.status = 2 AND c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 0 AND c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 1 AND c.appt_date IS NULL THEN 'NO'
            END AS vaccine_status,
            a.vac_name,
            c.vaccine_administer,
            c.appt_date
            FROM child_vaccine_status a 
            LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name 
            LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date IS NOT NULL
            WHERE a.cid = '$cid' AND b.vac_name LIKE '%MMR%'
            ORDER BY vac_name ASC") or die('query failed');
$mmr_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC);  
$pdf->Cell(0, 10, 'MMR VACCINE', 1, 1, 'C');
foreach ($mmr_record as $row) {
    $pdf->Cell(60, 10, $row['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['vaccine_status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['appt_date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['vaccine_administer'], 1, 1, 'C');
}
$bcg = mysqli_query($conn, "SELECT DISTINCT     
            CASE
            WHEN a.status = 2 AND c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 0 AND c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 1 AND c.appt_date IS NULL THEN 'NO'
            END AS vaccine_status,
            a.vac_name,
            c.vaccine_administer,
            c.appt_date
            FROM child_vaccine_status a 
            LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name 
            LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date IS NOT NULL
            WHERE a.cid = '$cid' AND b.vac_name LIKE '%Influenza%'
            ORDER BY vac_name ASC") or die('query failed');
$influenza_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC);  
$pdf->Cell(0, 10, 'INFLUENZA VACCINE', 1, 1, 'C');
foreach ($influenza_record as $row) {
    $pdf->Cell(60, 10, $row['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['vaccine_status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['appt_date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['vaccine_administer'], 1, 1, 'C');
}
$bcg = mysqli_query($conn, "SELECT DISTINCT     
            CASE
            WHEN a.status = 2 AND c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NOT NULL THEN 'YES'
            WHEN c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 0 AND c.appt_date IS NULL THEN 'NO'
            WHEN a.status = 1 AND c.appt_date IS NULL THEN 'NO'
            END AS vaccine_status,
            a.vac_name,
            c.vaccine_administer,
            c.appt_date
            FROM child_vaccine_status a 
            LEFT JOIN vaccineinventory b ON a.vac_name = b.vac_name 
            LEFT JOIN appointmenttable c ON c.vacid = b.vacid AND c.cid = '$cid' AND c.appt_date IS NOT NULL
            WHERE a.cid = '$cid' AND b.vac_name LIKE '%Hepa%'
            ORDER BY vac_name ASC") or die('query failed');
$hepa_record = mysqli_fetch_all($bcg, MYSQLI_ASSOC);  
$pdf->Cell(0, 10, 'HepA VACCINE', 1, 1, 'C');
foreach ($hepa_record as $row) {
    $pdf->Cell(60, 10, $row['vac_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['vaccine_status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['appt_date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['vaccine_administer'], 1, 1, 'C');
}

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('arial', 'B', 10); 
$pdf->Cell(70, 10, 'SIGNATURE:', 1, 0, 'L');
$pdf->Cell(120, 10, '', 1, 1, 'R');
$pdf->Cell(70, 10, 'ADMINISTRATOR:', 1, 0, 'L'); // Add upper line here
$pdf->Cell(120, 10, 'CHRISTIAN YVES CONANAN', 1, 1, 'R'); // Add upper line here
$pdf->Ln();
$pdf->SetFont('Times', 'I', 10); 
$pdf->Cell(0, 10, "This vaccination card is the track record of your child's immunization history. Please keep it in a safe place.", 0, 1, 'C');
$pdf->Cell(0, 10, "Please note that this vaccination card does not replace a written statement of immunization from your child's healthcare provider", 0, 0, 'C');

$pdf->Ln();

$image='../assets/images/VACUNNA logo.png';

$pdf->Image($image, 90, 250, 30);
$pdf->Output();

?>
