<?php  

require_once $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";

use Razorpay\Api\Api;

$phone = $_POST['phone'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$plan_name = $_POST['plan_name'];
$plan_type = $_POST['plan_type'];
$plan_category = $_POST['plan_category'];

$api_key = 'rzp_live_IhvIUuVzOpQVTn';
$api_secret = 'fKuoq5az3mrlQgFIx2k7CiyE';

$api = new Api($api_key, $api_secret);
$attrbutes  = array('razorpay_signature'  => $_POST['signature'],  
                    'razorpay_payment_id'  => $_POST['payment_id'] ,  
                    'razorpay_order_id' => $_POST['order_id']);
try {
    $order  = $api->utility->verifyPaymentSignature(array('razorpay_signature'  => $_POST['signature'],'razorpay_payment_id'  => $_POST['payment_id'] ,'razorpay_order_id' => $_POST['order_id']));
    if (isset($_POST['company']) )
    {
        $company = $_POST['company'];
        include "payment-corporatemail-admin.php";
        echo ("done");
    }else{
        $nom = $_POST['nom'];
        include "payment-mail-admin.php";
        echo ("done");
    }
    }
    //catch exception
    catch(Exception $e) {
    echo 'error: ' .$e->getMessage();
    }
?>  