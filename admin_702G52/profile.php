<?php 
@session_start();
include "../db-config.php";

if($_SESSION['id']=="" || $_SESSION['name']=="" || $_SESSION['name']=="")
{
	header('Location: index.php');
}
else {
$id = $_SESSION['id'];
$data = mysqli_fetch_array(mysqli_query($db,"Select * from user where id = '$id'"));

if(isset($_POST['profile-submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	$new_password=$data['pass'];
	if($pass!='notchange'){
		$new_password=md5($pass);
	}
	$update = mysqli_query($db," update user set 
										name		=		'$name',
										email		=		'$email',
										phone		=		'$phone',
										uname		=		'$uname',
										pass		=		'$new_password',
										status		=		1,
										created_date=		Now()
										");
	if($update)
	{
		?>
		<script>
			alert("Updated Successfully..!");
			window.location.href = "profile.php";
		</script>
		<?php
	}
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
						<a href="dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Profile</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Admin Profile</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="" method="post">
						  <fieldset>
							
							<div class="control-group">
								<label class="control-label" for="name">Name</label>
								<div class="controls">
								 <input type="name" class="input-xlarge focused" id="name" value="<?php echo $data['name']; ?>" name="name" placeholder="Enter Name" onkeyup="return Remove('name');" maxlength="70">
								<span id="error_name" class="error-msg" ></span>
								</div>
							 </div>
							
							<div class="control-group">
								<label class="control-label" for="email">Email address</label>
								<div class="controls">
									<input type="email" class="input-xlarge focused" id="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Enter email" onkeyup="return Remove('email');" maxlength="100">
									<span id="error_email" class="error-msg" ></span>
								</div>
							 </div>
							<div class="control-group">
								<label class="control-label" for="phone">Phone Number</label>
								<div class="controls">
									<input type="text" class="input-xlarge focused" id="phone" name="phone" value="<?php echo $data['phone']; ?>" placeholder="Enter Phone" onkeyup="return Remove('phone');" maxlength="15">
									<span id="error_phone" class="error-msg" ></span>
								</div>
							 </div>
							 
							
							<div class="control-group">
								<label class="control-label" for="uname">Username</label>
								<div class="controls">
									<input type="text" class="input-xlarge focused" id="uname" name="uname" value="<?php echo $data['uname']; ?>" placeholder="Enter Phone" onkeyup="return Remove('uname');" maxlength="50">
									<span id="error_uname" class="error-msg" ></span>
								</div>
							 </div>
							
							 <div class="control-group">
								<label class="control-label" for="pass">Password</label>
								<div class="controls">
									<input type="password" class="input-xlarge focused" id="pass" name="pass" value="notchange" placeholder="Password" onkeyup="return Remove('pass');" maxlength="50">
									<span id="error_pass" class="error-msg" ></span>
								</div>
							 </div>
							 
							<div class="control-group">
								<label class="control-label" for="pass">Confirm Password</label>
								<div class="controls">
									<input type="password" class="input-xlarge focused" id="con_pass" name="con_pass" value="notchange" placeholder="Confirm Password" onkeyup="return Remove('con_pass');" maxlength="50">
									<span id="error_con_pass" class="error-msg" ></span>
								</div>
							 </div>
							 
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" id ="profile-submit" name="profile-submit">Submit</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
			
			
			
					
			

			
				  

		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		
		
		<!-- Header Section --->
		<?php include "common/footer.php"; ?>
		<!-- Header Section --->

		<style>
		.error {
	border: 1px solid #e8383f !important;
}
.error-msg {
	color: #e8383f;
	font-size: 12px;
	left: 0;
	width: 100%;
}
	</style>
	
	<script>
	function Remove(id) {
		jQuery('#'+id).removeClass('error');
		jQuery('#error_'+id).html('');
	}
	
	jQuery(document).ready(function(){

	jQuery("#profile-submit").click(function(){
		
		var name				= jQuery("#name").val();
		
		var phone				= jQuery("#phone").val();

		var email				= jQuery("#email").val();
		
		var uname				= jQuery("#uname").val();
		var pass				= jQuery("#pass").val();
		var con_pass			= jQuery("#con_pass").val();
		
		var regex = /^[a-zA-Z ]*$/;

		var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);

		var valid = emailRegex.test(email);
		if (name == "") {
			jQuery('#name').addClass('error');
			jQuery('#error_name').html('Please Enter Name');
			jQuery("#name").focus();
			return false;

		}

		else if (!regex.test(name)) {

			 jQuery('#name').addClass('error');
			 jQuery('#error_name').html('Please Enter Valid Name');
			 jQuery("#name").focus();

			return false;

		}
		
		else if (email == "") {

			 jQuery('#email').addClass('error');
			 jQuery('#error_email').html('Please Enter Email');
			 jQuery("#email").focus(); 
			 return false;

		}

		else if (!valid) {

			 jQuery('#email').addClass('error');
			 jQuery('#error_email').html('Please Enter Valid Email');
			 jQuery("#email").focus();
			 return false;

		}
		else if (phone == "") 

		{

			 jQuery('#phone').addClass('error');
			 jQuery('#error_phone').html('Please Enter Phone No.');
			 jQuery("#phone").focus();
			 return false;

		}

		else if (isNaN(phone)) 

		{

			 jQuery('#phone').addClass('error');
			 jQuery('#error_phone').html('Please Enter Valid Phone No.');
			 jQuery("#phone").focus(); 
			 return false;

		}

		else if (phone.length<10) 

		{

			 jQuery('#phone').addClass('error');
			 jQuery('#error_phone').html('Please Enter Valid 10 Digits Phone No.');
			 jQuery("#phone").focus();
			 return false;

		}
		if (uname == "") {
			jQuery('#uname').addClass('error');
			jQuery('#error_uname').html('Please Enter UserName');
			jQuery("#uname").focus();
			return false;

		}
		if (pass == "") {
			jQuery('#pass').addClass('error');
			jQuery('#error_pass').html('Please Enter Password');
			jQuery("#pass").focus();
			return false;

		}
		if (con_pass == "") {
			jQuery('#con_pass').addClass('error');
			jQuery('#error_con_pass').html('Please Enter Confirm Password');
			jQuery("#con_pass").focus();
			return false;

		}
		if (con_pass != pass) {
			jQuery('#con_pass').addClass('error');
			jQuery('#error_con_pass').html('Password and Confirm Password did not Matched');
			jQuery("#con_pass").focus();
			return false;

		}
		

		

	});


});
	
	
	</script>
		
