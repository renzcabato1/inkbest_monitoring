    <div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       Account Data <td><a href="index.php?page=new_account" class="btn btn-success">New Account</a></td><h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Username
                                                </th>
                                                <th>
                                                    Type
                                                </th><th>
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
		$sql = "SELECT * FROM accounts";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo"<tr>
		
		<td >".$row["name"]."</td>
		<td align='center'>".$row["username"]."</td>
		<td align='center'>".$row["type"]."</td>
		<td align='center'>".$row["branch"]."</td>";
		if($row['activate']=='0'){
		echo"
		<td align='center' style='width:150px'><a href='index.php?page=edit_acct&ID=".$row['id']."'>
									<i class='icon-edit'></i>
									<b>Edit</b>
								</a>
								<a class='btn btn-small btn-inverse' href='index.php?page=deac_acc&ID=".$row['id']."'>
								Deactivate
		</a></td>";}
		else
		{
			echo"<td align='center' style='width:150px'>
								<a class='btn btn-small btn-inverse' href='index.php?page=act_acc&ID=".$row['id']."'>
								Activate
		</a></td>";
		}
		echo"</tr>";
		
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