<?php
if(isset($_SERVER['HTTP_CLIENT_IP'])) {
	$visitor_ip = $_SERVER['HTTP_CLIENT_IP']; // For shared connections
} else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$visitor_ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // For proxy'd connections
} elseif(isset($_SERVER['REMOTE_ADDR'])) {
	$visitor_ip = $_SERVER['REMOTE_ADDR']; // Everyone else
	$visitor_ip = '139.5.19.127'; //INDIA
	//$visitor_ip = '203.77.191.6'; //japan
	//$visitor_ip = '110.33.122.75'; //Australia
} else {
	//$visitor_ip = '110.33.122.75';
	$visitor_ip = $_SERVER['REMOTE_ADDR'];
}

$code = 'INR'; // Your base currency, 3 Letter Currency Code
//$key  = '78ff561e03873ba2ce6acc8d'; // Your API key
//$key  = '30906225bf283daf32794051'; // Your API key 
//$key  = '79743be321208f937bd3395b'; // Your API key 
//$key  = 'c8f601c68dbcf2a642805888'; // Your API key 
$key  = 'c27f39045f8ebc984459c1fb'; // Your API key 
$req_url = 'https://v3.exchangerate-api.com/local/'.$key .'/'.$code.'/'.$visitor_ip;

// Fetching JSON
$response_json = file_get_contents($req_url); 

//print_r(json_decode($response_json));

// Continuing if we got a result
if(false !== $response_json) {

	// Try/catch for json_decode operation
	try {
		// Decoding
		$response_object = json_decode($response_json);
		//print_r($response_object);
		//echo $response_object->country_code;
		// Proceeding only with valid JSON
		if(false !== $response_object)
			{

			// Checking for errors
			if('success' === $response_object->result) {
				$rate = $response_object->rate;
				function MembershipPrice($myprice){
					global $rate;
					$base_price = $myprice; // Your price in USD
					$converted_price = round(($base_price * $rate), 2);
					return $converted_price;
				}
				$code = $response_object->to;
				function MembershipPriceCurrencyCode(){
					global $code;	
					return $code;	
				}
				// Formatting currency symbol
				if(false === strpos($response_object->currency_symbol, ',')) {
					$display_code = '&#x'.$response_object->currency_symbol.';';;
				} else {
					$display_code = '';
					$display_letters = explode(',', $response_object->currency_symbol);
					$num_letters = count($display_letters);
					for($i = 0;$i < $num_letters;$i++) {
						$display_code .= '&#x'.$display_letters[$i].';';
					}
				}
				//echo "Currency Symbol". $response_object->country_code;
				if($response_object->country_code=='IN'){
					$display_code='Rs.';
				} //exit;
				// Outputting
				//echo($display_code.$converted_price);
				//$act_price = $display_code.$converted_price;
				$country_code = $response_object->country_code;
				
				function GetCountryCode(){						
				global $country_code;
				return $country_code;
				
				}
				
				function MembershipPriceSymbol(){						
				global $display_code;
				return $display_code;
				}
			} else {
				switch($response_object->error) {
					case 'unknown-code':
						// Handle error...
						break;
					case 'invalid-key':
						// Handle error...
						break;
					case 'malformed-request':
						// Handle error...
						break;
					case 'quota-reached':
						// Handle error...
						break;
				}

			}

		}

	}
	catch(Exception $e) {
		// Handle JSON parse error...
	}

}
else {
	// Handle network error...
}	
?>