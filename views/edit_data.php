    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       Edit Data <h3>
                                </div>
									

									<br />

									<form method='post' class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">Brand</label>
											<div class="controls">
												<input type="text" name='brand' id="basicinput" placeholder="Hp,Acer,etc..." value='<?php echo"$brand";?>' class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Type</label>
											<div class="controls">
												<input type="text" name='type' id="basicinput"  value='<?php echo"$type";?>' placeholder="Printer,Toner,Ink,etc...." class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Model</label>
											<div class="controls">
												<input type="text" name='model' id="basicinput"  value='<?php echo"$model";?>' placeholder="model" class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Price</label>
											<div class="controls">
												<input type="text" name='price' id="basicinput"  value='<?php echo"$price";?>' placeholder="" class="span8" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Description</label>
											<div class="controls">
												<input type="text" name='description' id="basicinput"  value='<?php echo"$description";?>' placeholder="" class="span8" required>
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