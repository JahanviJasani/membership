<?php  

	date_default_timezone_set("Asia/Kolkata");
	include "db-config.php";

	$name	= mysqli_real_escape_string($db,$_REQUEST['name']);
	$email = mysqli_real_escape_string($db,$_REQUEST['email']);
	$phone = mysqli_real_escape_string($db,$_REQUEST['phone']);
	$plan_type = mysqli_real_escape_string($db,$_REQUEST['plan_type']);	
				
	// csrf checking		
	$csrf_check=explode($_SERVER['HTTP_HOST'],$_SERVER["HTTP_REFERER"]);
	$csrf_check_staus=0;

	if(count($csrf_check)>=2){
		if(isset($csrf_check[0])){
			if($csrf_check[0]=='http://' || $csrf_check[0]=='https://'){
				$csrf_check_staus=1;
			}
		}	
	}

	if($csrf_check_staus==0){
		//echo 'CSRF failed';
		header("HTTP/1.1 404 Not Found");
		header("Location: /CSRF-failed");
		die();
	}					
	// csrf checking end						
	$site_url="";
	$insert = mysqli_query($db,"insert into tbl_enquiry set 
															name				=		'$name',
															email					=		'$email',
															phone					=		'$phone',
															plan_type					=		'$plan_type',
															enquiry_date			=		Now()
												")or die("Error".mysql_error());   																
	if($insert)
	{
		include "enquiry-mail-admin.php";
		echo "succ"; 
	}
			
?>