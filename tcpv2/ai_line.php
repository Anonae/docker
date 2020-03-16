<?

include("../../main_include.php");
//print_r($_POST);
$amount = $_POST['qr'];
$amount = substr($amount,-4);
echo "I got you Coupon- $amount";