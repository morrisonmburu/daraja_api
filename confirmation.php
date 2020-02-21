<?php 
		header("content-type: application/json");

    	$response = '{
    		"ResultCode": 0,
    		"ResultCode": "confirmation ReceivedSuccessfully"
    	}';

    	// Data
    	$mpesaResponse = file_get_contents("php://input");

    	$logfile = 'mpesaResponse.txt';

    	//log the response
    	$jsonResponse = json_decode($mpesaResponse);

    	$log = fopen($logfile, "a");

    	fwrite($log, $mpesaResponse);
    	fclose($log);

    	// $trans = new Transaction;

    	// $trans->TransactionType = $jsonResponse['TransactionType'];
    	// $trans->TransID = $jsonResponse['TransID'];
    	// $trans->TransTime = $jsonResponse['TransTime'];
    	// $trans->TransAmount = $jsonResponse['TransAmount'];
    	// $trans->BusinessShortCode = $jsonResponse['BusinessShortCode'];
    	// $trans->BillRefNumber = $jsonResponse['BillRefNumber'];
    	// $trans->InvoiceNumber = $jsonResponse['InvoiceNumber'];
    	// $trans->OrgAccountBalance = $jsonResponse['OrgAccountBalance'];
    	// $trans->ThirdPartyTransID = $jsonResponse['ThirdPartyTransID'];
    	// $trans->Msisdn = $jsonResponse['MSISDN'];
    	// $trans->FirstName = $jsonResponse['FirstName'];
    	// $trans->MiddleName = $jsonResponse['MiddleName'];
    	// $trans->LastName = $jsonResponse['LastName'];

    	// $trans->save();


    	// return $jsonResponse;
 ?>