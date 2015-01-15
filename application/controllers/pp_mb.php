<?php

session_start();
include('header_mb.php');

function setExpressCheckout($nvpreq) {
	
	ini_set('xdebug.var_display_max_data', -1);

	//declaring of global variables
	global $API_Endpoint, $version , $API_UserName, $API_Password, $API_Signature;
	global $USE_PROXY, $PROXY_HOST, $PROXY_PORT;
	global $gv_ApiErrorURL;
	global $sBNCode;

	//setting the curl parameters.
	$ch = curl_init();
	
	$API_Endpoint = 'https://api-3t.sandbox.paypal.com/nvp';
	
	curl_setopt($ch, CURLOPT_URL,$API_Endpoint);
	
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	//turning off the server and peer verification(TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
	
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
	
	//getting response from server
	$response = curl_exec($ch);


	//convrting NVPResponse to an Associative Array
	$nvpResArray=deformatNVP($response);
	echo "nvpResArray = <br>";
	var_dump($nvpResArray);
	

	curl_close($ch);


	return $nvpResArray;
}

if (isset($_POST['item'])) $item = $_POST['item']; 
if (isset($_POST['qty'])) $qty = $_POST['qty']; 

$L_PAYMENTREQUEST_0_QTY0 = $qty;
$L_PAYMENTREQUEST_0_AMT0 = 0.95;
$L_PAYMENTREQUEST_0_DESC0 = $item;
$L_PAYMENTREQUEST_0_NUMBER0= '00001';
$L_PAYMENTREQUEST_0_NAME0= $item;
$PAYMENTREQUEST_0_ITEMAMT = $L_PAYMENTREQUEST_0_QTY0 * $L_PAYMENTREQUEST_0_AMT0;
$PAYMENTREQUEST_0_AMT = $PAYMENTREQUEST_0_ITEMAMT;


$nvpreq = 'METHOD=SetExpressCheckout';
$nvpreq = $nvpreq . '&VERSION=109.0';
$nvpreq = $nvpreq . '&PWD=1403625272&';
$nvpreq = $nvpreq . '&USER=matthewbeyer-facilitator_api1.hotmail.com';
$nvpreq = $nvpreq . '&SIGNATURE=AWic5ux4Zy0Xa.FJJuVE5axMZy9gAYlNKkGe6zQxwJCxHfVtdj3yZfL1';
$nvpreq = $nvpreq . '&PAYMENTREQUEST_0_AMT=' .$PAYMENTREQUEST_0_AMT;
$nvpreq = $nvpreq . '&RETURNURL=http://www.google.com&';
$nvpreq = $nvpreq . '&CANCELURL=http://localhost/paypal/cancel.php';
$nvpreq = $nvpreq . '&PAYMENTREQUEST_0_CURRENCYCODE=GBP';
$nvpreq = $nvpreq . '&PAYMENTREQUEST_0_ITEMAMT=' .$PAYMENTREQUEST_0_ITEMAMT;
$nvpreq = $nvpreq . '&L_PAYMENTREQUEST_0_NAME0=' .$L_PAYMENTREQUEST_0_NAME0;
$nvpreq = $nvpreq . '&L_PAYMENTREQUEST_0_NUMBER0=' .$L_PAYMENTREQUEST_0_NUMBER0;
$nvpreq = $nvpreq . '&L_PAYMENTREQUEST_0_DESC0=' .$L_PAYMENTREQUEST_0_DESC0;
$nvpreq = $nvpreq . '&L_PAYMENTREQUEST_0_AMT0=' .$L_PAYMENTREQUEST_0_AMT0;
$nvpreq = $nvpreq . '&L_PAYMENTREQUEST_0_QTY0=' .$L_PAYMENTREQUEST_0_QTY0;
$nvpreq = $nvpreq . '&LOGOIMG=http://localhost/paypal/img/logo.jpg&BUTTONSOURCE=PP-DemoPortal-CodeSamples-php';


$res = setExpressCheckout($nvpreq);
$token = $res['TOKEN'];
$_SESSION['token'] = $token;



$payPalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=';
$payPalURL = $payPalURL . $token;
header("Location:".$payPalURL);





?>

