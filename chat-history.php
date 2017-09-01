<?php 
	include('head.php');
	
	function getUserDtl($profileCode){
		//echo $profileCode;
		global $db;
		$selectedCols1 = "p.fname,p.mname,p.lname, ROUND((DATEDIFF(CURDATE(), pd.birth_date) / 365.25)) age, m.address_one,m.address_two,m.city_id_fk,m.state_id_fk,m.country_id_fk";
		$tbls1 = "`tbl_profiles` as p,`tbl_profile_detail` as pd,`tbl_member_contact_info` as m ";
		$where1 ='';
		$where1.=" p.profile_code=pd.profile_code_fk AND p.profile_code=m.profile_code AND p.profile_code='".$profileCode."'";
		$getUserDtlList = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
		return $getUserDtlList;
		//print_r($getUserDtlList);
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
	
	//$_GET['c_id'] = "MQ==";
	
?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h4 class="panel-title text-left">Chat History </h4>
						<?php
						//echo $_SESSION['userDetail']['profile_code']; exit;
						if(isset($_GET['c_id'])){
						$con =$_GET['c_id'];
						$tmp = explode('_', $con);
						$conversation_id = $tmp[0];	
						//$chat = getDeletedChatDtl($tmp[1]);
						$chat ='';
						$DelRecArr = $db->getRecord(0, array('chat_id'), ' tbl_chatmessage_delete_dtl', array('deleted_by_id' => $_SESSION['userDetail']['profile_code']));
						foreach($DelRecArr as $delarr){
							//echo $delarr['chat_id'];
							$chat.= $delarr['chat_id'].",";	
						}
						$chat = substr($chat,0,-1);
						//echo $chat;
						//echo $DelRecArr['chat_id'];//exit;
						$selectedCols1 = "p.fname,p.mname,p.lname, ROUND((DATEDIFF(CURDATE(), pd.birth_date) / 365.25)) age, m.address_one,m.address_two,m.city_id_fk,m.state_id_fk,m.country_id_fk";
						$tbls1 = "`tbl_profiles` as p,`tbl_profile_detail` as pd,`tbl_member_contact_info` as m ";
						$where1 ='';
						$where1.=" p.profile_code=pd.profile_code_fk AND p.profile_code=m.profile_code AND p.profile_code='".$profileCode."'";
						$getUserDtlList = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
						
						$where ='';
						$t = count($DelRecArr);
						if($t>0){
							$wq=" AND id NOT IN($chat)";
						}else{
							$wq='';	
						}
						$where.=" conversation_id='$conversation_id' AND show_history_status!='1' ".$wq;
						$prof = $db->getRecord(0, array('*'), 'tbl_chatmessages', $where);
						$totchatcount = count($prof);	
						}
						if($totchatcount>0){
						?>
						<a href="javascript:void(0);"  onClick="javascript:clear_chat_history_dtl('<?=$_GET['c_id']?>');" class="btn btn-danger text-right">Clear All Chat History</a>
						<?php } ?>
					</div>
					<div class="panel-body chat-history">
						<?php
							if(isset($_GET['c_id'])){
								$con =$_GET['c_id'];	
								$tmp = explode('_', $con);
								$conversation_id = $tmp[0];								
								$where ='';
								$t = count($DelRecArr);
								if($t>0){
									$wq=" AND id NOT IN($chat)";
								}else{
									$wq='';	
								}
								$where.=" conversation_id='$conversation_id' AND show_history_status!='1' ".$wq;
								$prof = $db->getRecord(0, array('*'), 'tbl_chatmessages', $where);
								$q = count($prof);	
								if($q > 0){
									//print_r($prof);
									foreach($prof as $m) {
										//format the message and display it to the user
										$user_form = $m['user_from'];
										$user_to = $m['user_to'];
										$message = $m['message'];
										$data = getUserDtl($m['user_from']); 
										
										if($data[0]['fname']){ $fname = $data[0]['fname'] .' '; }else{ $fname = $data[0]['fname']; }
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
										
										$user_form_username = $username;
										$user_form_img = $profilePic;
										$chat_date = $m['chat_date']; 
										?>
										
										<div class="media">
											<div class="media-left">
											  <img src="<?=$user_form_img; ?>" class="media-object img-thumbnail" style="width:50px">
											</div>
											<div class="media-body">
											  <h4 class="media-heading"><?=$user_form_username; ?> <small><i>Posted on <?=$chat_date; ?></i></small></h4>
											  <p><?=$message; ?></p>
											</div>
											<div class="">
											<a href="javascript:void(0);"  onClick="javascript:clear_chat_history_dtl_byID('<?=$m['id'];?>','<?=$_GET['c_id']?>');" class="btn btn-danger">Clear this Chat</a>
											</div>
										</div>			
									<?php				
						 
									}
								}else{
									echo "No Chat available.";
								}
							}
						
						?>
					</div>
				 </div>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>
<script>
function clear_chat_history_dtl_byID(chat_id,conv_id){
	//alert('chat_id'+chat_id+'conv_id'+conv_id);//return false;
	$.ajax({
		url: 'clear_chat_history.php',
		type: 'post',
		data: {'chat_id': chat_id,'conversation_id': conv_id,'deleted_by_id':'<?=$_SESSION['userDetail']['profile_code']?>'},
		success: function(data, status) {
			//alert(data);
			if(data ==1) {
				alert('Your Chat is Cleared Successfully.');
				window.location.href = '<?=USER_PATH?>'+'chat-history.php?c_id='+conv_id;
				//go_chathistory(user_to);
			}
			else{
				alert('can\'t show');
			}
		},
		error: function(xhr, desc, err) {
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
    });   
}function clear_chat_history_dtl(conv_id){
	//alert(conv_id);//return false;
	$.ajax({
		url: 'clear_chat_history.php',
		type: 'post',
		data: {'conv_id': conv_id,'deleted_by_id':'<?=$_SESSION['userDetail']['profile_code']?>'},
		success: function(data, status) {
			alert(data);
			if(data ==1) {
				alert('Your Chat History Cleared Successfully.');
				window.location.href = '<?=USER_PATH?>'+'chat-history.php?c_id='+conv_id;
				//go_chathistory(user_to);
			}
			else{
				alert('can\'t show');
			}
		},
		error: function(xhr, desc, err) {
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
    });   
}	
</script>