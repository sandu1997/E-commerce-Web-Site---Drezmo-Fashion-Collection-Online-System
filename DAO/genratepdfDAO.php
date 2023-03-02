<?php
require_once("connection.php");


require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage("L");

// code for print Heading of tables
$pdf->SetFont('Arial','B',12);	



$pdf->Cell(22,40,'order ID',1);
$pdf->Cell(25,40,'user ID',1);
$pdf->Cell(40,40,'Customer Name',1);
$pdf->Cell(25,40,'Address',1);
$pdf->Cell(25,40,'Contact',1);
$pdf->Cell(25,40,'Product ID',1);
$pdf->Cell(25,40,'Size',1);
$pdf->Cell(25,40,'Quentity',1);
$pdf->Cell(25,40,'Total',1);

//code for print data
$sql = "SELECT order_id,order_user_id,order_shipping_name,order_shipping_address,order_shipping_contact,order_product_id,order_product_size,order_quentity,order_total_price FROM orders";
$query = $sql_connection -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

foreach($results as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Write(40,$column . " |");
} }
$pdf->Output();
?>