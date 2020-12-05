<?php  

require_once $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";

use Razorpay\Api\Api;

$api_key = 'rzp_live_IhvIUuVzOpQVTn';
$api_secret = 'fKuoq5az3mrlQgFIx2k7CiyE';
$api = new Api($api_key, $api_secret);

$orderData = [
    'receipt'         => $_POST['email'],
    'amount'          => $_POST['amount'] * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];

// $name=$_POST["functionname"];//receiving name field value in $name variable  
// $password=$_POST["arguments"];//receiving password field value in $password variable  
$myObj = new \stdClass();
$myObj->id = $razorpayOrderId;
$myObj->amount = $_POST['amount'];
$myObj->phone = $_POST['phone'];
$myObj->email = $_POST['email'];


echo json_encode($myObj);
?>  