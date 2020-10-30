    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       New Stock<h3>
                                </div>
									

									<br />

									<form method='post' class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">Quantity</label>
											<div class="controls">
												<input type="number" min="0" name='qty' id="basicinput" placeholder="" class="span8" onkeydown="javascript: return event.keyCode == 69 ? false : true"  required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Remarks</label>
											<div class="controls">
												<input type="text" name='remarks' id="basicinput" placeholder="Anything" class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Date Delivered</label>
											<div class="controls">
												<input type="date" name='date_delivered' value='<?php $date_today = date('Y-m-d');
												echo"$date_today";?>' id="basicinput" placeholder="Printer,Toner,Ink,etc...." class="span8" required>
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