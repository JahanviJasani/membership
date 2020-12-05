<?php

@session_start();

if($_SESSION['id']=="" && $_SESSION['name']=="" && $_SESSION['name']=="")
{
	header('Location: index.php');
}
include "../db-config.php";

if(isset($_REQUEST['uid']))
{
	$eid = $_REQUEST['uid'];
	$qry_user = mysqli_query($db,"Select * from tbl_enquiry where id = '".$eid."'")or die("Error in Query-".mysql_error());
	$rows = mysqli_num_rows($qry_user);
	if($rows>0)
	{
		$data = mysqli_fetch_array($qry_user);
	}
	else 
	{
		?>
		<script>
			alert("User Not Found..!");
			window.location.href = "enquiry.php";
		</script>
		<?php
	}
	
}
else
{
	
		?>
		<script>
			alert("User Not Found..!");
			window.location.href = "enquiry.php";
		</script>
		<?php
}
?>



<!-- Header Section --->
<?php include "common/header.php"; ?>
<!-- Header Section --->
		
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- Header Section --->
			<?php include "common/left-menu.php"; ?>
			<!-- Header Section --->
			
			
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="enquiry.php">Enquiry</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Enquiry Detail(<?php echo ucfirst($data['name']); ?>)</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-plus"></i>Enquiry Detail(<?php echo ucfirst($data['name']); ?>)</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped">
							<tr>
								<td><h3>Name</h3></td>
								<td><code><?php echo $data['name']; ?></code></td>
							</tr>
							
							<tr>
								<td><h3>Email</h3></td>
								<td><code><?php echo $data['email']; ?></code></td>
							</tr>
							<tr>
								<td><h3>Phone Number</h3></td>
								<td><code><?php echo $data['phone']; ?></code></td>
							</tr>
							<tr>
								<td><h3>Postal Zip Code</h3></td>
								<td><code><?php echo $data['state']; ?></code></td>
							</tr>
							<tr>
								<td><h3>City</h3></td>
								<td><code><?php echo $data['city']; ?></code></td>
							</tr>
							
							
							<tr>
								<td><h3>Query Type</h3></td>
								<td><code><?php echo $data['query_type']; ?></code></td>
							</tr>
							<tr>
								<td><h3>Message</h3></td>
								<td><code><?php echo $data['message']; ?></code></td>
							</tr>
							
							
							<tr>
								<td><h3>Query Date</h3></td>
								<td><code><?php  echo date("d-m-Y", strtotime($data['enquiry_date'])); ?></code></td>
							</tr>
							
						</table>
					</div>	
				</div><!--/span-->
				
				<p class="center">
							<a href="enquiry.php" class="btn btn-large btn-primary"><i class="icon-chevron-left icon-white"></i> Back</a> 
						</p>
				
			</div><!--/row-->
			
					
			

			
				  

		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		
		
		<!-- Header Section --->
		<?php include "common/footer.php"; ?>
		<!-- Header Section --->

		
