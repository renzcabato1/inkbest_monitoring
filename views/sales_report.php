    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                      Sales Report <h3>
                                </div>
									

									<br />

									<form method='post' class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">From</label>
											<div class="controls">
												<input type="date" name='from' id="basicinput"  class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">To</label>
											<div class="controls">
												<input type="date" name='to' id="basicinput" class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">BRANCH</label>
											<div class="controls">
												<?php
										include ("views/connect.php");	

										$sql = "SELECT * FROM branches ORDER BY branch_name ASC";
										$result = $conn->query($sql);

														  
										echo "<select class='span8'  id='' name='branch' onchange='document.getElementById('selected_text').value=this.options[this.selectedIndex].text' data-placement='top' required/>";
									    echo "<option value=''>Branch</option>";
									    echo "<option value='ALL'>ALL</option>";
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