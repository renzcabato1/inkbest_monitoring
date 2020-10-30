    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                      VIEW
									 </h3>
                                </div>
									

									<br />

									<form method='post' class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">Client Name</label>
											<div class="controls">
												<input type="text" name='client_name' id="basicinput" value='<?php echo"$client_name";?>' class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Contact Number</label>
											<div class="controls">
												<input type="text" name='contact_number' value='<?php echo"$contact_number";?>' id="basicinput" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Address</label>
											<div class="controls">
												<input type="text" name='address' value='<?php echo"$address";?>' id="basicinput"  class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Machine Type</label>
											<div class="controls">
												<input type="text" name='machine_type' value='<?php echo"$machine_type";?>' id="basicinput" placeholder="Printer,Laptop,Cpu,etc.." class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Brand</label>
											<div class="controls">
												<input type="text" name='brand' value='<?php echo"$brand";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Model</label>
											<div class="controls">
												<input type="text" name='model' value='<?php echo"$model";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Serial No.</label>
											<div class="controls">
												<input type="text" name='serial_number'  value='<?php echo"$serial_number";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Accessories</label>
											<div class="controls">
												<input type="text" name='accessories' value='<?php echo"$accessories";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Problem Reported</label>
											<div class="controls">
												<input type="text" name='problem_reported' value='<?php echo"$problem_reported";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Assigned Technician</label>
											<div class="controls">
												<input type="text" name='problem_reported' value='<?php $sql1 = "SELECT * FROM accounts where id='$technician_assigned'";
											$result1 = $conn->query($sql1);	
											while($row1 = $result1->fetch_assoc()) 
											{
												$name_employee=$row1['name'];
												
											} echo"$name_employee";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Released By</label>
											<div class="controls">
												<input type="text" name='problem_reported' value='<?php $sql1 = "SELECT * FROM accounts where id='$release_by'";
											$result1 = $conn->query($sql1);	
											while($row1 = $result1->fetch_assoc()) 
											{
												$name_employee=$row1['name'];
												
											} echo"$name_employee";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Released To</label>
											<div class="controls">
												<input type="text" name='problem_reported' value='<?php  echo"$released_to";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Released Date</label>
											<div class="controls">
												<input type="text" name='problem_reported' value='<?php  echo"$date_released";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Labor Cost</label>
											<div class="controls">
												<input type="text" name='problem_reported' value='<?php  echo"$labor_cost";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Parts Cost</label>
											<div class="controls">
												<input type="text" name='problem_reported' value='<?php  echo"$parts_cost";?>' id="basicinput" placeholder="" class="span8" readonly>
											</div>
										</div>
									</form>
							</div>
						
                
		</div><!--/.container-->
	</div><!--/.wrapper-->
 
</body>