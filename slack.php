function send_slack_message($to_send,$attachments = array()){
	$ts = uniqid();
	$data = array("type"=>"message","text"=>$to_send,"mrkdwn"=> true,"attachments"=>$attachments,"ts"=>$ts);
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'YOUR_WEB_HOOK_URL');
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($curl, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // return the API response
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
 	
	curl_exec($curl);
	
	return $ts;
}
