<?php 
	include('head.php');
	function getUserDtls($profileCode){
		global $db;
		$selectedCols1 = "concat(p.fname,' ',p.mname,' ',p.lname) as fullname, m.city_id_fk as city_id ,m.state_id_fk as state_id,m.country_id_fk as country_id";
		$tbls1 = "`tbl_profiles` as p,`tbl_member_contact_info` as m ";
		$where1 ='';
		$where1.=" p.profile_code=m.profile_code AND p.profile_code='".$profileCode."' ";
		$getUserDtlList = $db->getRecord(0, $selectedCols1, $tbls1, $where1, '', '', "", '');
		return $getUserDtlList;
		//print_r($getUserDtlList);
	}
	
	function getUserPics($profileCode){
		global $db;						
		$profilePicArr = $db->getRecord(0, array('image','image_code'), ' tbl_profile_images', array('profile_code' => $profileCode, 'approved' => 'Y', 'default_image' => 'Y'));
		  $count = count($profilePicArr);
		  $profilePic='';
		  if($count > 0)
			  return $profilePic = USER_PATH."uploads/profile_pic/".$profilePicArr[0]['image'];
		  else
			  return $profilePic = USER_PATH."img/default-profile.jpg";
	}
	
	function getCitys($city_id){
		global $db;						
		$cityArr = $db->getRecord(0, array('city_name','status'), ' tbl_cities', array('city_id_pk' => $city_id));
		  $count = count($cityArr);
		  $city_name='';
		  if($count > 0)
			  return $city_name = $cityArr[0]['city_name'];
		  else
			  return $city_name = "Delhi";
	}
	
	function getStates($state_id){
		global $db;						
		$cityArr = $db->getRecord(0, array('tbl_states','status'), ' tbl_states', array('state_id_pk' => $state_id));
		  $count = count($cityArr);
		  $city_name='';
		  if($count > 0)
			  return $city_name = $cityArr[0]['state_name'];
		  else
			  return $city_name = "Delhi";
	}
	
	function getCountrys($country_id){
		global $db;						
		$cityArr = $db->getRecord(0, array('country_name','status'), ' tbl_countries', array('country_id_pk' => $country_id));
		  $count = count($cityArr);
		  $city_name='';
		  if($count > 0)
			  return $city_name = $cityArr[0]['country_name'];
		  else
			  return $city_name = "India";
	}
	
	//echo 'visitorid='.$_GET['cu_id'];
	//echo 'my id='.$_SESSION['userDetail']['profile_code'];
	$whereClausenm = '';
	$whereClausenm = '(msg_from ="'.$_SESSION['userDetail']['profile_code'].'" AND msg_to ="'.$_GET['cu_id'].'") OR (msg_to ="'.$_SESSION['userDetail']['profile_code'].'" AND msg_from ="'.$_GET['cu_id'].'")';
	$stpm = '';
	$perPage = '';
	//array('msg_from','msg_to','msg_description','msg_read_status','created_on');
	$tot_qry='count(0) as tot';
	$msgdata = $db->getRecord(0, $tot_qry, 'tbl_messages', $whereClausenm, $stpm, $perPage, "created_on", 'ASC');
	$tot_rec_msg = count($msgdata);
	
	$whereClause = '';
	$whereClause = '(request_from ="'.$_SESSION['userDetail']['profile_code'].'" AND request_to ="'.$_GET['cu_id'].'") OR (request_to ="'.$_SESSION['userDetail']['profile_code'].'" AND request_from ="'.$_GET['cu_id'].'")';
	
	$mdata = $db->getRecord(0, $tot_qry, 'tbl_match_request', $whereClause, $stpm, $perPage, "", '');
	$tot_rec_matched = count($mdata);
	
	//block user//
	
?> 
<!--  end navbar -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3 panel-body">
						<div class="left-tab">
							<?php include_once('msg_left_panel.php'); ?>
						</div>
					</div>
					
					
					<div class="col-sm-9 panel-body">
						<div class="inbox" style="height: 575px; overflow-y: scroll;">
							<div class="inbox-heading">
									<div class="row">
										<div class="col-lg-8 col-md-6 col-sm-6 col-xs-6">
											<div>
												<?php $msg_con_with_dtl = getUserDtls($_GET['cu_id']); ?>
												Conversation with <?=ucwords($msg_con_with_dtl[0]['fullname']);?>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
											<div class="dropdown pull-right">
											  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop"><i class="fa fa-cog" aria-hidden="true"></i></button>
											  <ul class="dropdown-menu drop_down pull-right" id="drop">
												<li><a href="javascript:void(0)" onClick='return archive("<?=$_GET['cu_id'];?>_<?=$_SESSION['userDetail']['profile_code']?>");'>Archive Conversation</a></li> 
												<li><a href="javascript:void(0)" onClick='return movetotrash("<?=$_GET['cu_id'];?>_<?=$_SESSION['userDetail']['profile_code']?>");'>Delete Conversation</a></li>
												<li><a href="javascript:void(0)" onClick='return msgread("<?=$_GET['cu_id'];?>");'>Report  User</a></li>
											  </ul>
											</div>
										</div>
									</div>
							</div>
							

									
								
							
							<hr>
							<?php
								
								$msgdeldata = $db->getRecord(0, array('msg_id','deleted_by_id','deleted_on'), 'tbl_messages_deleted', array('deleted_by_id'=>$_SESSION['userDetail']['profile_code']));
								$tot_archive_rec = count($msgdeldata);
								//echo $msgarcdata[0]['msg_id'];
								$msg_delete_ids='';
								if($tot_archive_rec>0){
									foreach($msgdeldata as $d_msg){
									$msg_delete_ids.= $d_msg['msg_id'].",";	
									}
									$msg_delete_ids = substr($msg_delete_ids,0,-1);
									//echo $chat_ids;
									$dq=" AND (`msg_id` NOT IN(".$msg_delete_ids."))";
								}else{
									$dq='';	
								}
								
								$msgarcdata = $db->getRecord(0, array('msg_id','archive_by_id','archive_on'), 'tbl_messages_archive', array('archive_by_id'=>$_SESSION['userDetail']['profile_code']));
								$tot_archive_rec = count($msgarcdata);
								//echo $msgarcdata[0]['msg_id'];
								$archive_ids='';
								if($tot_archive_rec>0){
									foreach($msgarcdata as $a_msg){
									$archive_ids.= $a_msg['msg_id'].",";	
									}
									$archive_ids = substr($archive_ids,0,-1);
									//echo $chat_ids;
									$wq=" AND (`msg_id` NOT IN(".$archive_ids."))";
								}else{
									$wq='';	
								}
								
								$whereClausenm = '';
								$whereClausenm.= '((msg_from ="'.$_SESSION['userDetail']['profile_code'].'" AND msg_to ="'.$_GET['cu_id'].'") OR (msg_to ="'.$_SESSION['userDetail']['profile_code'].'" AND msg_from ="'.$_GET['cu_id'].'"))'.$wq.$dq;
								$stpm = '';
								$perPage = '';
								
								$msgdata = $db->getRecord(0, array('msg_id','msg_from','msg_to','msg_description','msg_read_status','created_on'), 'tbl_messages', $whereClausenm,'', '', "created_on", 'ASC');
								$tot_rec = count($msgdata);
								$read_on = date('Y-m-d H:i:s');
								if($tot_rec>0){
								foreach($msgdata as $msg){
								//echo $msg['msg_id'];	
								//echo $msg['msg_description'];	
								$read_by_id = $_SESSION['userDetail']['profile_code'];
								$msgreaddata = $db->getRecord(0, array('msg_id','read_by_id','read_on'), 'tbl_messages_read', array('read_by_id'=>$read_by_id,'msg_id'=>$msg['msg_id']),'', '', "read_on", 'ASC');
								$tot_read_rec = count($msgreaddata);
								if($tot_read_rec>0){
									$mydata = $db->updateRecord(0,array('read_by_id'=>$read_by_id,'msg_id'=>$msg['msg_id'],'read_on'=>$read_on,'read_status'=>"1"),'tbl_messages_read',array('read_by_id'=>$read_by_id,'msg_id'=>$msg['msg_id']));
								}else{
									$mydata = $db->addRecord(0,array('read_by_id'=>$read_by_id,'msg_id'=>$msg['msg_id'],'read_on'=>$read_on,'read_status'=>'1'),'tbl_messages_read');
								}
								
								$msg_to_dtl = getUserDtls($msg['msg_to']);
								$msg_to_pic = getUserPics($msg['msg_to']);
								$msg_to_state = getStates($msg_to_dtl[0]['state_id']);
								$msg_to_country = getCountrys($msg_to_dtl[0]['country_id']);
								$msg_to_city = getCitys($msg_to_dtl[0]['city_id']);

								$msg_from_dtl = getUserDtls($msg['msg_from']);
								$msg_from_pic = getUserPics($msg['msg_from']);
								$msg_from_state = getStates($msg_from_dtl[0]['state_id']);
								$msg_from_country = getCountrys($msg_from_dtl[0]['country_id']);
								$msg_from_city = getCitys($msg_from_dtl[0]['city_id']);
								//print_r($msg_from_dtl);
								//print($msg['msg_read_status']);
								$date = date_create($msg['created_on']);
								$date = date_format($date, 'g:ia\,\ j F Y');
							?>
							<div class="ConThumb">
								<div class="panel-body">
									<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
										<a href="<?=USER_PATH?>profile-details/<?=$msg['msg_from']?>">
											<span class="ProfileConImg">
												<img src="<?=$msg_from_pic?>" class="pull-left">
											</span>
										</a>
										<a href="">
											<h4><?=ucwords($msg_from_dtl[0]['fullname']);?> <span class="time"><?=strtoupper($date)?></span></h4>
											<h3><?=$msg_from_city?>, <?=$msg_from_state?>, <?=$msg_from_country?></h3>
											<div class="message text-justify"><?=$msg['msg_description']?></div>
										</a>
									</div>
									
								</div>
							</div>
							<?php } } ?>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="refresh"><a href="javascrip:void(0)"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Conversation</a></div>
							</div>
						</div>
						<div class="rply">
							<p>Tip: Do not give out your bank account information to anyone, and beware of fake checks or deposits. </p>
							<div class="row">
								<form action="<?=USER_PATH?>user-controller.php" method="POST">
									<div class="col-sm-12">
										<div class="form-group">
										<textarea class="form-control" name="msg_description" id="msg_description" placeholder="Write a message..." rows="5" required ></textarea> 
										</div>
									</div>
									<div class="col-sm-4 pull-left">
									
									</div>
									<?php 
									//echo $tot_rec_msg;
									//echo $tot_rec_matched;
									//echo $_GET['cu_id'];
									
									if($tot_rec_msg>0){
									if($tot_rec_matched>0){
									//}else{
									?>
									<div class="col-sm-12 pull-left">
										<input type="submit" class="btn btn-danger pull-left" value="Connect to Chat">
										<input type="hidden" name="postAction" value="Connect_to_Chat">
										<input type="hidden" name="postActionCode" value="<?=$_GET['cu_id']?>">
										<input type="hidden" name="returnPath" value="conversation.php?cu_id=<?=$_GET['cu_id']?>">
									</div>
									<?php }} ?>
									<div class="col-sm-2 pull-right">
										<input type="submit" class="btn btn-danger pull-right" value="Send Message">
										<input type="hidden" name="postAction" value="quickMsg">
										<input type="hidden" name="postActionCode" value="<?=$_GET['cu_id']?>">
										<input type="hidden" name="returnPath" value="conversation.php?cu_id=<?=$_GET['cu_id']?>">
									</div>
								</form>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once('chat_process.php'); ?>
<?php include('footer.php');?> 
<?php include_once('shaadichoice_chat.php'); ?> 
<script type="text/javascript">
	$(document).ready(function() {
		//alert('sdfds');
		$(".inbox").scrollTop($(".inbox").prop("scrollHeight")); 
		//$('.inbox').scrollTop($('.inbox')[0].scrollHeight);
		//$(".inbox").animate({ scrollTop: $(".inbox")[0].scrollHeight}, 1000);
	});

	function archive(msg_id){
		$.ajax({
			url: 'message_archive.php',
			type: 'post',
			data: {'msg_id': msg_id, 'func_name': 'archivefunc'},
			success: function(data, status) {
				alert(data);
				if(data ==1) {
					//$('#ProfileThumb_'+msg_id).css({ "background-color": "#fff", "border-color": "#ccc" });
					alert('Your message moved successfully to archive.');
					window.location.href = '<?=USER_PATH?>'+'message.php';
					window.location.reload();
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

	function movetoinbox(msg_id){
		$.ajax({
			url: 'message_archive.php',
			type: 'post',
			data: {'msg_id': msg_id, 'func_name': 'movetoinboxfunc'},
			success: function(data, status) {
				//alert(data);
				if(status =='success') {
					alert('Message moved to inbox successfully.');
					window.location.href = '<?=USER_PATH?>'+'message.php';
					window.location.reload();
					//$('#ProfileThumb_'+msg_id).css({ "background-color": "#fff", "border-color": "#ccc" });
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

	function movetotrash(msg_id){
		$.ajax({
			url: 'message_archive.php',
			type: 'post',
			data: {'msg_id': msg_id, 'func_name': 'movetotrashfunc'},
			success: function(data, status) {
				//alert(data);
				if(data ==1) {
					alert('Message moved to trash successfully.');
					window.location.href = '<?=USER_PATH?>'+'message.php';
					window.location.reload();
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