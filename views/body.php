   
   <?php
$sql = "SELECT COUNT(id) FROM inventory where quantity<=5";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
			$renzcabato=$row['COUNT(id)'];
		}
$sql1 = "SELECT COUNT(id) FROM inventory_branch where qty<=5";
		$result1 = $conn->query($sql1);	
		
		while($row1 = $result1->fetch_assoc()) {
			$renzcabato1=$row1['COUNT(id)'];
		}
		$total_renz=$renzcabato1+$renzcabato;
?> 
   
   
   <body>
       
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
						 <ul class="widget widget-menu unstyled">
                                <li class="active" align='center' style='background-color: rgba(0, 0, 0,.7);' ><img src='assets/ico/Logo.png' style='height:150px;width:150px;background-color: rgba(0, 0, 0,.01);border-radius: 25px;border:5px' alt='renz' border="5"></img></li>
                             </ul>
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php?page=home"><i class="menu-icon icon-dashboard"></i>
								Home
                                </a></li> <li class="active"><a href="index.php?page=inventory_view"><i class="menu-icon icon-table"></i>
								Inventory View
                               <b class="label orange pull-right">
                                    <?php
									echo"$total_renz";?></b> </a></li>
                               
								<li><a class="collapsed" data-toggle="collapse" href="#togglePages">
								<i class="icon-chevron-down pull-right"></i><i class="menu-icon icon-tasks">
                                </i>History</a>
                                    <ul id="togglePages" class="collapse unstyled">
											<li><a href="index.php?page=delivery_history"><i class="menu-icon icon-inbox"></i>Delivered History</a></li>
											<li><a href="index.php?page=pull_out_history"><i class="menu-icon icon-inbox"></i>Pull Out History</a></li>
											<li><a href="index.php?page=transfer_history"><i class="menu-icon icon-tasks"></i>Transfer History</a></li>
                            
                                    </ul>
                                </li>
                              </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="index.php?page=repair"><i class="menu-icon icon-cog"></i>Pending Work </a></li>
                                <li><a href="index.php?page=assign_personel"><i class="menu-icon icon-book"></i>Technician </a></li>
                                <li><a href="index.php?page=done_repair_na"><i class="menu-icon icon-cog"></i>Done Repair </a></li>
                                <li><a href="index.php?page=done_released"><i class="menu-icon icon-cog"></i>History Repair </a></li>
                                <li><a href="index.php?page=invoice"><i class="menu-icon icon-paste"></i>Invoice </a></li>
                                <li><a href="index.php?page=invoice_history"><i class="menu-icon icon-eye-open"></i>Invoice History</a></li>
                                <li><a href="index.php?page=sales_report"><i class="menu-icon icon-money"></i>Sales Report</a></li>
                                <li><a href="index.php?page=account"><i class="menu-icon icon-group"></i>Accounts</a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                
                                <li><a href="controllers/logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
						</div>
						
                        <!--/.sidebar-->
                    
    
