<?php
require 'controllers/core.php';
require 'controllers/connect.php';


if(loggedin()){
	include ("views/connect.php");		
$id_employee = $_SESSION['user_id'];
		
		
	$sql5 = "SELECT * FROM accounts where id='$id_employee'";
	$result5 = $conn->query($sql5);	
	while($row5 = $result5->fetch_assoc()) 
		{
												$type=$row5['type'];
												
		} 
	if ($type=='ADMIN'){
	include ("views/header_1.php");
	include ("views/body.php");
	include ("controllers/page_controller.php");
	}
	else if ($type=='EMPLOYEE'){
	include ("views/header_1.php");
	include ("views/body_employee.php");
	include ("controllers/page_controller.php");
	}
	else if ($type=='TECHNICIAN'){
	include ("views/header_1.php");
	include ("views/technician.php");
	include ("controllers/page_controller.php");
	}
}
else{	
	include ("views/header.php");
	include ("views/login.php");
	include ("controllers/admin_controller.php");

	validate_loggedin();
}
?>