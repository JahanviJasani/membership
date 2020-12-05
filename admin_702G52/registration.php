<?php

@session_start();

if($_SESSION['id']=="" && $_SESSION['name']=="" && $_SESSION['name']=="")
{
	header('Location: index.php');
}
include "../db-config.php";

if(isset($_REQUEST['did']))
{
	$del = mysql_query(" Delete from tbl_contact where id = '".$_REQUEST['did']."' ");
	if($del)
	{
		?>
		<script>
			alert("Deleted Successfully..!");
			window.location.href = "registration.php";
		</script>
		<?php
	}
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
						<a href="#">Registration</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Registration Database</h2>
						<a href="export-contact.php" style="float:right;">Export</a>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								<th>S No</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Phone No.</th>
								<th>Application</th>
								<th>Date</th>
								<th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php 
								$qry = mysql_query(" Select * from tbl_contact order by id desc");
								$i=1;
								while($data = mysql_fetch_array($qry)){
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td class="center"><?php echo $data['first_name']; ?></td>
								<td class="center"><?php echo $data['last_name']; ?></td>
								<td class="center"><?php echo $data['email']; ?></td>
								<td class="center"><?php echo $data['phone']; ?></td>
								<td class="center"><?php echo $data['application']; ?></td>
								<td class="center"><?php  echo date("d-m-Y", strtotime($data['created_date'])); ?></td>
								<td class="center">
								
									<a class="btn btn-success" href="registration-detail.php?uid=<?php echo $data['id']; ?>" target="_blank">
										<i class="icon-zoom-in icon-white"></i>
										View
									</a>
								
									<a class="btn btn-danger" href="registration.php?did=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
								<?php $i++; } ?>
						  
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
					
			

			
				  

		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		
		
		<!-- Header Section --->
		<?php include "common/footer.php"; ?>
		<!-- Header Section --->

		
