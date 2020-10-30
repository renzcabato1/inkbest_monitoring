<?php

require('../ink@best_print/fpdf.php');  

$from=$_GET['from'];
$to=$_GET['to'];

$pdf=new fpdf();

$pdf->Addpage();

$pdf->SetFont("Arial","B","14");
	$pdf->Cell(38,9,"SALES REPORT MAIN BRANCH",0,0,"");
	$pdf->Image('../assets/ico/Logo.png',170,5,25,25);
	$pdf->Cell(90,9,"",0,1,"");
	$pdf->SetFont("Arial","","8");
	$pdf->Cell(38,7,"FROM: $from TO: $to ",0,1,"");
	$pdf->Cell(38,5,"",0,1,"");
	$pdf->Cell(30,5,"Brand",1,0,"C");
	$pdf->Cell(30,5,"Model",1,0,"C");
	$pdf->Cell(30,5,"Type",1,0,"C");
	$pdf->Cell(30,5,"Inventory",1,0,"C");
	$pdf->Cell(20,5,"Qty Sold",1,0,"C");
	$pdf->Cell(20,5,"Price",1,0,"C");
	$pdf->Cell(30,5,"Total",1,1,"C");

								  									
 include ("../views/connect.php");
$sql2 = "SELECT * FROM invoice_history where  branch='MAIN' and date_invoice between '$from' and '$to'";
$result2 = $conn->query($sql2);	
$total_charge=0;
$total_charge1=0;
$inventory=0;
$qty_sold=0;
$total_charge25=0;
$total_charge2=0;
while($row2 = $result2->fetch_assoc()) {
	
	
	$id2=$row2['id'];
	$service_charge=$row2['service_charge'];
	
	$total_charge=$total_charge+$service_charge;
	$total_charge25=number_format($total_charge,2);
}
$sql3 = "SELECT DISTINCT inventory_id,price FROM inventory_invoice where branch='MAIN' and  date_invoice between '$from' and '$to'";
$result3 = $conn->query($sql3);	
while($row3 = $result3->fetch_assoc()) {
	$id_mo=$row3['inventory_id'];
	$price=$row3['price'];
	$sql4= "SELECT SUM(qty) from inventory_invoice where inventory_id='$id_mo' and branch='MAIN'  and date_invoice between '$from' and '$to'";
	$result4 = $conn->query($sql4);
while($row4 = $result4->fetch_assoc()) {
	$total_qty=$row4['SUM(qty)'];
	
}
	$sql5= "SELECT * from inventory where id='$id_mo'";
	$result5 = $conn->query($sql5);
	while($row5 = $result5->fetch_assoc()) {
	$brand=$row5['brand'];
	$model=$row5['model'];
	$type=$row5['type'];
	$quantity=$row5['quantity'];
	}
	$sql6= "SELECT SUM(qty) from inventory_branch where  branch='MAIN' and inventory_id='$id_mo'";
	$result6 = $conn->query($sql6);
	while($row6 = $result6->fetch_assoc()) {
	$qty1=$row6['SUM(qty)'];
	}
	
	$total_qty1=$quantity+$qty1;
	$total_amount=$total_qty*$price;
	$price1=number_format($price,2);
	$total_amount1=number_format($total_amount,2);
	$pdf->Cell(30,5,"$brand",1,0,"C");
	$pdf->Cell(30,5,"$model",1,0,"C");
	$pdf->Cell(30,5,"$type",1,0,"C");
	$pdf->Cell(30,5,"$total_qty1",1,0,"C");
	$pdf->Cell(20,5,"$total_qty",1,0,"C");
	$pdf->Cell(20,5,"$price1",1,0,"C");
	$pdf->Cell(30,5,"$total_amount1",1,1,"C");

	$total_charge1=$total_charge+$total_amount;
	$inventory=$inventory+$total_qty1;
	$qty_sold=$qty_sold+$total_qty;
	$total_charge2=number_format($total_charge1,2);
	
}
$total_charge1_charge=$total_charge1+$total_charge;
$total_charge1_charge25=number_format($total_charge1_charge,2);
	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(30,5,"Total",1,0,"C");

	$pdf->Cell(30,5,"$inventory",1,0,"C");
	$pdf->Cell(20,5,"$qty_sold",1,0,"C");
	$pdf->SetFont("Arial","","6");
	$pdf->Cell(20,5," Total Amount Sold",1,0,"C");
	$pdf->SetFont("Arial","","8");
	$pdf->Cell(30,5,"$total_charge2",1,1,"C");


	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(20,5,"",0,0,"C");
	$pdf->SetFont("Arial","","6");
	$pdf->Cell(20,5,"Total Service Charge",1,0,"C");
	$pdf->SetFont("Arial","","8");
	$pdf->Cell(30,5,"$total_charge25",1,1,"C");



	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(30,5,"",0,0,"C");
	$pdf->Cell(20,5,"",0,0,"C");
	$pdf->Cell(20,5,"Total",1,0,"C");
	$pdf->Cell(30,5,"$total_charge1_charge25",1,1,"C");

	

			
$pdf->Output();
?>
