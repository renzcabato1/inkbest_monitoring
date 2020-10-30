		<div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       ALL BRANCH SALES REPORT<td><?php
	echo'<a href="ink@best_print/sales_report_view_all.php?from='.$from.'&to='.$to.'" target="_blank" class="btn btn-success">'?>Print</a></td></h3>
                                </div>
								
                                <div class="module-body table">
								<h5><?php echo"FROM: $from To $to"?></h5>
                                   <table class="table table-bordered">
								  <thead>
									<tr>
									  <th>Brand</th>
									  <th>Model</th>
									  <th>Type</th>
									  <th>Inventory</th>
									  <th>Sold Qty</th>
									  <th>Price</th>
									  <th>Total Amount</th>
									</tr>
								  </thead>
								  <tbody>
									<?php
								  									
include ("views/connect.php");	
$sql2 = "SELECT * FROM invoice_history where date_invoice between '$from' and '$to'";
$result2 = $conn->query($sql2);	
$total_charge=0;
$total_charge1=0;
$total_charge25=0;
$inventory=0;
$qty_sold=0;
while($row2 = $result2->fetch_assoc()) {
	
	
	$id2=$row2['id'];
	$service_charge=$row2['service_charge'];
	
	$total_charge=$total_charge+$service_charge;
	$total_charge25=number_format($total_charge,2);
	
}
$sql3 = "SELECT DISTINCT inventory_id,price FROM inventory_invoice where date_invoice between '$from' and '$to'";
$result3 = $conn->query($sql3);	
while($row3 = $result3->fetch_assoc()) {
	$id_mo=$row3['inventory_id'];
	$price=$row3['price'];
	$sql4= "SELECT SUM(qty) from inventory_invoice where inventory_id='$id_mo' and date_invoice between '$from' and '$to'";
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
	$sql6= "SELECT SUM(qty) from inventory_branch where inventory_id='$id_mo'";
	$result6 = $conn->query($sql6);
	while($row6 = $result6->fetch_assoc()) {
	$qty1=$row6['SUM(qty)'];
	}
	
	$total_qty1=$quantity+$qty1;
	$total_amount=$total_qty*$price;
	$price1=number_format($price,2);
	$total_amount1=number_format($total_amount,2);
	echo"<tr>
									  <td>$brand</td>
									  <td>$model</td>
									  <td>$type</td>
									  <td>$total_qty1</td>
									   <td>$total_qty</td>
									  <td>&#8369; $price1</td>
									  <td>&#8369; $total_amount1</td>
									 
									
									  
									</tr>";

	$total_charge1=$total_charge1+$total_amount;
	$inventory=$inventory+$total_qty1;
	$qty_sold=$qty_sold+$total_qty;
	$total_charge2=number_format($total_charge1,2);
	
}
$total_charge1_charge=$total_charge1+$total_charge;
$total_charge1_charge25=number_format($total_charge1_charge,2);

echo"<tr>
									  <td colspan='2' align='center'></td>
									  <td colspan='1' align='center'><b>Total</b></td>
									  <td align='center'>$inventory</td>
									  <td align='center'>$qty_sold</td>
									  <td colspan='1' align='center'> Total Amount Sold</td>
									  <td colspan='1'>&#8369; $total_charge2</td>
									  
									</tr>";

echo"<tr>
									  <td colspan='5' align='center'></td>
									  <td colspan='1' align='center'> Total Service Charge</td>
									  <td colspan='1'>&#8369; $total_charge25</td>
									  
									</tr>";
		echo"<tr>
									  <td colspan='5' align='center'></td>
									  <td colspan='1' align='center'>Total</td>
									  <td colspan='1'>&#8369; $total_charge1_charge25</td>
									  
									</tr>";

			?>
			
								  </tbody>
								</table>

                              

						  <!--/.module-->
                    
                        <!--/.content-->
                 
                    <!--/.span9-->
            	</div>
            	</div>
            	</div>
            	</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
   <script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>