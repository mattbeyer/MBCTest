<?php

class Pp_review extends CI_Model {

	function index() {
	
	
	
	$this->load->library('paypal');	
	
	
	$token = $_SESSION['token'];
	$nvpstr = "&TOKEN=" . $token;

	$nvpreq =
	"METHOD=GetExpressCheckoutDetails" . 
	$nvpstr;
	
	
	$res = $this->paypal->pp_merchant($nvpreq);
	
	$token = $_SESSION['token'];

	$nvpstr = '&TOKEN=' . $token;
	$nvpstr = $nvpstr . '&PAYERID=' . $res['PAYERID'];
	$nvpstr = $nvpstr . '&IPADDRESS=localhost';
	$nvpstr = $nvpstr . '&PAYMENTREQUEST_0_AMT=' . $res['PAYMENTREQUEST_0_AMT'] ;
	$nvpstr = $nvpstr . '&PAYMENTREQUEST_0_CURRENCYCODE=' . $res['PAYMENTREQUEST_0_CURRENCYCODE'];

	$nvpreq =
		"METHOD=DoExpressCheckoutPayment" . 

		$nvpstr;
	
	$res = $this->paypal->pp_merchant($nvpreq);
	//var_dump($res);

	header("Location:" . base_url("index.php/ctest/checkout_success"));
	
	}
	
}




?>