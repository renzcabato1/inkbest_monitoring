    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                      Client Request
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
											<label class="control-label" for="basicinput">Technician</label>
											<div class="controls">
												<?php
										include ("views/connect.php");	

										$sql = "SELECT * FROM accounts where type='TECHNICIAN' ORDER BY name ASC";
										$result = $conn->query($sql);

														  
										echo "<select class='span8'  id='' name='technician_assign' onchange='document.getElementById('selected_text').value=this.options[this.selectedIndex].text' data-placement='top' required/>";
									    echo "<option value=''>TECHNICIAN</option>";
									    while($row = $result->fetch_assoc()) {
										  echo	"<option value = '$row[id]'>$row[name]</option>";
									   }
										echo	"</select>";
										
								?>
											</div>
										</div>
		
										

										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn btn-small btn-danger">Submit Form</button>
											</div>
										</div>
									</form>
							</div>
						
                
		</div><!--/.container-->
	</div><!--/.wrapper-->
 
</body>