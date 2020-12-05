<!-- Header Section --->
<?php 
@session_start();
if($_SESSION['id']=="" || $_SESSION['name']=="")
{
	header('Location: index.php');
}


include "common/header.php"; ?>
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
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>
			
			
			
					
			

			
				  

		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		
		
		<!-- Header Section --->
		<?php include "common/footer.php"; ?>
		<!-- Header Section --->

		
