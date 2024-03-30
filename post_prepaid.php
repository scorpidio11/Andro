<?php

include_once 'inc/config.php';	

$afid = (isset($_SESSION['order']['afid'])) ? $_SESSION['order']['afid'] : '';
$click_id = (isset($_SESSION['order']['click_id'])) ? $_SESSION['order']['click_id'] : '';
$sid = (isset($_SESSION['order']['sid'])) ? $_SESSION['order']['sid'] : '';

$billing_info = $_SESSION["order"]["address_info"]["BA"];
$shipping_info = $_SESSION['order']['address_info']['SA'];	
$user_payment = $_SESSION["order"]["user_payment"];
$product = $_SESSION["order"]["product"];

if (!empty($_SESSION['prospectId'])) { 
	$limi_light = array(
		'sessionId' => session_id(),
		'username' => USERNAME,
		'password' => PASSWORD,
		'method' => 'NewOrderWithProspect', 
		'prospectId' => $_SESSION['prospectId'],
		'AFID' => $afid,
		'SID' => $sid,
		'click_id' => $click_id,
		'productId' => PP_PRODUCT,
		'product_qty_1' =>1,
		'campaignId' => PP_CAMPAIGN,
		'shippingId' => PP_SHIPPING,
		'creditCardType' => $user_payment['card_type'],
		'creditCardNumber' => $user_payment['card_code'],
		'expirationDate' => $user_payment['month'].''.$user_payment['year'],
		'CVV' => $user_payment['cvv'],
		'ipAddress' => $_SERVER['REMOTE_ADDR'],
		'tranType' => 'Sale',							
		'billingAddress1' => $billing_info['address'],
		'billingCity' => $billing_info['city'],
		'billingState' => $billing_info['state'],
		'billingZip' => $billing_info['zipcode'],
		'billingCountry' => $billing_info['country'],
		'site' => APIURL
  );		  
} else {  
	$limi_light = array(
		'sessionId' => session_id(),
		'username' => USERNAME,
		'password' => PASSWORD,
		'method' => 'NewOrder',
		'productId' => $product['product_id'],
		'productId' => PP_PRODUCT,
		'product_qty_1' => 1,
		'campaignId' => PP_CAMPAIGN,
		'shippingId' => PP_SHIPPING,
		'firstName' => $shipping_info['first_name'],
		'lastName' => $shipping_info['last_name'],
		'shippingAddress1' => $shipping_info['address'],
		'shippingCity' => $shipping_info['city'],
		'shippingState' => $shipping_info['state'],
		'shippingZip' => $shipping_info['zipcode'],
		'shippingCountry' => $shipping_info['country'],
		'billingFirstName' => $billing_info['first_name'],
		'billingLastName' => $billing_info['last_name'],
		'billingAddress1' => $billing_info['address'],
		'billingCity' => $billing_info['city'],
		'billingState' => $billing_info['state'],
		'billingZip' => $billing_info['zipcode'],
		'billingCountry' => $billing_info['country'],
		'phone' => $shipping_info['phone'],
		'email' => $shipping_info['email'],
		'creditCardType' => $user_payment['card_type'],
		'creditCardNumber' => $user_payment['card_code'],
		'expirationDate' => $user_payment['month'].''.$user_payment['year'],
		'CVV' => $user_payment['cvv'],
		'AFID' => $afid,
		'SID' => $sid,
		'click_id' => $click_id,
		'ipAddress' => $_SERVER['REMOTE_ADDR'],
		'tranType' => 'Sale',
		'site' => APIURL
	);
}

$output = array();
$url = 'https://'.APIURL.'transact.php';

$curlSession = curl_init();
curl_setopt($curlSession, CURLOPT_URL, $url);
curl_setopt($curlSession, CURLOPT_HEADER, 0);
curl_setopt($curlSession, CURLOPT_POST, 1);
curl_setopt($curlSession, CURLOPT_POSTFIELDS, $limi_light);
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1);
curl_setopt($curlSession, CURLOPT_TIMEOUT,5000);
curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curlSession, CURLOPT_SSL_VERIFYHOST, 1);

$rawresponse = curl_exec($curlSession);

if (strpos($rawresponse, '&')) {
	$response = explode('&', $rawresponse);
  	$count = count($response);
  	for ($i=0; $i < $count; $i++) {
		$splitAt = strpos($response[$i], "=");
		$output[trim(substr($response[$i], 0, $splitAt))] = trim(substr(urldecode($response[$i]), ($splitAt+1)));
  	}
} else {
  $output = $rawresponse;
}

if ($output['responseCode'] != '100') {	
    if (isset($output['declineReason']) && $output['declineReason'] != ""){
    	$errMsg["error"] = $output['declineReason'];
	} else {
		if ($output['responseCode'] == '800'){
			$errMsg["error"] = 'This transaction has been declined. Please check your credit card number, expiration date and security code.';
		} else {
			$errMsg["error"] = $output['errorMessage'];
		}
	}
}

curl_close ($curlSession);

if (count($errMsg) > 0) {
	$Result = @implode("<br/>", $errMsg);
} else {
	$_SESSION['order']['orderId'] = $output['orderId'];
	$_SESSION['order']['prepay'] = 'yes';
	$Result = 'success';
}

echo trim($Result);
?>