<?php
require_once 'DBOperations.php';


class Validator{
    
public function ValidateCoupon($coupon)
{
    
   // $res= filter_var($coupon,FILTER_SANITIZE_STRING);
    $res=  ctype_alnum($coupon);
   
    if( preg_match('/^[a-zA-Z0-9]', $coupon))
    {
        echo "valid";
        
    }
    else
    {
        echo "invalid";
    }
    if($res)
    {//echo "hi $coupon";
        $conn=new DBOperations();
        $conn->searchCouponsDB($coupon);
    }
    else
    {
        echo "Invalid input $coupon";
    }
}
}
$coupon=$_GET['couponname'];
//echo $coupon;

$obj=new Validator();
$obj->ValidateCoupon($coupon);


?>
