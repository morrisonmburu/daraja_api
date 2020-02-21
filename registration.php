<?php 

	$consumerKey = 'caIceAtGRLG8dC1kLx331naGDEldcEX9';
		$consumerSecret = 'BMYVBob7kDPhNAxe';

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

    	$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header


		$curl_post_data = array(
		  //Fill in the request parameters with valid values
		  'ShortCode' => '601401',
		  'ResponseType' => 'Confirmed',
		  'ConfirmationURL' => 'https://kenyanmatrimony.com/daraja/confirmation.php',
		  'ValidationURL' => 'https://kenyanmatrimony.com/daraja/validation.php'
		);

		$data_string = json_encode($curl_post_data);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

		$curl_response = curl_exec($curl);
		print_r($curl_response);

		echo $curl_response;

 ?>