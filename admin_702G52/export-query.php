<?php 
include "../db-config.php";
@session_start();

if($_SESSION['id']=="" && $_SESSION['name']=="" && $_SESSION['name']=="")
{
	header('Location: index.php');
}

	$header = '';
	$data ='';
	//$header .="S.No. \t Name \t Phone No. \t Email  \t City  \t State \t Query Type  \t Message  \t Date \t";
	$header .="S.No. \t Name \t Phone No. \t Email  \t Date \t";

$data	= '';
$i=0;


$qry = mysqli_query($db," Select * from tbl_enquiry order by id desc");
while($users = mysqli_fetch_array($qry)){
$i++;
	$line 						= '';
	$name						= ucfirst($users['name']);
	$phone						= $users['phone'];
	$email						= $users['email'];
	//$city						= $users['city'];
	//$state						= $users['state'];
	//$query_type				= $users['query_type'];
	//$message					= $users['message'];
	$date						= date("d-m-Y", strtotime($users['enquiry_date']));
	

	
	//$line .= $i."\t".$name."\t".$phone."\t".$email."\t".$city."\t".$state."\t".$query_type."\t".$message."\t".$date."\t  \t" ;
	$line .= $i."\t".$name."\t".$phone."\t".$email."\t".$date."\t  \t" ;
	
	$data .= trim( $line )."\n" ;
}
// exit;
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}

$date = new DateTime();
$ts = $date->format("Y-m-d-G-i-s");

// A name with a time stamp, to avoid duplicate filenames
$filename = "query-$ts.xls";

// allow exported file to download forcefully
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
	
	
 ?>