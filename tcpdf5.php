<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


$pdf->AddPage();

$pdf->setFontSubsetting(false);

$pdf->SetFont('times', 'B', 45);

$pdf->Write(0, 'Font Types', '', 0, 'C', 1, 0, false, false, 0);

$pdf->Ln(10);

$pdf->SetFont('courier', '', 28);
$html = <<<EOD
<h3>The greatest glory in living lies not in never falling, but in rising every time we fall.</h3>
<p>- Nelson Mandela</p>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Ln(20);


$pdf->SetFont('helvetica', 'I', 18);
$html = <<<EOD
<h3>The way to get started is to quit talking and begin doing.</h3>
<p>- Walt Disney</p>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output();
