<?php
if (isset($_GET['page'])) {
	 if($_GET['page'] == "account")
	{
		include ("views/account.php");
	
	}
	else if($_GET['page'] == "inventory_view")
	{
include ("views/connect.php");	
$id_employee = $_SESSION['user_id'];
		
		
		$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												
											} 
											if($branch=='MAIN'){
		include ("views/inventory.php");
											}
											else {
		include ("views/not_main_inventory.php");
											}
	
	}
	else if($_GET['page'] == "delivery_history")
	{	
		include ("views/delivery_history.php");
	
	}
	else if($_GET['page'] == "pull_out_history")
	{	
		include ("views/pull_out_history.php");
	
	}
	else if($_GET['page'] == "transfer_history")
	{	
		include ("views/transfer_history.php");
	
	}
	else if($_GET['page'] == "repair")
	{	
		include ("views/repair.php");
	
	}
	else if($_GET['page'] == "repair_branch")
	{	
		include ("views/repair_branch.php");
	
	}
	else if($_GET['page'] == "home")
	{	
		include ("views/home.php");
	
	}
	else if($_GET['page'] == "invoice")
	{	
		include ("views/invoice.php");
	
	}
	else if($_GET['page'] == "deac_acc")
	{	
	deac_acc();
	}
	else if($_GET['page'] == "act_acc")
	{	
	activate();
	}
	else if($_GET['page'] == "new_account")
	{	
		if( $_SERVER['REQUEST_METHOD']=='POST' )
		new_account();
		else
		include ("views/new_account.php");
	
	}
	else if($_GET['page'] == "new_repair")
	{	
		if( $_SERVER['REQUEST_METHOD']=='POST' )
		new_repair();
		else
		include ("views/new_repair.php");
	
	}
	else if($_GET['page'] == "new_stock")
	{	
		if( $_SERVER['REQUEST_METHOD']=='POST' )
		new_stock();
		else
		include ("views/new_stock.php");
	
	}
	else if($_GET['page'] == "new_data")
	{	
		if( $_SERVER['REQUEST_METHOD']=='POST' )
		new_data();
		else
		include ("views/new_data.php");
	
	}
	else if($_GET['page'] == "edit_acct")
	{
		if($_SERVER['REQUEST_METHOD']=='POST' )
		save_account();
		else
			edit_account();
	
	}
	else if($_GET['page'] == "edit_inventory")
	{
		if($_SERVER['REQUEST_METHOD']=='POST' )
		save_data();
		else
			edit_data();
	
	}
	else if($_GET['page'] == "transfer")
	{
		if($_SERVER['REQUEST_METHOD']=='POST' )
		save_transfer();
		else
			transfer();
	}
	else if($_GET['page'] == "pull_out")
	{
		if($_SERVER['REQUEST_METHOD']=='POST' )
		pull_out_save();
		else
			pull_out();
	}
	else if($_GET['page'] == "edit_repair")
	{
		if($_SERVER['REQUEST_METHOD']=='POST' )
		save_edit_repair();
		else
			edit_repair();
	}
	else if($_GET['page'] == "assign")
	{
		if($_SERVER['REQUEST_METHOD']=='POST' )
		save_assign();
		else
			assign();
	}
	else if($_GET['page'] == "assign_personel")
	{
		include ("views/assign_na.php");
	
	}
	else if($_GET['page'] == "assign_personel_account")
	{
		include ("views/assign_na_account.php");
	
	}
	else if($_GET['page'] == "done_released")
	{
		include ("views/done_released.php");
	
	}
	else if($_GET['page'] == "done_repair")
	{
		if($_SERVER['REQUEST_METHOD']=='POST' )
		save_done_repair();
		else
			done_repair();
	}
	else if($_GET['page'] == "done_repair_na")
	{
			include ("views/done_repair_naa.php");
	
	}
	else if($_GET['page'] == "done_repair_na_branch")
	{
			include ("views/done_repair_naa_branch.php");
	
	}
	else if($_GET['page'] == "released")
	{
			if($_SERVER['REQUEST_METHOD']=='POST' )
		save_released();
		else
			released();
	}
	else if($_GET['page'] == "add_to_invoice")
	{
			add_to_invoice();
	}
	else if($_GET['page'] == "remove_to_invoice")
	{
			remove_invoice();
	}
	else if($_GET['page'] == "view_all")
	{
		
			view_all();
	}
	else if($_GET['page'] == "done_invoice")
	{
		if( $_SERVER['REQUEST_METHOD']=='POST' )
		done_invoice();
	else	
	include ("views/done_invoice.php");
	}
	else if($_GET['page'] == "invoice_history")
	{
		
		include ("views/invoice_history.php");
	
	}
	else if($_GET['page'] == "view_invoice")
	{
		
		include ("views/view_invoice.php");
	
	}
	else if($_GET['page'] == "sales_report")
	{
		if( $_SERVER['REQUEST_METHOD']=='POST' )
		sales_report_done();
		else
		
		include ("views/sales_report.php");
	
	}
}
else
{
		include ("views/home.php");
}
function new_account(){
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$type=$_POST['type'];
	$branch=$_POST['branch'];
	
	
		
	
include ("views/connect.php");	
$sql = "INSERT INTO accounts (name,username,password,type,branch,activate)
VALUES (\"$name\",\"$username\",\"$password\",\"$type\",\"$branch\",'0')";
if ($conn->query($sql) === TRUE) {
 
   header("Location: index.php?page=account");

}
else{
echo ' <script type="text/javascript">
             alert("ERROR")
			</script>';
			header("refresh: .1;");
			}
}
function deac_acc(){
			$id=$_GET['ID'];

include ("views/connect.php");	

$sql = "UPDATE accounts set activate='1' where id='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=account");	
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}
	
}
function activate(){
			$id=$_GET['ID'];

include ("views/connect.php");	 

$sql = "UPDATE accounts set activate='0' where id='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=account");	
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}
	
}
function edit_account(){
	$id=$_GET['ID'];

include ("views/connect.php");	 

$sql = "SELECT * FROM accounts where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {

	   $username= $row['username'];
	$type=  $row['type'];
	$branch=  $row['branch'];
	$name=  $row['name'];
	}
include "views/edit_account.php";

	
 
}
function edit_data(){
	$id=$_GET['ID'];

include ("views/connect.php");	 


$sql = "SELECT * FROM inventory where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {

	   $brand= $row['brand'];
	$type=  $row['type'];
	$model=  $row['model'];
	$price=  $row['price'];
	$description=  $row['description'];
	}
include "views/edit_data.php";

	
 
}
function save_account(){
	$id=$_GET['ID'];
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$type=$_POST['type'];
	$branch=$_POST['branch'];

include ("views/connect.php");		 


$sql = "UPDATE accounts set name='$name',username='$username',password='$password',branch='$branch',type='$type' where id='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=account");	
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}
}
function save_data(){
	$id=$_GET['ID'];
	$brand=$_POST['brand'];
	$type=$_POST['type'];
	$model=$_POST['model'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	

include ("views/connect.php");	
 

$sql = "UPDATE inventory set brand='$brand',type=\"$type\",model=\"$model\",price=\"$price\",description=\"$description\"where id='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=inventory_view");	
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}
}
function new_data(){
	$brand=$_POST['brand'];
	$type=$_POST['type'];
	$model=$_POST['model'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	
	
		
	
include ("views/connect.php");	
$sql = "INSERT INTO inventory (brand,type,model,price,description,branch,quantity)
VALUES (\"$brand\",\"$type\",\"$model\",\"$price\",\"$description\",'MAIN','0')";
if ($conn->query($sql) === TRUE) {
 
   header("Location: index.php?page=inventory_view");

}
else{
echo ' <script type="text/javascript">
             alert("DUPLICATE OF EMPLOYEE ID")
			</script>';
			header("refresh: .1;");}

	
	
}
function new_stock(){
	$inventory_id= $_GET['ID'];
	$qty= $_POST['qty'];
	$date_delivered= $_POST['date_delivered'];
$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$type=$_POST['type'];
	$branch=$_POST['branch'];
	
	
		
	
include ("views/connect.php");	
$sql = "INSERT INTO delivery (date_delivered,inventory_id,remarks,qty)
VALUES (\"$date_delivered\",\"$inventory_id\",\"$remarks\",\"$qty\")";
if ($conn->query($sql) === TRUE) {
 
 
		$sql1 = "SELECT * FROM inventory where id='$inventory_id'";
		$result1 = $conn->query($sql1);	
		
		while($row1 = $result1->fetch_assoc()) {
			$qty1=$row1['quantity'];
		}
		$new_quantity = $qty + $qty1;
		$sql4 = "update inventory set quantity='$new_quantity' where id='$inventory_id'";
if ($conn->query($sql4) === TRUE) {
	  header("Location: index.php?page=inventory_view");
}
else{
	echo ' <script type="text/javascript">
             alert("ERROR")
			</script>';
			header("refresh: .1;");
			}

}

else{
echo ' <script type="text/javascript">
             alert("ERROR")
			</script>';
			header("refresh: .1;");}

	
	
	
	}
function transfer(){
	$id=$_GET['ID'];

include ("views/connect.php");	
$sql = "SELECT * FROM inventory where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {

	   $brand= $row['brand'];
	$type=  $row['type'];
	$model=  $row['model'];
	$qty=  $row['quantity'];
	}
include "views/transfer.php";

	
}
function save_transfer(){
	$inventory_id=$_GET['ID'];
	$quantity_transfer=$_POST['qty_1'];
	$branch=$_POST['branch'];
	$transfer_date=date('Y-m-d');
	
		include ("views/connect.php");	
		$sql35 = "SELECT * FROM inventory_branch where inventory_id='$inventory_id' and branch='$branch'";
		$result35 = $conn->query($sql35);
			if ($result35->num_rows > 0) {
				while($row35 = $result35->fetch_assoc()) {
				$quantity_branch=$row35['qty'];
				}
				$quantity_transfer1 = $quantity_branch + $quantity_transfer;
		$sql = "SELECT * FROM inventory where id='$inventory_id'";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
			$quantity=$row['quantity'];
		}
		if($quantity>=$quantity_transfer){
			$sql2 = "Update inventory_branch set qty='$quantity_transfer1' where inventory_id='$inventory_id' and branch='$branch' ";

			
			if ($conn->query($sql2) === TRUE) {
							$sql5 = "SELECT * FROM inventory where id='$inventory_id'";
				$result5 = $conn->query($sql5);	
				
				while($row5 = $result5->fetch_assoc()) {
					$qty5=$row5['quantity'];
				}
				$new_quantity = $qty5 - $quantity_transfer;
				$sql4 = "update inventory set quantity='$new_quantity' where id='$inventory_id'";
		if ($conn->query($sql4) === TRUE) {
			$sql2 = "INSERT INTO transfer_history (inventory_id,qty,transfer_date,branch) VALUES (\"$inventory_id\",\"$quantity_transfer\",\"$transfer_date\",\"$branch\")";
if ($conn->query($sql2) === TRUE) {
			  header("Location: index.php?page=inventory_view");
}
 else {
	 echo "Error Insert	 record1: " . mysqli_error($conn);
 }
		}
		else {
				 echo "Error Insert	 record2: " . mysqli_error($conn);
 
		}
			}
			else{
			echo "Error Insert	 record5: " . mysqli_error($conn);}
 
 
			
		}
		else{
			echo ' <script type="text/javascript">
             alert("NO STOCK AVAILABLE")
			</script>';
			header("refresh: .1;");
		}
	
	}
	else{
		$sql = "SELECT * FROM inventory where id='$inventory_id'";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
			$quantity=$row['quantity'];
		}
		if($quantity>=$quantity_transfer){
			$sql2 = "INSERT INTO inventory_branch (inventory_id,qty,date_transfer,branch) VALUES (\"$inventory_id\",\"$quantity_transfer\",\"$transfer_date\",\"$branch\")";

			
			if ($conn->query($sql2) === TRUE) {
				$sql5 = "SELECT * FROM inventory where id='$inventory_id'";
				$result5 = $conn->query($sql5);	
				
				while($row5 = $result5->fetch_assoc()) {
					$qty5=$row5['quantity'];
				}
				$new_quantity = $qty5 - $quantity_transfer;
				$sql4 = "update inventory set quantity='$new_quantity' where id='$inventory_id'";
		if ($conn->query($sql4) === TRUE) {
		$sql2 = "INSERT INTO transfer_history (inventory_id,qty,transfer_date,branch) VALUES (\"$inventory_id\",\"$quantity_transfer\",\"$transfer_date\",\"$branch\")";
if ($conn->query($sql2) === TRUE) {
			  header("Location: index.php?page=inventory_view");
}
else {
			echo "Error Insert	 record6: " . mysqli_error($conn);
 
}
}
else {
				 echo "Error Insert	 record123123: " . mysqli_error($conn);
 
		}

			}
			else {
				 echo "Error Insert	 recordrenz: " . mysqli_error($conn);
 
		}
 
			
		}
		else{
			echo ' <script type="text/javascript">
             alert("NO STOCK AVAILABLE")
			</script>';
			header("refresh: .1;");
		}
	}
}
function pull_out(){
	$id=$_GET['ID'];

include ("views/connect.php");	
$sql = "SELECT * FROM inventory_branch where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {

	   $inventory_id= $row['inventory_id'];
	   $qty= $row['qty'];
	   $sql2 = "SELECT * FROM inventory where id='$inventory_id'";
		$result2 = $conn->query($sql2);

  while($row2 = $result2->fetch_assoc()) {
	   $brand= $row2['brand'];
	$type=  $row2['type'];
	$model=  $row2['model'];
	
	  
  }	  

	
	}
include "views/pull_out.php";

	
}
function pull_out_save(){
	$inventory_id=$_GET['ID'];
	$quantity_pull_out=$_POST['qty_1'];
	$remarks=$_POST['remarks'];
	$pull_out_date=date('Y-m-d');
	
	include ("views/connect.php");	 
		$sql = "SELECT * FROM inventory_branch where id='$inventory_id'";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
			$quantity=$row['qty'];
			$inventory_id=$row['inventory_id'];
			$id=$row['id'];
		}
		
		if($quantity>=$quantity_pull_out){
			$new_quantity_pull_out = $quantity-$quantity_pull_out;
			$sql2 = "INSERT INTO pull_out (id_inventory_branch,id_inventory,qty_pull_out,date_pull_out,remarks) VALUES (\"$id\",\"$inventory_id\",\"$quantity_pull_out\",\"$pull_out_date\",\"$remarks\")";
		if ($conn->query($sql2) === TRUE) {
			$sql5 = "SELECT * FROM inventory where id='$inventory_id'";
				$result5 = $conn->query($sql5);	
				
				while($row5 = $result5->fetch_assoc()) {
					$qty5=$row5['quantity'];
				}
				$new_quantity = $qty5 + $quantity_pull_out;
				$sql4 = "update inventory set quantity='$new_quantity' where id='$inventory_id'";
		if ($conn->query($sql4) === TRUE) {
			
		$sql10 = "update inventory_branch set qty='$new_quantity_pull_out' where id='$id'";
		if ($conn->query($sql10) === TRUE) {
			  header("Location: index.php?page=inventory_view");
}
}
		
		}
		else{
				echo "Error Insert	 record5: " . mysqli_error($conn);
		}
		}
		else{
			
			echo ' <script type="text/javascript">
             alert("NO STOCK AVAILABLE")
			</script>';
			header("refresh: .1;");
		
		}
		
}
function new_repair(){
	$client_name=$_POST['client_name'];
	$contact_number=$_POST['contact_number'];
	$address=$_POST['address'];
	$machine_type=$_POST['machine_type'];
	$brand=$_POST['brand'];
	$model=$_POST['model'];
	$serial_number=$_POST['serial_number'];
	$accessories=$_POST['accessories'];
	$problem_reported=$_POST['problem_reported'];
	$date_encode=date('Y-m-d');
	$id_employee = $_SESSION['user_id'];
	include ("views/connect.php");	
$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												$type=$row5['type'];
												
											} 

$sql = "	 INTO repair (client_name,contact_number,address,machine_type,brand,model,serial_number,accessories,problem_reported,date_encode,account_id,branch,problem_found,released_to,release_by,repair_done,waranty_date,labor_cost,done,remarks,released,parts_cost,date_released,technician_assign,date_assign)
VALUES (\"$client_name\",\"$contact_number\",\"$address\",\"$machine_type\",\"$brand\",\"$model\",\"$serial_number\",\"$accessories\",\"$problem_reported\",\"$date_encode\",\"$id_employee\",\"$branch\",'','','','00000000','00000000','','0','','0','','00000000','','')";
if ($conn->query($sql) === TRUE) {
 if($type=='ADMIN'){
   header("Location: index.php?page=repair");
 }
 else{
	   header("Location: index.php?page=repair");
 
 }
   

}
else{
echo ' <script type="text/javascript">
             alert("ERROR")
			</script>';
			header("refresh: .1;");
			}
	
}
function edit_repair(){
	$id=$_GET['ID'];

include ("views/connect.php");	
$sql = "SELECT * FROM repair where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {
	$client_name=$row['client_name'];
	$contact_number=$row['contact_number'];
	$address=$row['address'];
	$machine_type=$row['machine_type'];
	$brand=$row['brand'];
	$model=$row['model'];
	$serial_number=$row['serial_number'];
	$accessories=$row['accessories'];
	$problem_reported=$row['problem_reported'];
	}
include "views/edit_repair.php";

	
 
}
function save_edit_repair(){
	$id=$_GET['ID'];
	$client_name=$_POST['client_name'];
	$contact_number=$_POST['contact_number'];
	$address=$_POST['address'];
	$machine_type=$_POST['machine_type'];
	$brand=$_POST['brand'];
	$model=$_POST['model'];
	$serial_number=$_POST['serial_number'];
	$accessories=$_POST['accessories'];
	$problem_reported=$_POST['problem_reported'];
include ("views/connect.php");	

$sql = "UPDATE repair set client_name='$client_name',contact_number='$contact_number',address='$address',machine_type='$machine_type',brand='$brand',model='$model',serial_number='$serial_number',accessories='$accessories',problem_reported='$problem_reported' where id='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=repair");	
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}

}
function assign(){
	$id=$_GET['ID'];

include ("views/connect.php");	
$sql = "SELECT * FROM repair where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {
	$client_name=$row['client_name'];
	$contact_number=$row['contact_number'];
	$address=$row['address'];
	$machine_type=$row['machine_type'];
	$brand=$row['brand'];
	$model=$row['model'];
	$serial_number=$row['serial_number'];
	$accessories=$row['accessories'];
	$problem_reported=$row['problem_reported'];
	}
include "views/assign.php";

}
function save_assign(){
		$id=$_GET['ID'];
$technician_assign=$_POST['technician_assign'];
$date_assign=date('Y-m-d');

include ("views/connect.php");	
$sql = "UPDATE repair set technician_assigned='$technician_assign',date_assign='$date_assign' where id='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=repair");	
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}
	
}
function done_repair(){
	$id=$_GET['ID'];

include ("views/connect.php");	
$sql = "SELECT * FROM repair where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {
	$client_name=$row['client_name'];
	$contact_number=$row['contact_number'];
	$address=$row['address'];
	$machine_type=$row['machine_type'];
	$brand=$row['brand'];
	$model=$row['model'];
	$serial_number=$row['serial_number'];
	$accessories=$row['accessories'];
	$problem_reported=$row['problem_reported'];
	}
include "views/done_repair_form.php";

}
function save_done_repair(){
	$id=$_GET['ID'];
$problem_found=$_POST['problem_found'];
$remarks=$_POST['remarks'];
$date_done=date('Y-m-d');
$id_employee = $_SESSION['user_id'];
	

include ("views/connect.php");	
	$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												$type=$row5['type'];
												
											} 
$sql = "UPDATE repair set problem_found='$problem_found',remarks='$remarks',repair_done='$date_done',done='1' where id='$id'";
if ($conn->query($sql) === TRUE) {
	if($type=='ADMIN'){
   header("Location: index.php?page=assign_personel");	
	}
	else 
	{
		  header("Location: index.php?page=assign_personel_account");	
	
	}
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}
}
function released(){
	$id=$_GET['ID'];
include ("views/connect.php");	
$sql = "SELECT * FROM repair where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {
	$client_name=$row['client_name'];
	$contact_number=$row['contact_number'];
	$address=$row['address'];
	$machine_type=$row['machine_type'];
	$brand=$row['brand'];
	$model=$row['model'];
	$serial_number=$row['serial_number'];
	$accessories=$row['accessories'];
	$problem_reported=$row['problem_reported'];
	}
include "views/released.php";
	
}
function save_released(){

$id=$_GET['ID'];
$released_to=$_POST['released_to'];
$parts_cost=$_POST['parts_cost'];
$labor_cost=$_POST['labor_cost'];
$waranty_date=$_POST['waranty_date'];
$date_released=date('Y-m-d');
$id_employee = $_SESSION['user_id'];
include ("views/connect.php");	
$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												$type=$row5['type'];
												
											} 
$sql = "UPDATE repair set released_to='$released_to',parts_cost='$parts_cost',labor_cost='$labor_cost',date_released='$date_released',release_by='$id_employee',waranty_date='$waranty_date',released='1' where id='$id'";
if ($conn->query($sql) === TRUE) {
	if($typ=='ADMIN'){
	header("Location: index.php?page=done_repair_na");	}
	else{
		header("Location: index.php?page=done_repair_na_branch");	
	}
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}
}
function view_all(){
	
	$id=$_GET['ID'];
include ("views/connect.php");	
$sql = "SELECT * FROM repair where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {
	$client_name=$row['client_name'];
	$contact_number=$row['contact_number'];
	$address=$row['address'];
	$machine_type=$row['machine_type'];
	$brand=$row['brand'];
	$model=$row['model'];
	$serial_number=$row['serial_number'];
	$accessories=$row['accessories'];
	$problem_reported=$row['problem_reported'];
	$person_encode=$row['account_id'];
	$date_encode=$row['date_encode'];
	$problem_found=$row['problem_found'];
	$released_to=$row['released_to'];
	$release_by=$row['release_by'];
	$technician_assigned=$row['technician_assigned'];
	$technician_repair_done=$row['repair_done'];
	$waranty_date=$row['waranty_date'];
	$labor_cost=$row['labor_cost'];
	$remarks=$row['remarks'];
	$date_assign=$row['date_assign'];
	$parts_cost=$row['parts_cost'];
	$date_released=$row['date_released'];
	}
include "views/view_all.php";
	
	
}
function add_to_invoice(){
	$id =$_GET['ID'];
include ("views/connect.php");	
$id_employee = $_SESSION['user_id'];
		
	
		$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												
											} 
											
											
											if($branch=='MAIN'){
											$sql = "SELECT * FROM inventory where id='$id'";
												$result = $conn->query($sql);
												while($row = $result->fetch_assoc()) {
												$quantityrenz = $row['quantity'] - 1;
												$renzcabato=$row['price'];
												
												}
												$sql1 = "SELECT * FROM inventory_invoice where inventory_id='$id' and done='0' and employee_id='$id_employee'";
												$result1 = $conn->query($sql1);	
												if ($result1->num_rows > 0) {
				while($row1 = $result1->fetch_assoc()) {
				
					
					$new_qty=$row1['qty']+1;
					
					
					$sql2 = "Update inventory_invoice  set qty=\"$new_qty\" where inventory_id ='$id' and done=0  and employee_id='$id_employee'";
					if ($conn->query($sql2) === TRUE) {
							
					$sql10 = "Update inventory set quantity=\"$quantityrenz\" where id ='$id'";
					if ($conn->query($sql10) === TRUE) {
					   header("Location: index.php?page=invoice");	
					}
					else{
						echo "Error Inserting Record1: " . mysqli_error($conn);
					}
					   	
					}
					else{
						echo "Error Inserting Record2: " . mysqli_error($conn);
					}
				}
			}
			
			else{
				$sql5 = "INSERT INTO inventory_invoice (inventory_id,qty,price,employee_id,branch,invoice_id,invoice_by,done,date_invoice)
				VALUES (\"$id\",'1',\"$renzcabato\",'$id_employee','$branch','0','0','0','00000000')";
				if ($conn->query($sql5) === TRUE) {
				$sql10 = "Update inventory  set quantity=\"$quantityrenz\" where id ='$id'";
					if ($conn->query($sql10) === TRUE) {
					   header("Location: index.php?page=invoice");	
					}
					else{
						echo "Error Inserting Record3: " . mysqli_error($conn);
					}
				}
				else{
				 echo "Error Inserting record4: " . mysqli_error($conn);
					}
			
					}
												}
											
											else{
												$sql = "SELECT * FROM inventory_branch where id='$id'";
												$result = $conn->query($sql);	
												while($row = $result->fetch_assoc()) {
												$quantityrenz = $row['qty'] - 1;
												$inventory_id=$row['inventory_id'];
												$sqlrenz = "SELECT * FROM inventory where id='$inventory_id'";
												$resultrenz = $conn->query($sqlrenz);
												while($rowrenz = $resultrenz->fetch_assoc()) {
													$price=$rowrenz['price'];
												}
												$sql1 = "SELECT * FROM inventory_invoice where inventory_id='$inventory_id' and done='0' and employee_id='$id_employee'";
												$result1 = $conn->query($sql1);	
												if ($result1->num_rows > 0) {
				while($row1 = $result1->fetch_assoc()) {
				
					
					$new_qty=$row1['qty']+1;
					
					
					$sql2 = "Update inventory_invoice  set qty=\"$new_qty\" where inventory_id ='$inventory_id' and done=0  and employee_id='$id_employee'";
					if ($conn->query($sql2) === TRUE) {
							
					$sql10 = "Update inventory_branch set qty=\"$quantityrenz\" where inventory_id ='$inventory_id'";
					if ($conn->query($sql10) === TRUE) {
					   header("Location: index.php?page=invoice");	
					}
					else{
						echo "Error Inserting Record4: " . mysqli_error($conn);
					}
					   	
					}
					else{
						echo "Error Inserting Record3: " . mysqli_error($conn);
					}
				}
			}
			
			else{
				$sql5 = "INSERT INTO inventory_invoice (inventory_id,qty,price,employee_id,branch,invoice_id,invoice_by,done,date_invoice)
				VALUES (\"$inventory_id\",'1',\"$price\",'$id_employee','$branch','0','0','0','00000000')";
				if ($conn->query($sql5) === TRUE) {
				$sql10 = "Update inventory_branch  set qty=\"$quantityrenz\" where id ='$id'";
					if ($conn->query($sql10) === TRUE) {
					   header("Location: index.php?page=invoice");	
					}
					else{
						echo "Error Inserting Record2: " . mysqli_error($conn);
					}
				}
				else{
				 echo "Error Inserting record1: " . mysqli_error($conn);
					}
			
					}
												}
											}


}
function remove_invoice(){
	$id=$_GET['ID'];
include ("views/connect.php");	
		$id_employee = $_SESSION['user_id'];
		// Create connection
		
		$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												
											} 
	if($branch=='MAIN'){
		$sql = "SELECT * FROM inventory_invoice where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {
	 $inventory_id= $row['inventory_id'];
	 $qty= $row['qty'];
	
	}
	$sql2 = "SELECT * FROM inventory where id='$inventory_id'";
	$result2 = $conn->query($sql2);	
	while($row2 = $result2->fetch_assoc()) {
		$total= $row2['quantity'] + $qty;
		
		$sql2 = "Update inventory  set quantity=\"$total\" where id ='$inventory_id' ";
				if ($conn->query($sql2) === TRUE) {
					$sql4 = "delete from inventory_invoice where id='$id'";
					if ($conn->query($sql4) === TRUE) {
				header("Location: index.php?page=invoice");	
					}
					else{
				 echo "Error REMOVING record: " . mysqli_error($conn);
					}	
				}
				else{
				 echo "Error Inserting record: " . mysqli_error($conn);
					}	
	}

	}
	else{
$sql = "SELECT * FROM inventory_invoice where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {
	 $inventory_id= $row['inventory_id'];
	 $qty= $row['qty'];
	
	}
	$sql2 = "SELECT * FROM inventory_branch where inventory_id='$inventory_id' and branch='$branch'";
	$result2 = $conn->query($sql2);	
	while($row2 = $result2->fetch_assoc()) {
		$total= $row2['qty'] + $qty;
		
		$sql2 = "Update inventory_branch  set qty=\"$total\" where inventory_id ='$inventory_id' and branch='$branch'";
				if ($conn->query($sql2) === TRUE) {
					$sql4 = "delete from inventory_invoice where id='$id'";
					if ($conn->query($sql4) === TRUE) {
				header("Location: index.php?page=invoice");	
					}
					else{
				 echo "Error REMOVING record: " . mysqli_error($conn);
					}	
				}
				else{
				 echo "Error Inserting record: " . mysqli_error($conn);
					}	
	}

		

	}
}
function done_invoice(){
	$client_name =$_POST['client_name'];
$contact_number =$_POST['contact_number'];
$address =$_POST['address'];
$other_charges =$_POST['other_charges'];
$invoice_number =$_POST['invoice_number'];
$date_today =date('Y-m-d');
$id_employee = $_SESSION['user_id'];
		
include ("views/connect.php");	
		$sql5 = "SELECT * FROM accounts where id='$id_employee'";
											$result5 = $conn->query($sql5);	
											while($row5 = $result5->fetch_assoc()) 
											{
												$branch=$row5['branch'];
												
											} 
	
	$sql = "INSERT INTO invoice_history (client_name,address,contact_number,service_charge,invoice_number,employee_id,date_invoice,branch)
VALUES (\"$client_name\",\"$address\",\"$contact_number\",\"$other_charges\",\"$invoice_number\",\"$id_employee\",'$date_today','$branch')";
if ($conn->query($sql) === TRUE) {
	$sql2 = "select * from invoice_history order by id desc limit 1";
	$result2 = $conn->query($sql2);
		while($row2 = $result2->fetch_assoc()) {
			$invoice_id=$row2['id'];
		}
		$sql3 = "update inventory_invoice set invoice_id='$invoice_id',done='1',date_invoice='$date_today' where done='0' and employee_id='$id_employee'";
	if ($conn->query($sql3) === TRUE) {
		  header("Location: index.php?page=invoice");	
	}
	else{
		echo "Error Inserting record: " . mysqli_error($conn);
			
	}


}
else{
echo "Error Inserting record: " . mysqli_error($conn);
			}

}
function sales_report_done(){
	$from=$_POST['from'];
	$to=$_POST['to'];
	$branch=$_POST['branch'];
	
	
	if($branch=='ALL'){
			include ("views/all_sales_report.php");
	}
	else if($branch=='MAIN'){
			include ("views/main_sales_report.php");
	}
	else{
		
				include ("views/branch_sales_report.php");
	
	}
	
	
	
	
	
	
}
?>