<?php 
	// dd($Amount1)

	$consumerKey = 'r9YCSQu5Pkyc5OCTmo7tZUHVG6jD845c';
	$consumerSecret = 'GOyoBp4xFJyjZHgf';

	$headers = ['Content-Type:application/json; charset-utf8'];

	$acces_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

	$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $acces_token_url);
    $credentials = base64_encode($consumerKey.':'.$consumerSecret);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $curl_response = curl_exec($curl);
    $access_token = json_decode($curl_response)->access_token;

	//lipa na mpesa online
	//initiating the transaction

	$initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

	$BusinessShortCode = '174379';
	$Timestamp = '20'.date("ymdhis");
	$PartyA = '254799117020';
	$Amount = '3';
	$CallBackURL = 'https://kenyanmatrimony.com/daraja/callback.php';
	$passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
	$Password = base64_encode($BusinessShortCode.$passkey.$Timestamp);
	$AccountReference = 'kenyanmatrimony';
	$TransactionDesc = 'cart payment for online service';

	$stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $initiate_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

	$curl_post_data = array(
	  //Fill in the request parameters with valid values
	  'BusinessShortCode' => $BusinessShortCode,
	  'Password' => $Password,
	  'Timestamp' => $Timestamp,
	  'TransactionType' => 'CustomerPayBillOnline',
	  'Amount' => $Amount,
	  'PartyA' => $PartyA,
	  'PartyB' => $BusinessShortCode,
	  'PhoneNumber' => $PartyA,
	  'CallBackURL' => $CallBackURL,
	  'AccountReference' => $AccountReference,
	  'TransactionDesc' => $TransactionDesc
	);

	$data_string = json_encode($curl_post_data);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

	$curl_response = curl_exec($curl);
	// print_r($curl_response);

	// echo $curl_response;

	$data = json_decode($curl_response);

	echo $data;



 ?>