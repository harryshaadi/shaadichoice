<?php 
	//session_start();
	error_reporting(-1);
	include_once('scpanel/web-config.php');
	include_once('scpanel/functions/common.php');
	include_once('scpanel/classes/class.DBQuery.php');
	include_once('functions/common.php');
	$db = new DBQuery();
	$session_id = session_id();
	//print_r($_SESSION);
	//exit;
	$time = date('Y-m-d H:i:s');
	if(isset($_GET['sess_id'])){ $sess_id =  $_GET['sess_id'];}
	//$mydata =array();
	
	if(!empty($_SESSION) && (!empty($sess_id))){
		$mydata = $db->updateRecord(0,array('created_on' => $time),'tbl_login_session',array('session_id'=>$session_id));
		//echo $mydata;exit;
		if($mydata){
			echo "1";
		}else{
			echo "0";
		}
	}
?>
