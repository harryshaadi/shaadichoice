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

	$mySelectedFiltes = $db->getRecord(0, array('religion_ids', 'body_type_ids', 'age_ids', 'height_ids', 'drinking_ids', 'smoking_ids', 'diet_ids', 'profile_image_status', 'filter_status'), 'tbl_message_filters', array('profile_code' => $_SESSION['userDetail']['profile_code']));
	$count = count($mySelectedFiltes);
	
	$wher ='';
	$profileCodeArr ='';
	if(!empty($mySelectedFiltes[0]))
	{
		if($mySelectedFiltes[0]['religion_ids'] !='')
		{
			$relgnArr = explode(',', $mySelectedFiltes[0]['religion_ids']);
			$rlgn = implode("','",$relgnArr);
			$wher .= " 1 OR a.religion_code IN('".$rlgn."')";
		}
		
		if($mySelectedFiltes[0]['body_type_ids'] !='')
		{
			$bodyArr = explode(',', $mySelectedFiltes[0]['body_type_ids']);
			$bdyStr = implode("','",$bodyArr);
			$wher .= " OR b.body_type IN('".$bdyStr."')";
		}
		
		if($mySelectedFiltes[0]['age_ids'] !='')
		{
			$ageArr = array();
			$ageArr = explode(',', $mySelectedFiltes[0]['age_ids']);
			$wher .= " OR ((DATEDIFF(CURDATE(), b.birth_date) / 365.25) >= ".$ageArr[0]." AND (DATEDIFF(CURDATE(), b.birth_date) / 365.25) <= ".$ageArr[1].")";
		}
		
		if($mySelectedFiltes[0]['height_ids'] !='')
		{
			$heightArr = array();
			$heightArr = explode(',', $mySelectedFiltes[0]['height_ids']);
			$wher .= " OR (b.height BETWEEN ".$heightArr[0]." AND ".$heightArr[1].")";
		}
		
		if($mySelectedFiltes[0]['drinking_ids'] !='')
		{
			if($mySelectedFiltes[0]['drinking_ids'] == 'yes') 
			$drinkArr = 'Y';
			else if($mySelectedFiltes[0]['drinking_ids'] == 'no')
			$drinkArr = 'N';
			else if($mySelectedFiltes[0]['drinking_ids'] == 'occasionally')
			$drinkArr = 'O';
		
			$wher .= " OR c.drink = '".$drinkArr."'";
		}
		
		if($mySelectedFiltes[0]['smoking_ids'] !='')
		{
			if($mySelectedFiltes[0]['smoking_ids'] == 'yes') 
			$smokeArr = 'Y';
			else if($mySelectedFiltes[0]['smoking_ids'] == 'no')
			$smokeArr = 'N';
			else if($mySelectedFiltes[0]['smoking_ids'] == 'occasionally')
			$smokeArr = 'O';
		
			$wher .= " OR c.smoke = '".$smokeArr."'";
		}
		
		if($mySelectedFiltes[0]['diet_ids'] !='')
		{
			$wher .= " OR c.diet = '".$mySelectedFiltes[0]['diet_ids']."'";
		}
		
		if($mySelectedFiltes[0]['profile_image_status'] !='')
		{
			$profileImage = $db->getRecord(0, array('image'), 'tbl_profile_image', array('approved' => 'Y', 'default_image' => 'Y'));
			if($mySelectedFiltes[0]['profile_image_status'] == 1)
			{
				
			}
			else
			{
				$wher .= " AND d.approved = 'Y' AND d.default_image ='Y'";
			}
		}
		
		if($mySelectedFiltes[0]['filter_status'] == 1)
		{
			$wher .= " GROUP BY a.profile_code";
			$tbls = "tbl_profiles a JOIN tbl_profile_detail b ON (a.profile_code = b.profile_code_fk) JOIN tbl_lifestyle c ON (c.profile_code = a.profile_code) JOIN tbl_profile_images d ON (a.profile_code = d.profile_code)";
			
			$profileCodeArr = $db->getRecord(0, array('a.profile_code'), $tbls, $wher);
		}
		
	}
	//print_r($profileCodeArr).'hello';
?> 
<link href="css/jquery.css" rel="stylesheet" type="text/css" />
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
											<h1>Filtered</h1>
										</div>
										<div class="col-lg-8 col-md-6 col-sm-6 col-xs-6">
											<div class="dropdown pull-right">
											  <button class="btn btn-setting" data-toggle="collapse" data-target="#demo" title="Filtered"><i class="fa fa-filter" aria-hidden="true"></i></button>
											  
											</div>
										</div>
									</div>
							</div>
							<hr>
						<?php
							$whereClausenm = '';
							$msg_read_status=0;
							$msg_move_status=0;
							$stpm = '';
							$perPage = '';
							$msgdata =0;
							
							$whereClausenm.= ' msg_to ="'.$_SESSION['userDetail']['profile_code'].'" AND msg_move_status="'.$msg_move_status.'"';
							
							if(!empty($_GET['show_unread_msg'])){	
							$msg_read_status=0;
								$whereClausenm.= ' AND msg_read_status="'.$msg_read_status.'"';
							}
							
							if(!empty($_GET['msg'])){
								$msg = $_GET['msg'];
								//echo $whereClausenm = " AND  msg_description LIKE '%".$msg."%'";
								$whereClausenm.= ' AND  msg_description LIKE "%'.$msg.'%"';
							}
							
							if(!empty($profileCodeArr))
							{
								$profileStr ='';
								foreach($profileCodeArr as $key => $val)
								{
									$profileStr .= "','".$val['profile_code'];
								}
								$profileStr = substr($profileStr,3);
								$whereClausenm.= " AND msg_from IN('".$profileStr."')";
								
								$msgdata = $db->getRecord(0, array('msg_id','msg_from','msg_to','msg_description','msg_read_status','created_on'), 'tbl_messages', $whereClausenm, $stpm, $perPage, "msg_id", 'DESC','msg_from');
							}
							
							$tot_rec = count($msgdata[0]);
							
							if($tot_rec>0){
								foreach($msgdata as $msg){
								
								$getUserDtlOnlineStatus = $db->getRecord(0, array("login_status"), 'tbl_login_session', array("profile_code"=>$msg['msg_from']), '', '', "", '');
								
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
								
								$msgreaddata = $db->getRecord(0, array('id','msg_id','read_by_id'), 'tbl_messages_read',array('msg_id'=>$msg['msg_id'],'read_by_id'=>$_SESSION['userDetail']['profile_code']));
								
								$msgreadstatusbyfrom = $db->getRecord(0, array('id','msg_id','read_by_id'), 'tbl_messages_read',array('msg_id'=>$msg['msg_id'],'read_by_id'=>$msg['msg_from']));
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
										<a href="<?=USER_PATH?>conversation.php?cu_id=<?=$msg['msg_from']?>&mfrom=filtered">
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
								<div class="panel-body text-center filter">
									<h3>Looks like you don't have any conversations yet</h3>
									<h4>Start a conversation with someone you are interested in.</h4>
									<a href="upgrade.php" class="btn btn-default2">Upgrade Now</a>
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


<script src="js/jquery.js"></script>

<script>
$(document).ready(function(){
	$('.collapse').on('shown.bs.collapse',function(){
		$(this).parent().find('.fa-plus-circle').removeClass('fa-plus-circle').addClass('fa-minus-circle');
	}).on('hidden.bs.collapse',function(){
		$(this).parent().find('.fa-minus-circle').removeClass('fa-minus-circle').addClass('fa-plus-circle');	
	})
	
	<?php if($mySelectedFiltes[0]['filter_status'] == 0) {?>
		$('#accordion').css('display','none');
	<?php } ?>
});

$('#h1').click(function(){
	$('#accordion').css('display','none');
})
$('#s1').click(function(){
	$('#accordion').css('display','block');
})
</script>

<script>
	
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
</script> 


<script>
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

