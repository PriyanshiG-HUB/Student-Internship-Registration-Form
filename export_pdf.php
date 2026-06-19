<?php
session_start();
if(
!isset($_SESSION['role']) || $_SESSION['role']!="admin"){
    die("Access Denied");
}
<?php
require('fpdf/fpdf.php');

$conn = new mysqli("localhost","root","","internshipregisteration");
$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',12);

$pdf->Cell(20,10,'ID',1);
$pdf->Cell(50,10,'Name',1);
$pdf->Cell(60,10,'Email',1);
$pdf->Cell(20,10,'CGPA',1);

$pdf->Ln();

$result = $conn->query("SELECT * FROM internship_db");

while($row = $result->fetch_assoc()){

$pdf->Cell(20,10,$row['id'],1);

$pdf->Cell(50,10,$row['first_name']." ".$row['last_name'],1);

$pdf->Cell(60,10,$row['email'],1);

$pdf->Cell(20,10,$row['cgpa'],1);

$pdf->Ln();
}

$pdf->Output();
?>