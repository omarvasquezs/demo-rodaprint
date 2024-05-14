<?php
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');

// Retrieve form data
$serie = $_POST['serie'];
$fechaEmision = $_POST['fechaEmision'];
$fechaEmision = date('d/m/Y', strtotime($fechaEmision));
$destinatario = $_POST['destinatario'];
$destinoDireccion = $_POST['destinoDireccion'];

// ... and so on for the rest of the form fields

// Load the HTML template file
$html = file_get_contents('template.php');

// Replace placeholders with actual data
$html = str_replace('{{destinatario}}', $destinatario, $html);
$html = str_replace('{{fechaEmision}}', $fechaEmision, $html);

// Create a new TCPDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('RODAPRINT CORPORACION GRAFICA EIRL');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Guia de Remisión Remitente Electrónica');
$pdf->SetSubject('Guia de Remisión');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Add a page
$pdf->AddPage();

// Set font and font size
$pdf->SetFont('helvetica', '', 10);

// Output the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF
$pdf->Output('guia_remision.pdf', 'I');
