<?php

class Paypal {

	public function deformatNVP ($nvpstr) {
	
		$intial = 0;
		$nvpArray = array();

		while(strlen($nvpstr))
		{
			//postion of Key
			$keypos= strpos($nvpstr, '=');
			//position of value
			$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

			/*getting the Key and Value values and storing in a Associative Array*/

			
			$keyval = substr($nvpstr, $intial, $keypos);
			$valval = substr($nvpstr, $keypos + 1, $valuepos - $keypos - 1);
			//decoding the respose
			$nvpArray[urldecode($keyval)] = urldecode( $valval);
			$nvpstr = substr($nvpstr, $valuepos + 1, strlen($nvpstr));
		 }
		return $nvpArray;

	}

	public function pp_merchant ($nvpreq) {
			
			//declaring of global variables
			global $API_Endpoint;

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

			$nvpreq = $nvpreq . '&VERSION=109.0';
			$nvpreq = $nvpreq . '&PWD=1403625272&';
			$nvpreq = $nvpreq . '&USER=matthewbeyer-facilitator_api1.hotmail.com';
			$nvpreq = $nvpreq . '&SIGNATURE=AWic5ux4Zy0Xa.FJJuVE5axMZy9gAYlNKkGe6zQxwJCxHfVtdj3yZfL1';
			$nvpreq = $nvpreq . '&BUTTONSOURCE=PP-DemoPortal-CodeSamples-php';
			
			
			curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
			
			//getting response from server
			$response = curl_exec($ch);
		
			$ci =& get_instance();
					
			
			//converting NVPResponse to an Associative Array
			
			$nvpResArray = $ci->paypal->deformatNVP($response);

			curl_close($ch);

			return $nvpResArray;
			
	}

}

?>