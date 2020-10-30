<?php
require("../ink@best_print/fpdf.php"); 

$date_today = date("Y-m-d");
$pdf=new fpdf();


$pdf->Addpage();
$pdf->SetFont("Arial","","15");
$pdf->Cell(196,35,"INVENTORY of INK@BEST DATE PRINTED: $date_today",1,1,"L");
$pdf->Image('../assets/ico/Logo.png',160,10,35,35);
$pdf->SetFont("Arial","","7");
$pdf->Cell(30,4,"BRAND",1,0,"C");
$pdf->Cell(30,4,"TYPE",1,0,"C");
$pdf->Cell(30,4,"MODEL",1,0,"C");
$pdf->Cell(17,4,"QTY MAIN",1,0,"C");
$pdf->Cell(17,4,"QTY LIPA",1,0,"C");
$pdf->Cell(17,4,"QTY BAUAN",1,0,"C");
$pdf->Cell(20,4,"TOTAL QTY",1,0,"C");
$pdf->Cell(35,4,"PRICE",1,1,"C");

     include ("../views/connect.php");	
		$sql = "SELECT * FROM inventory";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
		$price=number_format($row['price'],2);
		$brand=$row["brand"];
		$type=$row["type"];
		$model=$row["model"];
		$quantity=$row["quantity"];
		$id=$row["id"];
		$qty_lipa=0;
		$qty_bauan=0;
		$sql1 = "SELECT * FROM inventory_branch where branch='LIPA' and inventory_id='$id'";
		$result1 = $conn->query($sql1);
		while($row1 = $result1->fetch_assoc()) {
			$qty_lipa=$row1["qty"];
		}
		$sql2 = "SELECT * FROM inventory_branch where branch='BAUAN' and inventory_id='$id'";
		$result2 = $conn->query($sql2);
		while($row2 = $result2->fetch_assoc()) {
			$qty_bauan=$row2["qty"];
		}
		$total_qty=$qty_lipa+$qty_bauan+$quantity;
		$pdf->Cell(30,4,"$brand",1,0,"L");
		$pdf->Cell(30,4,"$type",1,0,"L");
		$pdf->Cell(30,4,"$model",1,0,"L");
		$pdf->Cell(17,4,"$quantity",1,0,"C");
		$pdf->Cell(17,4,"$qty_lipa",1,0,"C");
		$pdf->Cell(17,4,"$qty_bauan",1,0,"C");
		$pdf->Cell(20,4,"$total_qty",1,0,"C");
		$pdf->Cell(35,4,"$price",1,1,"R");
		}
      

$pdf->Output('');



?>
