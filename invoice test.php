<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ensure the correct path to the FPDF library
require('fpdf/fpdf.php');

// Create instance of FPDF class
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 20);

// Add cells with content
$pdf->Cell(71, 10, '', 0, 0); // Empty cell for spacing
$pdf->Cell(59, 5, 'Invoice', 0, 0); // Main title
$pdf->Cell(59, 10, '', 0, 1); // Empty cell for line break

// Output the PDF to the browser
$pdf->Output();
?>
