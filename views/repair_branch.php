    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       Pending Work <td><a href="index.php?page=new_repair" class="btn btn-success">New Repair</a></td><h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Control No.
                                                </th>
                                                <th>
                                                   Client Name
                                                </th>
                                                <th>
                                                    Contact Number
                                                </th>
												<th>
                                                    Date Received
                                                </th>
												<th>
                                                    Received By
                                                </th>
												<th>
                                                    Branch
                                                </th>
												<th>
                                                   Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
		include ("views/connect.php");	
			$id_employee = $_SESSION['user_id'];
		$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												
											} 

		$sql = "SELECT * FROM repair where done='0' and technician_assigned='' and branch='$branch'";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
			$sql1 = "SELECT * FROM accounts where id='$row[account_id]'";
		$result1 = $conn->query($sql1);	
		while($row1 = $result1->fetch_assoc()) 
		{
			$name_employee=$row1['name'];
			$branch=$row1['branch'];
		}
		
		echo"<tr>
		
		<td >".$row["id"]."</td>
		<td align='center'>".$row["client_name"]."</td>
		<td align='center'>".$row["contact_number"]."</td>
		<td align='center'>".$row["date_encode"]."</td>
		<td align='center'>".$name_employee."</td>
		<td align='center'>".$branch."</td>
		";
		
			echo"
		<td align='center'>
								<a  href='index.php?page=edit_repair&ID=".$row['id']."'>
								<i class='icon-edit'></i>
									<b>Edit</b>
		</a>|
								<a  href='index.php?page=assign	&ID=".$row['id']."'>
								<i class='icon-screenshot'></i>
									<b>Assign</b>
		</a> </tr>";
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