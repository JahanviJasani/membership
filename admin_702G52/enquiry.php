
<?php 
include "../db-config.php";

@session_start();

if($_SESSION['id']=="" && $_SESSION['name']=="" && $_SESSION['name']=="")
{
	header('Location: index.php');
}

if(isset($_REQUEST['did']))
{
	$del = mysqli_query($db," Delete from tbl_enquiry where id = '".$_REQUEST['did']."' ");
	if($del)
	{
		?>
		<script>
			alert("Deleted Successfully..!");
			window.location.href = "enquiry.php";
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
						<a href="#">Query form</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Query form</h2>
						<a href="export-query.php" style="float:right;">Export</a>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								<th>S No</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone No.</th>
							
								<th>Date</th>
								<th>Action</th>
								
							  </tr>
						  </thead>   
						  <tbody> 
							<?php 
								$qry = mysqli_query($db," Select * from tbl_enquiry order by id desc");
								$i=1;
								while($data = mysqli_fetch_array($qry)){
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo ucfirst($data['name']); ?></td>
								<td class="center"><?php echo $data['email']; ?></td>
								<td class="center"><?php echo $data['phone']; ?></td>
							
								<td class="center"><?php echo date("d-m-Y", strtotime($data['enquiry_date'])); ?></td>
								<td class="center">
									
									<a class="btn btn-danger" href="enquiry.php?did=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
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

		
