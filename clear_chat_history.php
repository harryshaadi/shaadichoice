<?php 
	include_once('scpanel/web-config.php');
	include_once('scpanel/functions/common.php');
	include_once('scpanel/classes/class.DBQuery.php');
	include_once('functions/common.php');
	$db = new DBQuery();
	
	if(isset($_POST['conv_id'])){
		$con =$_POST['conv_id'];
		$deleted_by_id =$_POST['deleted_by_id'];		
		$where="";
		$tmp = explode('_', $con);
		$conversation_id = $tmp[0];	
		$deleted_on =date('Y-m-d H:i:s');
		//exit;
		$where1="";		
		$where1.=" deleted_by_id='".$deleted_by_id."'";
		//exit;
		$getChatList = $db->getRecord(0,array('chat_id'), 'tbl_chatmessage_delete_dtl', $where1, '', '', '', '');
		//print_r($getChatList);
		//exit;
		$t = count($getChatList);
		if($t>0){
			foreach($getChatList as $chid){
			$chat_ids.= $chid['chat_id'].",";	
			}
			$chat_ids = substr($chat_ids,0,-1);
			//echo $chat_ids;
			$wq=" AND id NOT IN(".$chat_ids.")";
		}else{
			$wq='';	
		}
		$where.=" conversation_id='".$conversation_id."'".$wq;	
		
		$getChatDtlFinalList = $db->getRecord(0,array('*'), 'tbl_chatmessages', $where, '', '', '', '');
		//SELECT * FROM `tbl_chatmessages` WHERE conversation_id='19' AND id NOT IN(157,160);
		//SELECT * FROM `tbl_chatmessages` WHERE conversation_id='19' AND id NOT IN('157,160')
		$totchat = count($getChatDtlFinalList);
		if($totchat>0){			
			foreach($getChatDtlFinalList as $chat_dtl){
				//print_r($chat_dtl);
				//print($chat_dtl['id']);
				//exit;
				$arrRes = array('chat_id' => $chat_dtl['id'],'deleted_by_id' => $deleted_by_id,'deleted_on' => $deleted_on);
				//print_r($arrRes);
				$mydata = $db->addRecord(0, $arrRes, 'tbl_chatmessage_delete_dtl');
			}
			if($mydata > 0){
				echo "1";
			}else{
				echo "0";
			}
		}else{
			//echo 0;
		}		
		exit;
	}
	
	if(isset($_POST['chat_id'])){
		//print_r($_POST);
		$chat_id = $_POST['chat_id'];
		//echo $_POST['conversation_id'];
		$con =$_POST['conversation_id'];	
		//$conversation_id = substr($con, 0, 1);
		$tmp = explode('_', $con);
		$conversation_id = $tmp[0];
		//$delete_by = substr($con, 1);
		$delete_by = $_POST['deleted_by_id'];
		$deleted_on =date('Y-m-d H:i:s');
		$arrRes['arrDbFields'] = array('chat_id' => $chat_id,'deleted_by_id' => $delete_by,'deleted_on' => $deleted_on);
		//global $db;	
		//$mydata = $db->updateRecord(0,array('show_history_status' => '1','delete_by' => $delete_by,'deleted_on' => $deleted_on),'tbl_chatmessages',array('id'=>$chat_id));
		//$mydata = $db->updateRecord(1,array('chat_id' => $chat_id,'conv_id' => '1','deleted_by_id' => $delete_by,'deleted_on' => $deleted_on),'tbl_chatmessage_delete_dtl',array('id'=>$chat_id));
		//$mydata = $db->updateRecord(1,array('chat_id' => $chat_id,'deleted_by_id' => $delete_by,'deleted_on' => $deleted_on),'tbl_chatmessage_delete_dtl',array('id'=>$chat_id));
		$mydata = $db->addRecord(0, $arrRes['arrDbFields'], 'tbl_chatmessage_delete_dtl');
		if($mydata > 0){
			echo "1";
		}else{
			echo "0";
		}
		exit;
	}
	
?> 