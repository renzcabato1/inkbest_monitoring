    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                      Invoice History</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Invoice Number
                                                </th>
                                                <th>
                                                    Client Name
                                                </th>
                                                <th>
                                                    Address
                                                </th><th>
                                                    Contact
                                                </th><th>
                                                    Invoice By
                                                </th><th>
                                                    Date Invoice
                                                </th>
                                               
                                                <th>
                                                   Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
		include ("views/connect.php");	
		$sql = "SELECT * FROM invoice_history";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
			
											$id_mo=$row['employee_id'];
											$sql5 = "SELECT * FROM accounts where id='$id_mo'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$name=$row5['name'];
												
											} 
		echo"<tr>
		
		<td >".$row["invoice_number"]."</td>
		<td align='center'>".$row["client_name"]."</td>
		<td align='center'>".$row["address"]."</td>
		<td align='center'>".$row["contact_number"]."</td>
		<td align='center'>".$name."</td>
	
		<td align='center'>".$row["date_invoice"]."</td>
		";
		
		echo"
		<td align='center'><a  href='index.php?page=view_invoice&ID=".$row['id']."'>
												<b>VIEW</b></td></tr>";
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