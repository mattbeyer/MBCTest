<?php

session_start();

class Checkout_pp extends CI_Controller {


	public function index() {

		$this->load->library('paypal');
		
		
		$contents = $this->cart->contents();
		$cart = [];
		$item_num = 0;

		//var_dump($contents);
		
		foreach ($contents as $content) {
		
			$cart[$item_num] = array(
			
				'item' => $content['name'],
				'qty' => $content['qty'],
				'amt' =>$content['price']
			
			);
			
			$item_num++;
			
		}


	
		$list_item_n = 0;
		$PAYMENTREQUEST_0_AMT = 0;		
		$nvpreq = 'METHOD=SetExpressCheckout';
		
	
		foreach ($cart as $item) {
	
			$name = $cart[$list_item_n]['item'];
			$qty = $cart[$list_item_n]['qty'];
			$amt = $cart[$list_item_n]['amt'];	
			
			$L_PAYMENTREQUEST_0_NAMEn_name = "L_PAYMENTREQUEST_0_NAME" . $list_item_n;		
			$L_PAYMENTREQUEST_0_QTYn_name = "L_PAYMENTREQUEST_0_QTY" . $list_item_n;
			$L_PAYMENTREQUEST_0_AMTn_name = "L_PAYMENTREQUEST_0_AMT" . $list_item_n;		
			
			$L_PAYMENTREQUEST_0_NAMEn_value = $name;		
			$L_PAYMENTREQUEST_0_QTYn_value = $qty;
			$L_PAYMENTREQUEST_0_AMTn_value = $amt;		

			$PAYMENTREQUEST_n_ITEMAMT_name = 'PAYMENTREQUEST_' . $list_item_n . '_ITEMAMT';		
			$PAYMENTREQUEST_n_ITEMAMT_value = $L_PAYMENTREQUEST_0_QTYn_value * $L_PAYMENTREQUEST_0_AMTn_value;
			
			
			$PAYMENTREQUEST_0_AMT = $PAYMENTREQUEST_0_AMT + $PAYMENTREQUEST_n_ITEMAMT_value;

			$nvpreq = $nvpreq . '&' . $L_PAYMENTREQUEST_0_NAMEn_name . '=' .$L_PAYMENTREQUEST_0_NAMEn_value;
			$nvpreq = $nvpreq . '&' . $L_PAYMENTREQUEST_0_QTYn_name . '=' . $L_PAYMENTREQUEST_0_QTYn_value;
			$nvpreq = $nvpreq . '&' . $L_PAYMENTREQUEST_0_AMTn_name . '=' . $L_PAYMENTREQUEST_0_AMTn_value;	
			
			$list_item_n = $list_item_n + 1;
		
		}
		
	
		$nvpreq = $nvpreq . '&PAYMENTREQUEST_0_AMT=' .$PAYMENTREQUEST_0_AMT;

		$nvpreq = $nvpreq . '&PAYMENTREQUEST_0_CURRENCYCODE=GBP';		
		$nvpreq = $nvpreq . '&RETURNURL=' . base_url(). '/index.php/ctest/pp_review&';
		$nvpreq = $nvpreq . '&CANCELURL=' . base_url(). '/paypal/cancel.php';		

	
		$res = $this->paypal->pp_merchant($nvpreq);
		
		$token = $res['TOKEN'];
		$_SESSION['token'] = $token;

		$payPalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=';
		$payPalURL = $payPalURL . $token;	
				
		
		header("Location:".$payPalURL);
		
	}

}


?>
