    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       Transfer Quantity <h3>
                                </div>
									

									<br />

									<form method='post' class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">Brand</label>
											<div class="controls">
												<input type="text" name='brand' id="basicinput" placeholder="Hp,Acer,etc..." value='<?php echo"$brand";?>' class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Type</label>
											<div class="controls">
												<input type="text" name='type' id="basicinput"  value='<?php echo"$type";?>' placeholder="Printer,Toner,Ink,etc...." class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Model</label>
											<div class="controls">
												<input type="text" name='model' id="basicinput"  value='<?php echo"$model";?>' placeholder="model" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Quantity</label>
											<div class="controls">
												<input type="number" name='qty' id="basicinput"  value='<?php echo"$qty";?>' placeholder="" class="span8" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Quantity  Transfer</label>
											<div class="controls">
												<input type="number"  name='qty_1' id="basicinput"   placeholder="" class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Branch</label>
											<div class="controls">
												<?php
										include ("views/connect.php");	

										$sql = "SELECT * FROM branches where branch_name!='MAIN' ORDER BY branch_name ASC";
										$result = $conn->query($sql);

														  
										echo "<select class='span8'  id='' name='branch' onchange='document.getElementById('selected_text').value=this.options[this.selectedIndex].text' data-placement='top' required/>";
									    echo "<option value=''>Branches</option>";
									    while($row = $result->fetch_assoc()) {
										  echo	"<option value = '$row[branch_name]'>$row[branch_name]</option>";
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