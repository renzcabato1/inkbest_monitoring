    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       Pull Out History<h3>
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
                                                    Quantity Pull Out
                                                </th>
												<th>
                                                    Description
                                                </th>
												<th>
                                                 Remarks
                                                </th>
												<th>
												From Branch</th>
                                               
                                                <th>
                                                   Date Pull Out
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
		include ("views/connect.php");	
		$sql = "SELECT * FROM pull_out";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_inventory=$row['id_inventory'];
			$id_inventory_branch=$row['id_inventory_branch'];
			$sql5 = "SELECT * FROM inventory where id='$id_inventory'";
		$result5 = $conn->query($sql5);	
			$sql10 = "SELECT * FROM inventory_branch where id='$id_inventory_branch'";
		$result10 = $conn->query($sql10);	
		while($row3 = $result10->fetch_assoc()) {
		
		while($row5 = $result5->fetch_assoc()) {
			
	
		echo"<tr>
		
		<td >".$row5["brand"]."</td>
		<td align='center'>".$row5["type"]."</td>
		<td align='center'>".$row5["model"]."</td>
		<td align='center'>".$row["qty_pull_out"]."</td>
		<td align='center'>".$row5["description"]."</td>
		<td align='center'>".$row["remarks"]."</td>
		<td align='center'>".$row3["branch"]."</td>
		<td align='center'>".$row["date_pull_out"]."</td>
		</tr>
		";
			}
			}
		
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