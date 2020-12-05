<?php
@session_start();

// if the user is logged in, unset the session
//unset($_SESSION['user']);
$_SESSION['id']="";
$_SESSION['name']="";
$_SESSION['email']="";
		unset($_SESSION['id']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		session_destroy(); 
header('Location: index.php');

?>