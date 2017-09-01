<?php 
	include('head.php');
	error_reporting(-1);
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
	
	function GetMessageID($msg_from,$msg_to,$created_on){
		global $db;	
		$GetData = $db->getRecord(0, array('msg_id'), 'tbl_messages', array('msg_from' => $msg_from, 'msg_to' => $msg_to, 'created_on' => $created_on));
		$count = count($GetData);
		$conv_id='';
		if($count > 0)
			return $conv_id = $GetData[0]['msg_id'];
		else
			return $conv_id = 0;
	}

?> 

<link href="<?=USER_PATH?>css/jquery.css" rel="stylesheet" type="text/css" />
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
						<div class="inbox" style="overflow-x:hidden;">
							<div class="inbox-heading">
									<div class="row">
										<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
											<h1>Archive</h1>
											<?php /*<div class=" inbox-check">
												<div class="checkbox">
												  <form>
													<label><input type="checkbox" name="show_unread_msg" id="show_unread_msg" value="" <?php if(isset($_GET['show_unread_msg'])=="1"){ ?>checked<?php } ?>>Show unread only</label>
												  </form>
												</div>
											</div>
											*/?>
										</div>
										<?php /*
										<div class="col-lg-8 col-md-6 col-sm-6 col-xs-6">
											<div class="dropdown pull-right">
											  <button class="btn btn-setting" data-toggle="collapse" data-target="#demo" title="Filtered"><i class="fa fa-filter" aria-hidden="true"></i></button>
											  
											</div>
										</div>
										*/?>
									</div>
							</div>
							<hr>
						<?php
							
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
									$wq=" AND (`msg_id` IN(".$archive_ids."))";
								}else{
									$wq='';	
								}
							
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
								
							$whereClausenm = '';
							$msg_read_status=0;
							$msg_move_status=0;
							$whereClausenm.= ' msg_to ="'.$_SESSION['userDetail']['profile_code'].'" AND msg_move_status="'.$msg_move_status.'"'.$wq.$dq;
							
							if(!empty($_GET['show_unread_msg'])){	
							$msg_read_status=0;
								$whereClausenm.= ' AND msg_read_status="'.$msg_read_status.'"';
							}
							
							if(!empty($_GET['msg'])){
								$msg = $_GET['msg'];
								//echo $whereClausenm = " AND  msg_description LIKE '%".$msg."%'";
								$whereClausenm.= ' AND  msg_description LIKE "%'.$msg.'%"';
							}
							
							$stpm = '';
							$perPage = '';
							$msgdata = $db->getRecord(0, array('msg_id','msg_from','msg_to','msg_description','msg_read_status','created_on'), 'tbl_messages', $whereClausenm, $stpm, $perPage, "msg_id", 'ASC','msg_from');
							$tot_rec = count($msgdata);
							if($tot_rec>0){
								foreach($msgdata as $msg){
								//echo $msg['msg_to'];
								//echo $msg['msg_from'];
								//$getUserDtlOnlineStatus = getUserDtlOnlineStatus($msg['msg_from']);
								$getUserDtlOnlineStatus = $db->getRecord(0, array("login_status"), 'tbl_login_session', array("profile_code"=>$msg['msg_from']), '', '', "", '');
								//print_r($getUserDtlOnlineStatus);
								if($msg['msg_from'] == 'Admin')
								{
									$msg_from_dtl ='';
									$msg_from_pic = getUserPics($msg['msg_from']);
									$msg_from_state = '';
									$msg_from_country = '';
									$msg_from_city = '';
									$msg_from_dtl[0]['fullname'] ='ShaadiChoice Admin';
								}
								else
								{
									$msg_from_dtl = getUserDtls($msg['msg_from']);
									$msg_from_pic = getUserPics($msg['msg_from']);
									$msg_from_state = getStates($msg_from_dtl[0]['state_id']);
									$msg_from_country = getCountrys($msg_from_dtl[0]['country_id']);
									$msg_from_city = getCitys($msg_from_dtl[0]['city_id']);
								}								
								
								$date = date_create($msg['created_on']);
								$date = date_format($date, 'g:ia\,\ j F Y');
								
								$convid = GetMessageID($msg['msg_from'],$msg['msg_to'],$msg['created_on']); 
								$whrqry='';
								$whrqry.= "(msg_from =  '".$msg['msg_from']."' AND msg_to =  '".$_SESSION['userDetail']['profile_code']."' ) OR ( msg_to =  '".$msg['msg_from']."' AND msg_from =  '".$_SESSION['userDetail']['profile_code']."')";
								
								$msgids = $db->getRecord(0, array('msg_id'), 'tbl_messages',$whrqry,0,1,'msg_id','DESC');
								
								$message_id = $msgids[0]['msg_id'];
								
								$msgreadfromdata = $db->getRecord(0, array('id','msg_id','read_by_id'), 'tbl_messages_read',array('msg_id'=>$message_id,'read_by_id'=>$msg['msg_from']));
								
								//print_r($msgreadfromdata);
								//echo "<br/>";								
								
								$msgreaddata = $db->getRecord(0, array('id','msg_id','read_by_id'), 'tbl_messages_read',array('msg_id'=>$message_id,'read_by_id'=>$_SESSION['userDetail']['profile_code']));
								
								//print_r($msgreaddata);
								
								$msgreadstatusbyfrom = $db->getRecord(0, array('id','msg_id','read_by_id'), 'tbl_messages_read',array('msg_id'=>$message_id,'read_by_id'=>$msg['msg_from']));
						?>
							
							<div class="ProfileThumb row" id="ProfileThumb_<?=$convid;?>" <?php if($msgreaddata>0){ }else{ ?>style="background-color:rgba(234, 234, 234, 0.46);border-color:#cccccc;"<?php } ?>>
								<div style="padding:0px 15px;">
									<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10 panel-body" style="border-right:1px solid #ccc;">
										<a href="<?=USER_PATH?>profile-details/<?=$msg['msg_from']?>" target="_blank">
											<span class="ProfileThumbImg">
												<img src="<?=$msg_from_pic?>" class="pull-left">
												<?php if($msgreaddata>0){ }else{ ?><div class="badge">New</div><?php } ?>
											</span>
										</a>
										<a href="<?=USER_PATH?>conversation_archive.php?cu_id=<?=$msg['msg_from']?>&mfrom=inbox">
											<h4><?=ucwords($msg_from_dtl[0]['fullname']);?> <span class="time"><?=strtoupper($date)?></span></h4>
											<h3><?=$msg_from_city?><?php if(empty($msg_from_city)){ }else{echo ',';}?> <?=$msg_from_state?><?php if(empty($msg_from_state)){ }else{echo ',';}?> <?=$msg_from_country?></h3>
											<?php /*<div class="message"><?=substr($msg['msg_description'],0,50)?>...</div>*/ ?>
											<?php if($msgreadstatusbyfrom>'0'){ }else{ ?><div class="message"><strong><i class="fa fa-reply" aria-hidden="true"></i></strong> Reply</div><?php } ?> 
										</a>
									</div>
									<div class="col-lg-2  col-sm-2 col-md-2 col-xs-2 panel-body">
										
										<div class="msgstatus text-center">
										<?php if($getUserDtlOnlineStatus[0]['login_status']=='Y'){ ?><img src="img/online.png" height="12" width="12"><br>Online<?php } else { ?> <br>
										<strong>Last Active</strong> <br>5 Days ago<?php } ?></div>
									</div>
								</div>
							</div>
							<?php  	} ?>
							<?php }else{ ?>
							<div class="ProfileThumb">
								<div class="panel-body">
									<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
									<?php if(!empty($_GET['msg'])){ ?>
									<!--<h4>No Message found with "<?//=$_GET['msg']?>".</h4>-->
									<h4>No Message in Inbox.</h4>
									<?php }else { ?>	
									<h4>No Message in Inbox.</h4>	
									<?php } ?>
									</div>
								</div>
							</div>
							<?php } ?>
							
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
function archive(msg_id){
	$.ajax({
		url: 'message_archive.php',
		type: 'post',
		data: {'msg_id': msg_id, 'func_name': 'archivefunc'},
		success: function(data, status) {
			//alert(data);
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

function msgread(msg_id){
	$.ajax({
		url: 'message_archive.php',
		type: 'post',
		data: {'msg_id': msg_id, 'func_name': 'msgreadfunc'},
		success: function(data, status) {
			//alert(data);
			if(data ==1) {
				$('#ProfileThumb_'+msg_id).css({ "background-color": "#fff", "border-color": "#ccc" });
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

function msgunread(msg_id){
	$.ajax({
		url: 'message_archive.php',
		type: 'post',
		data: {'msg_id': msg_id, 'func_name': 'msgunreadfunc'},
		success: function(data, status) {
			//alert(data);
			if(data ==1) {
				$('#ProfileThumb_'+msg_id).css({ "background-color": "rgba(234, 234, 234, 0.46)", "border-color": "#ccc" });
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
<script type="text/javascript">
	
	$(document).ready(function() {
		$('#demo .collapse').on('shown.bs.collapse',function(){
		$(this).parent().find('.fa-plus-circle').removeClass('fa-plus-circle').addClass('fa-minus-circle');
		}).on('hidden.bs.collapse',function(){
			$(this).parent().find('.fa-minus-circle').removeClass('fa-minus-circle').addClass('fa-plus-circle');	
		})

		
		$('[name="show_unread_msg"]').change(function(){
			//var url = '<?php if($_SERVER["QUERY_STRING"]){echo $_SERVER["QUERY_STRING"];} ?>';	
			//alert(url);
			if ($(this).is(':checked')) {
				$('#show_unread_msg').prop("checked");
				url= 'show_unread_msg=1';
				window.location.href = '<?=USER_PATH?>'+'message.php?'+url;
				//alert('checked');
			}else{
				$('#show_unread_msg').prop("checked");
				window.location.href = '<?=USER_PATH?>'+'message.php';
				//alert('unchecked');
			}
		});
		
		$('#search_button').click(function(){
			var url = '<?php if($_SERVER["QUERY_STRING"]){echo $_SERVER["QUERY_STRING"];} ?>';	
			var	msg=$('#searchdata').val();
			//alert('message='+msg);
			window.location.href = '<?=USER_PATH?>'+'message.php?'+url+'&msg='+msg;
			
		});
	});	


	$(function(){
	$(document).ready()
		$( "#slider-range" ).slider({
			range: true,
			min: 18,
			max: 70,
			values: [<?=$ageFrom1?>, <?=$ageTo1?>],
			slide: function( event, ui ) {
				$( "#age" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ]);
			},
			stop : function(event, ui)
			{
				$( "#age" ).val($( "#slider-range" ).slider( "values", 0 ) + " - " + $( "#slider-range" ).slider( "values", 1 ) );
			}
		});
		$( "#age" ).val($( "#slider-range" ).slider( "values", 0 ) + " - " + $( "#slider-range" ).slider( "values", 1 ) );
	});
	
	$(function(){
		$( "#slider-range1" ).slider({
			range: true,
			min: 45,
			max: 213, 
			values: [<?=$heightFrom1?>, <?=$heightTo1?>],
			slide: function( event, ui ) {
				$("#height").val(ui.values[ 0 ] + " cm " + " - " + ui.values[ 1 ] + " cm"  );
				//alert(ui.values[ 0 ] + " cm " + " - " + ui.values[ 1 ] + " cm"  );
			},
			stop : function(event, ui)
			{
				$( "#height" ).val($( "#slider-range1" ).slider( "values", 0 ) + " cm " + " - " + $( "#slider-range1" ).slider( "values", 1 )+ " cm " );
			}
		});
		$( "#height" ).val($( "#slider-range1" ).slider( "values", 0 ) + " cm " + " - " + $( "#slider-range1" ).slider( "values", 1 )+ " cm " );
	});
	
	
	function showhidebutton(data,ID){
		
		if($(this).hasClass('locked_active') || $(this).hasClass('unlocked_inactive')){
		/* code to do when unlocking */
        $('#switch_status').html('Switched on.');
		}else{
			/* code to do when locking */
			$('#switch_status').html('Switched off.');
		}
		//$('#'+data+ID).html('hello');
		
		/* reverse locking status */
		$('#toggle_event_editing'+ID+' button').eq(0).toggleClass('locked_inactive locked_active btn-default btn-danger');
		$('#toggle_event_editing'+ID+' button').eq(1).toggleClass('unlocked_inactive unlocked_active btn-danger btn-default');
		
		if(data=='s'){
			$('#showhide').val('1');
		}else if(data=='h'){
			$('#showhide').val('0');
		}
	}
</script>