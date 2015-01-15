<?php 

include('header_mb.php');
session_start();

function getExpressCheckoutDetails($nvpStr) {
	

	ini_set('xdebug.var_display_max_data', -1);

	//declaring of global variables
	global $API_Endpoint, $version , $API_UserName, $API_Password, $API_Signature;
	global $USE_PROXY, $PROXY_HOST, $PROXY_PORT;
	global $gv_ApiErrorURL;
	global $sBNCode;

	//setting the curl parameters.
	$ch = curl_init();
	

	$API_Endpoint = 'https://api-3t.sandbox.paypal.com/nvp';
	
	echo "API_Endpoint " . $API_Endpoint . "<br>";
	curl_setopt($ch, CURLOPT_URL,$API_Endpoint);
	
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	//turning off the server and peer verification(TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
	
	//if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
   //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php 
	if($USE_PROXY)
		curl_setopt ($ch, CURLOPT_PROXY, $PROXY_HOST. ":" . $PROXY_PORT); 

	//NVPRequest for submitting to server
	$nvpreq=
		"METHOD=GetExpressCheckoutDetails" . 
		"&VERSION=109.0" . 
		"&PWD=1403625272" . 
		"&USER=matthewbeyer-facilitator_api1.hotmail.com" . 
		"&SIGNATURE=AWic5ux4Zy0Xa.FJJuVE5axMZy9gAYlNKkGe6zQxwJCxHfVtdj3yZfL1" . 
		$nvpStr .
		"&BUTTONSOURCE=PP-DemoPortal-CodeSamples-php";

	//setting the nvpreq as POST FIELD to curl
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

	//getting response from server
	$response = curl_exec($ch);
	
	//convrting NVPResponse to an Associative Array
	$nvpResArray=deformatNVP($response);
	$nvpReqArray=deformatNVP($nvpreq);
	
	
	$_SESSION['nvpReqArray']=$nvpReqArray;

	curl_close($ch);


	return $nvpResArray;
}


$token = $_SESSION['token'];
$methodName = 'GetExpressCheckoutDetails';
$nvpstr= "&TOKEN=" . $token;

$res = getExpressCheckoutDetails($nvpstr);


function doExpressCheckoutPayment($nvpStr) {
	
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
	
	//if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
   //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php 
	if($USE_PROXY)
		curl_setopt ($ch, CURLOPT_PROXY, $PROXY_HOST. ":" . $PROXY_PORT); 

	//NVPRequest for submitting to server
	$nvpreq=
		"METHOD=DoExpressCheckoutPayment" . 
		"&VERSION=109.0" . 
		"&PWD=1403625272" . 
		"&USER=matthewbeyer-facilitator_api1.hotmail.com" . 
		"&SIGNATURE=AWic5ux4Zy0Xa.FJJuVE5axMZy9gAYlNKkGe6zQxwJCxHfVtdj3yZfL1" . 
		$nvpStr .
		"&BUTTONSOURCE=PP-DemoPortal-CodeSamples-php";

	//setting the nvpreq as POST FIELD to curl
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
	
	//getting response from server
	$response = curl_exec($ch);

	//convrting NVPResponse to an Associative Array
	$nvpResArray=deformatNVP($response);
	$nvpReqArray=deformatNVP($nvpreq);
	
	
	$_SESSION['nvpReqArray']=$nvpReqArray;
	curl_close($ch);

	return $nvpResArray;
}

$token = $_SESSION['token'];

$nvpstr = '&TOKEN=' . $token;
$nvpstr = $nvpstr . '&PAYERID=' . $res['PAYERID'];
$nvpstr = $nvpstr . '&IPADDRESS=localhost';
$nvpstr = $nvpstr . '&PAYMENTREQUEST_0_AMT=' . $res['PAYMENTREQUEST_0_AMT'] ;
$nvpstr = $nvpstr . '&PAYMENTREQUEST_0_CURRENCYCODE=' . $res['PAYMENTREQUEST_0_CURRENCYCODE'];


$res = doExpressCheckoutPayment($nvpstr);
//var_dump($res);



?>