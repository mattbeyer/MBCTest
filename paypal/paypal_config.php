<?php
//Seller Sandbox Credentials- Sample credentials already provided
define("PP_USER_SANDBOX", "matthewbeyer-facilitator_api1.hotmail.com");
define("PP_PASSWORD_SANDBOX", "1403625272");
define("PP_SIGNATURE_SANDBOX", "AWic5ux4Zy0Xa.FJJuVE5axMZy9gAYlNKkGe6zQxwJCxHfVtdj3yZfL1");

//Seller Live credentials.
define("PP_USER","mattwilliambeyer_api1.gmail.com");
define("PP_PASSWORD", "4E34GXC2JHP7LX54");
define("PP_SIGNATURE","AFcWxV21C7fd0v3bYYYRCpSSRl31AAfrEyRLnX3KBGGrN1W8bOwY3Pvl");

//Set this constant EXPRESS_MARK = true to skip review page
define("EXPRESS_MARK", true);

//Set this constant ADDRESS_OVERRIDE = true to prevent from changing the shipping address
define("ADDRESS_OVERRIDE", true);

//Set this constant USERACTION_FLAG = true to skip review page
define("USERACTION_FLAG", false);

//Based on the USERACTION_FLAG assign the page
if(USERACTION_FLAG){
	$page = 'return.php';
} else {	
	$page = 'review.php';
}

//The URL in your application where Paypal returns control to -after success (RETURN_URL) using Express Checkout Mark Flow
define("RETURN_URL_MARK",'http://'.$_SERVER['HTTP_HOST'].preg_replace('/paypal_ec_redirect.php/','return.php',$_SERVER['SCRIPT_NAME']));

//The URL in your application where Paypal returns control to -after success (RETURN_URL) and after cancellation of the order (CANCEL_URL) 
define("RETURN_URL",'http://'.$_SERVER['HTTP_HOST'].preg_replace('/paypal_ec_redirect.php/',$page,$_SERVER['SCRIPT_NAME']));
define("CANCEL_URL",'http://'.$_SERVER['HTTP_HOST'].preg_replace('/paypal_ec_redirect.php/','cancel.php',$_SERVER['SCRIPT_NAME']));

//Whether Sandbox environment is being used, Keep it true for testing
define("SANDBOX_FLAG", true);

//Proxy Config
define("PROXY_HOST", "127.0.0.1");
define("PROXY_PORT", "808");

//Express Checkout URLs for Sandbox
define("PP_CHECKOUT_URL_SANDBOX", "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=");
define("PP_NVP_ENDPOINT_SANDBOX","https://api-3t.sandbox.paypal.com/nvp");

//Express Checkout URLs for Live
define("PP_CHECKOUT_URL_LIVE","https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=");
define("PP_NVP_ENDPOINT_LIVE","https://api-3t.paypal.com/nvp");

//Version of the APIs
define("API_VERSION", "109.0");

//ButtonSource Tracker Code
define("SBN_CODE","PP-DemoPortal-CodeSamples-php");
?>