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
			<div class="col-sm-10 col-sm-offset-1">
				<div class="row">
					<div class="col-sm-4 panel-body">
						<div class="left-tab">
							<?php include_once('msg_left_panel.php'); ?>
						</div>
					</div>
					
					<div class="col-sm-8 panel-body">
						<div class="inbox">
							<div class="inbox-heading">
								Share Photo
								<div class="dropdown pull-right">
								  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop"><i class="fa fa-cog" aria-hidden="true"></i></button>
								  <ul class="dropdown-menu  drop_down" id="drop">
									<li><a href="javascrip:void(0)">Delete Conversation</a></li>
									<li><a href="javascrip:void(0)">Archive Conversation</a></li>
									<li><a href="javascrip:void(0)">Report  User</a></li>
									<li><a href="javascrip:void(0)">Block User</a></li>
								  </ul>
								</div>
							</div>
							<hr>
							<div class="ConThumb">
								<div class="panel-body">
									<div class="col-sm-8">
										<a href="view-profile.php">
											<span class="ProfileConImg">
												<img src="img/1.jpg" class="pull-left">
											</span>
											<h4>Renna Kumari</h4>
											<h3>Mumbai, Maharashtra, India</h3>
											<div class="message">Hi How r u ?...</div>
										</a>
									</div>
								</div>
							</div>
							<div class="ConThumb">
								<div class="panel-body">
									<div class="col-sm-8">
										<a href="conversation.php">
											<span class="ProfileConImg">
												<img src="img/2.jpg" class="pull-left">
											</span>
											<h4>Amit Singh</h4>
											<h3>Mumbai, Maharashtra, India</h3>
											<div class="message">m fine. and you ?</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="refresh"><a href="javascrip:void(0)"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Conversation</a></div>
							</div>
						</div>
						<div class="rply">
							<p>Tip: Do not give out your bank account information to anyone, and beware of fake checks or deposits. </p>
							<div class="row">
								<form>
									<div class="col-sm-12">
										<div class="form-group">
											<textarea id="message" class="form-control" rows="6"> Write Your Message..</textarea>
										</div>
									</div>
									<div class="col-sm-2 pull-right">
										<button type="button" class="btn btn-danger btn-block">SEND</button>
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
<script src="js/jquery.js"></script>