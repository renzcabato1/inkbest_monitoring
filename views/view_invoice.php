    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       Invoice <h3>
                                </div>
									

									<br />
									<?php
									$id=$_GET['ID'];
									
include ("views/connect.php");	
$sql = "SELECT * FROM invoice_history where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {

	   $client_name= $row['client_name'];
	$address=  $row['address'];
	$contact_number=  $row['contact_number'];
	$invoice_number=  $row['invoice_number'];
	$service_charge=  $row['service_charge'];
	$id_ko=  $row['id'];
	}
									?>
									<form method='post' class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">Invoice Number</label>
											<div class="controls">
												<input type="text" name='name' id="basicinput" value='<?php echo"$invoice_number";?>' placeholder="Name" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Client Name</label>
											<div class="controls">
												<input type="text" name='name' id="basicinput"  value='<?php echo"$client_name";?>' placeholder="Name" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Contact</label>
											<div class="controls">
												<input type="text" name='username' id="basicinput"  value='<?php echo"$contact_number";?>' placeholder="Username" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Address</label>
											<div class="controls">
												<input type="text" name='password' id="basicinput"  value='<?php echo"$address";?>' placeholder="Password" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Service Charge</label>
											<div class="controls">
												<input type="text" name='password' id="basicinput"  value='<?php echo"$service_charge";?>' placeholder="Password" class="span8" readonly>
											</div>
										</div>
<br />
								<!-- <hr /> -->
								<br />
									<table class="table table-bordered">
								  <thead>
									<tr>
									  <th>Brand</th>
									  <th>Model</th>
									  <th>Type</th>
									  <th>Qty</th>
									  <th>Price</th>
									  <th>Total</th>
									</tr>
								  </thead>
								  <tbody>
								  <?php
								  									
include ("views/connect.php");	
$sql2 = "SELECT * FROM inventory_invoice where invoice_id='$id_ko'";
$result2 = $conn->query($sql2);	

$renz=0;
  while($row2 = $result2->fetch_assoc()) {

	   $inventory_id= $row2['inventory_id'];
	$qty=  $row2['qty'];
	$price=  $row2['price'];
	$employee_id=  $row2['employee_id'];
	$sql1 = "SELECT * FROM accounts where id=".$employee_id;
	$result1 = $conn->query($sql1);

	 while($row1 = $result1->fetch_assoc()) {
		$branch = $row1["branch"];
	}
	
	$sql3 = "SELECT * FROM inventory where id='$inventory_id'";
	$result3 = $conn->query($sql3);	
	 while($row3 = $result3->fetch_assoc()) {
		$brand = $row3["brand"];
		$model = $row3["model"];
		$type = $row3["type"];
	}
	
	
$total=$qty*$price;
	echo"<tr>
									  <td>$brand</td>
									  <td>$model</td>
									  <td>$type</td>
									  <td>$qty</td>
									  <td>$price</td>
									  <td>$total</td>
									 
									</tr>";
									$renz=$renz+$total;
	}
	$renz=$renz+$service_charge;

	echo"<tr><hr></tr><tr>
									  <td></td>
									  <td></td>
									  <td></td>
									  <td></td>
									  <td>Total</td>
									  <td>$renz</td>";
			?>
			
									 
									</tr>
			
									
									
								  </tbody>
								</table>

									</form>
							</div>
						
                
		</div><!--/.container-->
	</div><!--/.wrapper-->
 
</body>