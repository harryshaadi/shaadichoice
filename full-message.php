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
?> 
<!--  end navbar -->
<script>
function viewprofile(usr_id){
	//alert('<?=USER_PATH?>'+'profile-details/'+usr_id);
	window.location.href = '<?=USER_PATH?>'+'profile-details/'+usr_id;
	return false;
}

function viewconverstation(usr_id){
	window.location.href = '<?=USER_PATH?>'+'conversation.php?cu_id='+usr_id;
	return false;
}
</script>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
				<?php 	
					if(isset($_GET['conv_id'])){
						$msg_id = $_GET['conv_id'];
						$msg_read_status = '1';
						global $db;	
						$mydata = $db->updateRecord(0,array('msg_read_status' => $msg_read_status),'tbl_messages',array('msg_id'=>$msg_id));
						
						$whereClausenm = '';
						$whereClausenm = 'msg_id ="'.$_GET['conv_id'].'"';
						$stpm = '';
						$perPage = '';
						$msgdata = $db->getRecord(0, array('msg_from','msg_to','msg_description','msg_read_status','created_on'), 'tbl_messages', $whereClausenm, $stpm, $perPage, "created_on", 'DESC LIMIT 1');
						$tot_rec = count($msgdata);
						//print_r($msgdata);
						$msg_user_id = $_GET['msg_data']; 
						$mfrom = $_GET['mfrom'];
						if($tot_rec>0){
							if($msg_user_id == 'Admin')
							{
								$msg_from_dtl ='';
								$msg_from_state = '';
								$msg_from_country = '';
								$msg_from_city = '';
								$msg_from_dtl[0]['fullname'] ='ShaadiChoice Admin';
							}
							else
							{
								$msg_from_dtl = getUserDtls($msg_user_id);
								$msg_from_state = getStates($msg_from_dtl[0]['state_id']);
								$msg_from_country = getCountrys($msg_from_dtl[0]['country_id']);
								$msg_from_city = getCitys($msg_from_dtl[0]['city_id']);
							}
						$msg_from_pic = getUserPics($msg_user_id);
						$msg_from_description = $msgdata[0]['msg_description'];
						$date = date_create($msgdata[0]['created_on']);
						$date = date_format($date, 'g:ia\,\ j F Y');
						}else{
							header("Location:message.php");
						} 
					?>
					<div class="col-sm-3 panel-body">
						<div class="left-tab">
							<?php include_once('msg_left_panel.php'); ?>
						</div>
					</div>
					
					
					<div class="col-sm-9 panel-body">
						<div class="inbox">
							<div class="inbox-heading">
								<?//=substr($msg_from_description,0,40)?><a href="javascript:void(0)" onClick='return viewconverstation("<?=$msg_user_id;?>");'>Conversation Details</a>
								<div class="dropdown pull-right">
								  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop"><i class="fa fa-cog" aria-hidden="true"></i></button>
								  <ul class="dropdown-menu  drop_down" id="drop">
									<li><a href="javascript:void(0)">Delete Conversation</a></li>
									<li><a href="javascript:void(0)">Archive Conversation</a></li>
									<li><a href="javascript:void(0)">Report  User</a></li>
									<li><a href="javascript:void(0)">Block User</a></li>
								  </ul>
								</div>
							</div>
							<hr>
						
							<div class="ConThumb">
								<div class="panel-body">
									<div class="col-sm-12">
										<a href="javascript:void(0)" onClick='return viewprofile("<?=$msg_user_id;?>");'>
											<span class="ProfileConImg">
												<img src="<?=$msg_from_pic?>" class="pull-left">
											</span>
											<h4><?=ucwords($msg_from_dtl[0]['fullname']);?></h4>
											<?php if($msg_user_id !='Admin'){?>
											<h3><?=$msg_from_city?>, <?=$msg_from_state?>, <?=$msg_from_country?></h3>
											<?php } else {?><h3></h3> <?php } ?>
											
										</a>
										<div class="message" style="height: 64px;"><?=$msg_from_description?></div>
									</div>
								</div>
							</div>
						</div>
						<?php if($mfrom=='inbox'){ ?>
						<br>
						<div class="rply">
							<p>Tip: Do not give out your bank account information to anyone, and beware of fake checks or deposits. </p>
							<div class="row">
								<form action="<?=USER_PATH?>user-controller.php" method="POST">
									<div class="col-sm-12">
										<div class="form-group">
											<textarea class="form-control" name="msg_description" id="msg_description" placeholder="Write a message..." maxlength="140" rows="5" required ></textarea> 
										</div>
									</div>
									<div class="col-sm-4 pull-left">
									
									</div>
									<div class="col-sm-2 pull-right">
										<input type="submit" class="btn btn-danger pull-right" value="Send Message">
										<input type="hidden" name="postAction" value="quickMsg">
										<input type="hidden" name="postActionCode" value="<?=$msg_user_id?>">
										<input type="hidden" name="returnPath" value="full-message.php?conv_id=<?=$_GET['conv_id']?>&msg_data=<?=$_GET['msg_data']?>&mfrom=inbox">
									</div>
								</form>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php }else{ ?>
						<div class="col-sm-12 panel-body">
							<h2>You are not authorised to see this page contact to website administrator.</h2>
							<h2><a href="message.php">Back</a></h2>
						</div>
					<?php }?>	
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once('chat_process.php'); ?>
<?php include('footer.php');?> 
<?php include_once('shaadichoice_chat.php'); ?> 
<script src="js/jquery.js"></script>