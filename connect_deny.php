<?php
include_once('scpanel/web-config.php');
include_once('scpanel/functions/common.php');
include_once('scpanel/classes/class.DBQuery.php');
include_once('functions/common.php');
$db = new DBQuery();
$accepted_to=$_POST['accepted_to'];
$accepted_from=$_POST['accepted_from'];

if(!empty($accepted_to)) {
	
	if(!empty($accepted_to)){
		 
		$toDetail = $db->getRecord(0,array('fname,mname,lname,email'),'tbl_profiles',array('profile_code' => $accepted_to));
		//print_r($toDetail);
		$tofname = $toDetail[0]['fname'];
		$tomname = $toDetail[0]['mname'];
		$tolname = $toDetail[0]['lname'];
		$toemail = $toDetail[0]['email'];
		
		$fromDetail = $db->getRecord(0,array('fname,mname,lname,email'),'tbl_profiles',array('profile_code' => $accepted_from));
		
		//print_r($fromDetail);
		$fromfname = $fromDetail[0]['fname'];
		$frommname = $fromDetail[0]['mname'];
		$fromlname = $fromDetail[0]['lname'];
		$fromemail = $fromDetail[0]['email'];
		
		$arrRes['arrDbFields']['connect_from'] = $accepted_from;
		$arrRes['arrDbFields']['connect_to'] = $accepted_to;
		$arrRes['arrDbFields']['connect_date'] = date('Y-m-d');
		$arrRes['arrDbFields']['connect_status'] = 'D';
		//exit;
		$msgSubmitted = $db->addRecord(0, $arrRes['arrDbFields'], 'tbl_connect_request');
		//echo $msgSubmitted;exit;
		if($msgSubmitted >0)
		{
		echo 1;
		}else{
		echo 0;	
		}		
	} 
} 
?>