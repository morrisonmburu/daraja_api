<?php 

	header("content-type: application/json");

    	$response = '{
    		"ResultCode": 0,
    		"ResultCode": "confirmation ReceivedSuccessfully"
    	}';

    	// Data
    	$mpesaResponse = file_get_contents("php://input");

    	//log the response
    	$jsonResponse = json_decode($mpesaResponse, true);

    	$logfile = 'validation_mpesaResponse.txt';
		$log = fopen($logfile, "a");

    	fwrite($log, $mpesaResponse);
    	fclose($log);

    	// echo $response;

 ?>