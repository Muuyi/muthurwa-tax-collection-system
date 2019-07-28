<?php
require ('../../fpdf/fpdf.php');
	require_once("../db.php");
	//$con = mysqli_connect('localhost','root','','mcladies');
	class PDF extends FPDF{
		function Header(){
			$this -> SetFont('Arial','B',12);
			$this -> Cell(12);
			$this -> Cell(0,9,'MUTHURWA MARKET COUNTY COUNCIL TAX COLLECTION',0,1,"C");
			$this -> SetFont('Arial','B',10);
			$this -> Cell(0,5,'P.O BOX 43746, NAIROBI KENYA ',0,1,"C");
			$this -> Cell(0,5,'Website:www.muthurwataxsystem.co.ke',0,1,"C");
			$this -> Cell(0,5,'Email:admin@muthurwa.co.ke/customercare@muthurwa.co.ke ',0,1,"C");
			$this -> Cell(0,5,'Phone:+2547-873-453-835/+254747-527-428',0,1,"C");
			$this -> SetFont('Arial','BU',12);
			$this -> Cell(0,5,'RECEIPT',0,1,"C");
		}
		function Footer(){
			$this -> SetY(-15);
			$this -> SetFont('Arial','',8);
			$this -> Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0, 'C');
		}
	}
	$pdf = new PDF('P','mm','A5');
	$pdf -> AliasNbPages('{pages}');
	$pdf -> AddPage();
	$pdf -> SetFont('Arial','',10);
	$pdf -> SetDrawColor(50,50,100);
	$q = "SELECT * FROM tax_payments INNER JOIN businesses ON tax_payments.bs_id=businesses.bs_id WHERE tax_id='".$_GET['tax_id']."'";
	$query = mysqli_query($con, $q);
	while($row = mysqli_fetch_array($query)){
		$pdf -> SetFont('Arial','b','10','C');
		$pdf -> Cell(40,5,'Business Name',0,0);
		$pdf -> Cell(5,5,':',0,0);
		$pdf -> SetFont('Arial','','10','C');
		$pdf -> Cell(22,5,$row['bs_name'],0,1);
		$pdf -> SetFont('Arial','b','10','C');
		$pdf -> Cell(40,5,'Business Owner',0,0);
		$pdf -> Cell(5,5,':',0,0);
		$pdf -> SetFont('Arial','','10','C');
		$pdf -> Cell(22,5,$row['own_name'],0,1);
		$pdf -> SetFont('Arial','b','10','C');
		$pdf -> Cell(40,5,'ID No',0,0);
		$pdf -> Cell(5,5,':',0,0);
		$pdf -> SetFont('Arial','','10','C');
		$pdf -> Cell(22,5,$row['own_id'],0,1);
		$pdf -> SetFont('Arial','b','10','C');
		$pdf -> Cell(40,5,'Phone NO',0,0);
		$pdf -> Cell(5,5,':',0,0);
		$pdf -> SetFont('Arial','','10','C');
		$pdf -> Cell(22,5,$row['own_phone'],0,1);
		$pdf -> SetFont('Arial','b','10','C');
		$pdf -> Cell(40,5,'Email',0,0);
		$pdf -> Cell(5,5,':',0,0);
		$pdf -> SetFont('Arial','','10','C');
		$pdf -> Cell(22,5,$row['own_email'],0,1);
		$pdf -> SetFont('Arial','b','10','C');
		$pdf -> Cell(40,5,'Tax amount',0,0);
		$pdf -> Cell(5,5,':',0,0);
		$pdf -> SetFont('Arial','','10','C');
		$pdf -> Cell(22,5,'Kshs.'.$row['tax_amount'],0,1);
		$pdf -> SetFont('Arial','b','10','C');
		$pdf -> Cell(40,5,'Payment mode',0,0);
		$pdf -> Cell(5,5,':',0,0);
		$pdf -> SetFont('Arial','','10','C');
		$pdf -> Cell(22,5,$row['pay_mode'],0,1);
		$pdf -> SetFont('Arial','b','10','C');
		$pdf -> Cell(40,5,'Payment date',0,0);
		$pdf -> Cell(5,5,':',0,0);
		$pdf -> SetFont('Arial','','10','C');
		$pdf -> Cell(22,5,$row['pay_date'],0,1);
		$pdf -> SetFont('Arial','b','10','C');
		$pdf -> Cell(40,5,'Date',0,0);
		$pdf -> Cell(5,5,':',0,0);
		$pdf -> SetFont('Arial','','10','C');
		$pdf -> Cell(22,5,date('d-m-Y'),0,1);
		////////////////////////////////////////
			$pdf -> SetFont('Arial','BI','10','C');
			$pdf -> Cell(0,5,'MUTHURWA MARKET COUNTY COUNCIL TAX COLLECTION',0,1,'C');
			$pdf -> SetFont('Arial','I','8','C');
			$pdf -> Cell(0,3,'Website:www.muthurwataxsystem.co.ke',0,1,'C');
			$pdf -> Cell(0,3,'Phone:+2547-873-453-835/+254747-527-428',0,0,'C');
	}
	$pdf -> Output();

?>