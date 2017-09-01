<?php
	session_start();
	error_reporting(-1);
	include_once('scpanel/web-config.php');
	include_once('scpanel/functions/common.php');
	include_once('scpanel/classes/class.DBQuery.php');
	include_once('functions/common.php');
	$db = new DBQuery();
	
	function getUserDtl($profileCode){
		global $db;
		$selectedCols1 = "p.fname,p.mname,p.lname,p.login_status as login_status, ROUND((DATEDIFF(CURDATE(), pd.birth_date) / 365.25)) age, m.address_one,m.address_two,m.city_id_fk,m.state_id_fk,m.country_id_fk";
		$tbls1 = "`tbl_profiles` as p,`tbl_profile_detail` as pd,`tbl_member_contact_info` as m ";
		$where1 ='';
		$where1.=" p.profile_code=pd.profile_code_fk AND p.profile_code=m.profile_code AND p.profile_code='".$profileCode."' AND p.login_status='Y' ";
		$getUserDtlList = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
		return $getUserDtlList;
		//print_r($getUserDtlList);
	}
	
	function getUserChatDtl($conversation_id,$user_to){
		global $db;
		//$conversation_id = base64_decode($_GET['c_id']);
		//echo $user_to;
		$where1="";		
		$where1.=" deleted_by_id='".$user_to."'";
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
		/*
		$chat ='';
		$DelRecArr = $db->getRecord(0, array('chat_id'), ' tbl_chatmessage_delete_dtl', array('deleted_by_id' => $_SESSION['userDetail']['profile_code']));
		foreach($DelRecArr as $delarr){
			//echo $delarr['chat_id'];
			$chat.= $delarr['chat_id'].",";	
		}
		$chat = substr($chat,0,-1);
		*/
		$where ='';
		$where.=" conversation_id='$conversation_id' ".$wq;
		$prof = $db->getRecord(0, array('*'), 'tbl_chatmessages', $where);
		$q = count($prof);	
		if($q > 0){
			//print_r($prof);
			foreach($prof as $m) {
				//format the message and display it to the user
				$user_form = $m['user_from'];
				$user_to = $m['user_to'];
				$message = $m['message'];
				$data = getUserDtl($user_form); 
				//get name and image of $user_form from `user` table
				//$user = mysqli_query($con, "SELECT username,img FROM `user` WHERE id='$user_form'");
				
				if($data[0]['fname']){ $fname = $data[0]['fname'] .' '; }else{ $fname = "Not Avaialable"; }
				if($data[0]['mname']){ $mname = $data[0]['mname'] .' '; }else{ $mname = $data[0]['mname']; }
				if($data[0]['lname']){ $lname = $data[0]['lname'] .' '; }else{ $lname = $data[0]['lname']; }
				$username = $fname.$mname.$lname;
				if($data[0]['age']){ $age = $data[0]['age']; }else{ $age = "1"; }
				if($data[0]['address_one']){ $address_one = $data[0]['address_one'] .' '; }else{ $address_one = "n/a"; }
				if($data[0]['address_two']){ $address_two = $data[0]['address_two'] .' '; }else{ $address_two = "n/a"; }
				if($data[0]['city_id_fk']){ $city_id = $data[0]['city_id_fk'] .' '; }else{ $city_id = "1"; }
				if($data[0]['state_id_fk']){ $state_id = $data[0]['state_id_fk'] .' '; }else{ $state_id = "1"; }
				if($data[0]['country_id_fk']){ $country_id = $data[0]['country_id_fk'] .' '; }else{ $country_id = "1"; }
				$fulladdress = $address_one.$address_two;
				$profilePic = getUserPic($user_form);					
				/* 
				$where ='';
				$where.=" profile_code='".$user_form."' ";
				$proff = $db->getRecord(0, array('*'), 'tbl_profiles', $where);
				
				$user_fetch = mysqli_fetch_assoc($user);
				 */
				$user_form_username = $username;
				$user_form_img = $profilePic;
				$chat_date = $m['chat_date']; 
				$chat_date = relative_date(strtotime($m['chat_date']));
				echo "<div class='message'><div class='chat_date'>{$chat_date}</div><div class='img-con'><img src='{$user_form_img}' class='img_border'></div><div class='text-con'><span>{$message}</span></div></div>";
 
			}
		}else{
			echo "No Messages";
		}
		
	}
	
	function getUserPic($profileCode){
		global $db;						
		$profilePicArr = $db->getRecord(0, array('image','image_code'), ' tbl_profile_images', array('profile_code' => $profileCode, 'approved' => 'Y', 'default_image' => 'Y'));
		  $count = count($profilePicArr);
		  $profilePic='';
		  if($count > 0)
			  return $profilePic = USER_PATH."uploads/profile_pic/".$profilePicArr[0]['image'];
		  else
			  return $profilePic = USER_PATH."img/default-profile.jpg";
	}
	
	//Relative Date Function
 
	function relative_date($time) {
	 
		$today = strtotime(date('M j, Y'));
		 
		$reldays = ($time - $today)/86400;
		 
		if ($reldays >= 0 && $reldays < 1) {
		 
			return 'Today';
		 
		} else if ($reldays >= 1 && $reldays < 2) {
		 
			return 'Tomorrow';
		 
		} else if ($reldays >= -1 && $reldays < 0) {
		 
			return 'Yesterday';
		 
		}
		 
		if (abs($reldays) < 7) {
		 
			if ($reldays > 0) {
			 
				$reldays = floor($reldays);
				 
				return 'In ' . $reldays . ' day' . ($reldays != 1 ? 's' : '');
			 
			} else {
			 
				$reldays = abs(floor($reldays));
				 
				return $reldays . ' day' . ($reldays != 1 ? 's' : '') . ' ago';
			 
			}
		 
		}
		 
		if (abs($reldays) < 182) {
		 
			return date('l, j F',$time ? $time : time());
		 
		} else {
		 
			return date('l, j F, Y',$time ? $time : time());
		 
		}
	 
	}
	
	if(isset($_GET['id'])){
		$user_two = trim($_GET['id']);
		$where ='';
		$where.=" profile_code='".$user_two."' AND profile_code<>'".$_SESSION['userDetail']['profile_code']."' ";
		$prof = $db->getRecord(0, array('profile_code'), 'tbl_profiles', $where);
		//print_r($prof);
		$q = count($prof);	
		//valid $user_two
		if($q==1){
			//echo "I am getting problem in getting msg<br/>";
			$user_two = trim($_GET['id']);
			$where ='';
			//$where.=" profile_code='".$user_two."' AND profile_code<>'".$_SESSION['userDetail']['profile_code']."' ";
			$where.=" (user_one='".$_SESSION['userDetail']['profile_code']."' AND user_two='$user_two') OR (user_one='$user_two' AND user_two='".$_SESSION['userDetail']['profile_code']."') ";
			$conversation = $db->getRecord(0, array('*'), 'tbl_conversation', $where);
			$conver = count($conversation);
			//print_r($conversation);
			
			if($conver>0){
				//echo 'test';
				$conversation_id = $conversation[0]['id'];
				//getUserChatDtl($conversation_id,$user_two);
				getUserChatDtl($conversation_id,$_SESSION['userDetail']['profile_code']);
				
			}else{
				//echo'non test';
				$arrProfileDetailsFields = array('user_one'=>$_SESSION['userDetail']['profile_code'],'user_two'=>$user_two);
				$conversation_id = $db->addRecord(0, $arrProfileDetailsFields, 'tbl_conversation');
				//getUserChatDtl($conversation_id,$user_two);
				getUserChatDtl($conversation_id,$_SESSION['userDetail']['profile_code']);
			}
		}else{
			die("Invalid ID.");
		}
	}else {
		die("Click On the Person to start Chating.");
	}
	
	
	
?>
