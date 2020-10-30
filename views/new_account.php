    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       New Account <h3>
                                </div>
									

									<br />

									<form method='post' class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">Name</label>
											<div class="controls">
												<input type="text" name='name' id="basicinput" placeholder="Name" class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Username</label>
											<div class="controls">
												<input type="text" name='username' id="basicinput" placeholder="Username" class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Password</label>
											<div class="controls">
												<input type="password" name='password' id="basicinput" placeholder="Password" class="span8" required>
											</div>
										</div>

										

										


										<div class="control-group">
											<label class="control-label" for="basicinput">Type</label>
											<div class="controls">
												<select data-placeholder="Select here.." class="span8" name='type' required>
													<option value="">Select here..</option>
													<option value="ADMIN">ADMIN</option>
													<option value="EMPLOYEE">EMPLOYEE</option>
													<option value="TECHNICIAN">TECHNICIAN</option>
													
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Branch</label>
											<div class="controls">
												<?php
										include ("views/connect.php");	

										$sql = "SELECT * FROM branches ORDER BY branch_name ASC";
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
												<button type="submit" class="btn">Submit Form</button>
											</div>
										</div>
									</form>
							</div>
						
                
		</div><!--/.container-->
	</div><!--/.wrapper-->
 
</body>