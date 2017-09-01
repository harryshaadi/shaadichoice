<?php 
	include('head.php');
	$getChatData1 = $db->getRecord(0, array('chat_date'), 'tbl_chatmessages', array('user_from' => $_SESSION['userDetail']['profile_code']));
	$getChatData2 = $db->getRecord(0, array('*'), 'tbl_chatmessages', array('user_from' => $_SESSION['userDetail']['profile_code']));
	
	
	//print_r($getChatData2);
	$i=1;
	foreach ($getChatData2 as $key => $row) {
		$data[$i]['db_chat_date']  		= 	$row['chat_date'];
		$data[$i]['db_user_from']  		= 	$row['user_from'];
		$data[$i]['db_user_to']  		= 	$row['user_to'];
		$data[$i]['db_chat_message']  	= 	$row['message'];
		
		//$data['']  	= 	$row['chat_date'].",".$row['message'].",".$row['user_from'].",".$row['user_to'];
		//$data['']  	= 	$row['chat_date'].",".$row['message'].",".$row['user_from'].",".$row['user_to'];
	$i++;	
	}
	
	print_r($data);
	$i=0;
	foreach($data as $d){
		
		echo "SN=".$i." chat date".$d['db_chat_date']."<hr>";
	$i++;
	}
	
	
	exit;
	//kc34itkpio6kj1rqjofv9kmik6
	//2017-07-14 12:57:21
	//2017-07-15 08:41:27
	
	/*	
	<?php
	// Grabs the URI and breaks it apart in case we have querystring stuff
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

	// Route it up!
	switch ($request_uri[0]) {
		// Home page
		case '/':
			require '../views/home.php';
			break;
		// About page
		case '/about':
			require '../views/about.php';
			break;
		// Everything else
		default:
			header('HTTP/1.0 404 Not Found');
			require '../views/404.php';
			break;
	}
	*/     
?>	