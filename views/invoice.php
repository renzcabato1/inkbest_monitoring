    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                      Inventory Data</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Brand
                                                </th>
                                                <th>
                                                    Type
                                                </th>
                                                <th>
                                                    Model
                                                </th><th>
                                                    Quantity
                                                </th><th>
                                                    price
                                                </th><th>
                                                    Branch
                                                </th>
                                               
                                                <th>
                                                   Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
		include ("views/connect.php");	
		$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												
											} 
		$sql = "SELECT * FROM inventory where branch='$branch'";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
			$price1=number_format($row["price"],2);
		
		echo"<tr>
		
		<td >".$row["brand"]."</td>
		<td align='center'>".$row["type"]."</td>
		<td align='center'>".$row["model"]."</td>
		<td align='center'>".$row["quantity"]."</td>
		<td align='center'>".$price1."</td>
	
		<td align='center'>".$row["branch"]."</td>
		";
		if($row['quantity']=='0'){
			echo"
		<td align='center'>
								
												<b>No Stock</b>
		</td></tr>";
		}
		else{
			
		echo"
		<td align='center'><a  href='index.php?page=add_to_invoice&ID=".$row['id']."'>
												<i class='icon-ambulance'></i><b>Add To Invoice</b></td></tr>";
		}
			
		}
		$sql23 = "SELECT * from inventory_branch where branch='$branch' order by branch";
		$result23 = $conn->query($sql23);	
		
		while($row23 = $result23->fetch_assoc()) {
			$renz1=$row23['id'];
			$renz=$row23['inventory_id'];
			$sql10 = "SELECT * FROM inventory where id='$renz'";
$result10 = $conn->query($sql10);	


  while($row10 = $result10->fetch_assoc()) {

	
	   $brand= $row10['brand'];
	$type=  $row10['type'];
	$model=  $row10['model'];
	$qty=  $row10['quantity'];
	$price=  $row10['price'];
		$price1=number_format($price,2);
		
	
	}
	echo"<tr>
		
		<td >".$brand."</td>
		<td align='center'>".$type."</td>
		<td align='center'>".$model."</td>
		<td align='center'>".$row23["qty"]."</td>
		<td align='center'>".$price1."</td>
		<td align='center'>".$row23['branch']."</td>
		";
		if($row23['qty']>=1){
		echo"<td align='center'><a  href='index.php?page=add_to_invoice&ID=".$renz1."'>
												<i class='icon-ambulance'></i><b>Add To Invoice</b></td>
		</tr>";
		}
		else{
			echo"<td  align='center'>
		
								<b>No Stock</b>
		</a>
		</td>
		</tr>";
		}
		
		}
		
		
			
		
		?>
                                           
                                        </tbody>
                                        
                                    </table>
                              

						  <!--/.module-->
                    
                        <!--/.content-->
                 
                    <!--/.span9-->
            	</div>
            	</div>
            	             <div class="module">
                                <div class="module-head">
                                    <h3>
                                      For Invoice<td><a href="index.php?page=done_invoice" class="btn btn-success">DONE INVOICE</a></td></h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Brand
                                                </th>
                                                <th>
                                                    Type
                                                </th>
                                                <th>
                                                    Model
                                                </th>
												<th>
                                                    Quantity Ordered
                                                </th>
												<th>
                                                    Price
                                                </th><th>
                                                    Total Amount
                                                </th>
												
                                               
                                                <th>
                                                   Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
		include ("views/connect.php");	
		$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												
											} 
		$sql = "SELECT * FROM inventory_invoice where employee_id='$id_employee' and done='0'";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
			$inventory_id=$row['inventory_id'];
			$sql5 = "SELECT * FROM inventory where id='$inventory_id'";
		$result5 = $conn->query($sql5);	
		while($row5 = $result5->fetch_assoc()) {
			$price1=number_format($row["price"],2);
		$total=$row['price']*$row['qty'];
			$total1=number_format($total,2);
		
		echo"<tr>
		
		<td >".$row5["brand"]."</td>
		<td align='center'>".$row5["type"]."</td>
		<td align='center'>".$row5["model"]."</td>
		<td align='center'>".$row["qty"]."</td>
		<td align='center'>".$price1."</td>
		<td align='center'>".$total1."</td>
		
		";
		
		
			
		echo"
		<td align='center'><a  href='index.php?page=remove_to_invoice&ID=".$row['id']."'>
												<b>Remove</b></td></tr>";
		
			
		}
		
		
		}
		
		
			
		
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