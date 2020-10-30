		<div class="span9">
                        <div class="content">
                            
                           
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                       Inventory Data <td><a href="index.php?page=new_data" class="btn btn-success">New Data	</a></td> <td><a href="ink@best_print/2.php" class="btn btn-danger" target='_target'>Print	</a></td><h3>
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
                                                </th><th>
                                                    Quantity
                                                </th><th>
                                                    price
                                                </th><th>
                                                    Description
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
		$sql = "SELECT * FROM inventory order by quantity asc";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
		$price=number_format($row['price'],2);
		echo"<tr>
		
		<td >".$row["brand"]."</td>
		<td align='center'>".$row["type"]."</td>
		<td align='center'>".$row["model"]."</td>
		<td align='center'>".$row["quantity"]."</td>
		<td align='center'>".$price."</td>
		<td align='center'>".$row["description"]."</td>
		<td align='center'>".$row["branch"]."</td>
		";
		if($row['quantity']=='0'){
			echo"
		<td align='center'><a href='index.php?page=edit_inventory&ID=".$row['id']."'>
									<i class='icon-edit'></i>
									<b>Edit</b>
								</a> |
								<a  href='index.php?page=new_stock&ID=".$row['id']."'>
								<i class='icon-zoom-in'></i><b>New Stock</b>
		</a> | 
								<i class='icon-ambulance'></i><b>Transfer</b>
		</td></tr>";
		}
		else{
			
		echo"
		<td align='center'><a href='index.php?page=edit_inventory&ID=".$row['id']."'>
									<i class='icon-edit'></i>
									<b>Edit</b>
								</a> |
								<a  href='index.php?page=new_stock&ID=".$row['id']."'>
								<i class='icon-zoom-in'></i><b>New Stock</b>
		</a> | <a  href='index.php?page=transfer&ID=".$row['id']."'>
								<i class='icon-ambulance'></i><b>Transfer</b>
		</a></td></tr>";
		}
			
		}
		$sql23 = "SELECT * from inventory_branch order by branch";
		$result23 = $conn->query($sql23);	
		
		while($row23 = $result23->fetch_assoc()) {
			$renz=$row23['inventory_id'];
			$sql10 = "SELECT * FROM inventory where id='$renz'";
$result10 = $conn->query($sql10);	


  while($row10 = $result10->fetch_assoc()) {

	   $brand= $row10['brand'];
	$type=  $row10['type'];
	$model=  $row10['model'];
	$price=number_format($row10['price'],2);
	$description=  $row10['description'];
	
	}
	echo"<tr>
		
		<td >".$brand."</td>
		<td align='center'>".$type."</td>
		<td align='center'>".$model."</td>
		<td align='center'>".$row23["qty"]."</td>
		<td align='center'>".$price."</td>
		<td align='center'>".$description."</td>
		<td align='center'>".$row23['branch']."</td>
		";
		if($row23['qty']>=1){
		echo"<td  align='center'>
		<a  href='index.php?page=pull_out&ID=".$row23['id']."'>
								<i class='icon-ambulance'></i><b>Pull Out</b>
		</a>
		</td>
		</tr>";
		}
		else{
			echo"<td  align='center'>
		
								<b>No Stock</b>
		</a>
		</td>
		</tr>";
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