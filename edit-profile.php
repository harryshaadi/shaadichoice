<?php 
	include('head.php');
	include('currency_api.php');
	//echo $_SESSION['userDetail']['profile_code'];
	$userBasicArr = $db->getRecord(0,array('*'),'tbl_profiles',array('profile_code'=>$_SESSION['userDetail']['profile_code']));
	$userLifestyleArr = $db->getRecord(0,array('diet','drink','smoke'),'tbl_lifestyle',array('profile_code'=>$_SESSION['userDetail']['profile_code']));
	$userProfileDetails = $db->getRecord(0,array('*'),'tbl_profile_detail',array('profile_code_fk'=>$_SESSION['userDetail']['profile_code']));
	$userProfileImage = $db->getRecord(0,array('*'),'tbl_profile_images',array('profile_code'=>$_SESSION['userDetail']['profile_code']));
	$userContactDetail = $db->getRecord(0,array('*'),'tbl_member_contact_info',array('profile_code'=>$_SESSION['userDetail']['profile_code']));
	//$userCommunityDetail = $db->getRecord(0,array('community_name,community_code'),'tbl_community',array('community_code'=>$userContactDetail[0]['community_code']));
	$userMotherTongue = $db->recordJoin(0,array('tbl_mother_tongue.mother_tongue,tbl_mother_tongue.mother_tongue_code'),'tbl_mother_tongue,tbl_profiles',array('tbl_mother_tongue.mother_tongue_code'=>'tbl_profiles.mother_tongue_code'),array('tbl_profiles.profile_code'=>$_SESSION['userDetail']['profile_code']));
	
	$userReligionName = $db->recordJoin(0,array('tbl_religions.religion_name,tbl_religions.religion_code'),'tbl_religions,tbl_profiles',array('tbl_religions.religion_code'=>'tbl_profiles.religion_code'),array('tbl_profiles.profile_code'=>$_SESSION['userDetail']['profile_code']));
	
	$formVldParm = "text:fname:First Name~text:lname:Last Name~email:email:Email~numeric:contact_no:Contact Number~dropDown:mycountry_code_id:Country~dropDown:country_phone_code_pk:Country Code";
?> 
<link href="css/jquery.css" rel="stylesheet" type="text/css" />
<!--  end navbar -->
<section>
	
	<div class="container bootstrap snippets edit-profile">
		<div class="row">
			<div class="col-sm-3 panel-body">
				<div class="left-tab">
					<div class="left-tab-heading">Manage Your Profile</div>
					<ul>
						<li class="active"><a href="<?=USER_PATH?>edit-profile.php">Edit Personal Profile</a></li>
						<li><a href="<?=USER_PATH?>hobbies.php">Edit Hobbies & Interests</a></li>
						<li><a href="<?=USER_PATH?>edit-partner.php">Edit Partner Profile</a></li>
						<li><a href="<?=USER_PATH?>partner-hobbies.php">Edit Partner Hobbies & Interests</a></li>
						<li><a href="<?=USER_PATH?>manage-photo.php">Manage Photo</a></li>
						<li><a href="<?=USER_PATH?>hide-member.php">Hide / Delete Profile</a></li>
						<li><a href="<?=USER_PATH?>view-my-profile.php">View Profile</a></li>
					</ul>
				</div>
			</div>

		  <div class="col-xs-12 col-sm-9 profile-list profile_listing">
		  <?php  
				include_once('user-session-msg.php');
			?> 
			<form class="form-horizontal" name="userProfileDetail" id="userProfileDetail" method="POST" action="user-controller.php" onSubmit="return validation('userProfileDetail', '<?=$formVldParm?>');">
		  		
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Basic Info </h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-3 control-label">Name :</label>
					<div class="col-sm-2">
					  <input type="text" name="fname" id="fname" class="form-control" value="<?=ucfirst($userBasicArr[0]['fname'])?>">
					  <span class="errorcls" id="span_fname"></span>
					</div>
					<div class="col-sm-2">
					  <input type="text" name="mname" id="mname" class="form-control" value="<?=ucfirst($userBasicArr[0]['mname'])?>">
					  <span class="errorcls" id="span_mname"></span>
					</div>
					<div class="col-sm-2">
					  <input type="text" name="lname" id="lname" class="form-control" value="<?=ucfirst($userBasicArr[0]['lname'])?>">
					  <span class="errorcls" id="span_lname"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Email :</label>
					<div class="col-sm-6">
					  <input type="email" name="email" id="email" class="email form-control" value="<?=$userBasicArr[0]['email']?>">
					  <span class="span_email errorcls" id="span_email"></span>
					</div>
				  </div>
				  <div class="form-group">
						<label class="col-sm-3 control-label">Phone Number :</label>
						<div class="col-sm-2">
						  <?php  $countryArr = $db->getRecord(0,array('country_id_pk,country_name'),'tbl_countries',array('status'=>'A'),'','','country_name','ASC');
								makeDropDownCountryFromDB('country_id_fk','mycountry_code_id', $countryArr, 'country_id_pk', 'country_name', $userContactDetail[0]['country_id_fk'], '', "class='form-control'");
						  ?>
						   <span class="errorcls" id="span_mycountry_code_id"></span>
						</div>
						<div class="col-sm-2">
						    <select class="form-control" id="country_phone_code_pk" name="country_phone_code_pk">
								<?php if($userBasicArr[0]['country_phone_code']!=''){?>
								<option value="<?php echo $userBasicArr[0]['country_phone_code'] ?>" selected><?php echo "+". $userBasicArr[0]['country_phone_code']; ?></option>
								<?php } ?>
							</select>
							<span class="errorcls" id="span_country_phone_code_pk"></span>
						</div>
						<div class="col-sm-2">
						  <input type="text" name="contact_no" id="contact_no" class="form-control" value="<?=$userBasicArr[0]['contact_no']?>">
						  <span class="errorcls" id="span_contact_no"></span>
						</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Date of Birth :</label>
					<div class="col-sm-2">
						<?php
						$day =''; $month = ''; $year = '';
						if($userProfileDetails[0]['birth_date']!='')
						{	
							$birdate = explode('-',$userProfileDetails[0]['birth_date']);
							$day = $birdate[2]; $month = $birdate[1];  $year = $birdate[0];
						}
						
						makeDropDownDay('day',$day, "class='form-control'"); ?>
					</div>
					<div class="col-sm-2">
						<?php makeDropDownMonth('month', array_keys($ARR_MONTH_LIST), array_values($ARR_MONTH_LIST), $month, "class='form-control'"); ?>
					</div>
					<div class="col-sm-2">
						<?php makeDropDownYear('year', $year, "class='form-control'"); ?>
					</div>
				</div>
				  
				  <div class="form-group">
					<label class="col-sm-3 control-label">Gender : </label>
					<div class="col-sm-6">
						<label class="radio-inline"><input type="radio" name="gender" value="M" <?php if($userBasicArr[0]['gender']=='M') echo 'checked';?> onclick="return false;">Male</label>
						<label class="radio-inline"><input type="radio" name="gender" value="F" <?php if($userBasicArr[0]['gender']=='F') echo 'checked';?> onclick="return false;">Female</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Marital Status :</label>
					<div class="col-sm-6">
					  <?php makeDropDown('maritial_status', array_keys($MARITAL_STATUS), array_values($MARITAL_STATUS), $userBasicArr[0]['maritial_status'], "class='form-control'");  ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Profile Created By :</label>
					<div class="col-sm-6">
					   <?php makeDropDown('created_by', array_keys($ARR_CREAT_BY), array_values($ARR_CREAT_BY), $userBasicArr[0]['created_by'], "class='form-control'");  ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Body Type :</label>
					<div class="col-sm-7">
						<?php foreach ($ARR_BODY_TYPE AS $bodyTypeKey => $bodyTypeVal)
						{ ?>
						<label class="radio-inline"><input type="radio" name="body_type" value="<?=$bodyTypeKey?>" <?php if($userProfileDetails[0]['body_type']==trim($bodyTypeKey)) echo 'checked'; ?>><?=$bodyTypeVal?></label>
						<?php } ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Body Weight :</label>
					<div class="col-sm-2">
					  <input type="text" name="weight" id="weight" class="form-control" value="<?=$userProfileDetails[0]['weight']?>">
					</div>
					<div class="col-sm-3">
					  	<label class="radio-inline"><input type="radio" value="kg" name="measure" <?php if($userProfileDetails[0]['measure']=='kg') echo 'checked'; ?>>kg</label>
						<label class="radio-inline"><input type="radio" value="lbs" name="measure" <?php if($userProfileDetails[0]['measure']=='lbs') echo 'checked'; ?>>lbs</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Eye Color:</label>
					<div class="col-sm-6">
					 <?php 
						if($userProfileDetails[0]['eye_color']=='') $eyeColor = '';
						  else $eyeColor = $userProfileDetails[0]['eye_color'];
						 makeDropDown('eye_color', array_keys($ARR_EYE_COLOR), array_values($ARR_EYE_COLOR), $eyeColor, "class='form-control'");  ?>
					</div>
				 </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Height :</label>
					<div class="col-sm-6">
					 <?php 
					if($userProfileDetails[0]['height']== 0) $height1 = '';
						  else $height1 = $userProfileDetails[0]['height'];
						 makeDropDown('height', array_keys($ARR_HEIGHT), array_values($ARR_HEIGHT), $height1, "class='form-control'");  ?>
					</div>
				</div>
				  
				  <div class="form-group">
					<label class="col-sm-3 control-label">Complexion :</label>
					<div class="col-sm-6">
						<?= makeDropDown('skin_tone', array_keys($ARR_SKIN_TONE), array_values($ARR_SKIN_TONE), $userProfileDetails[0]['skin_tone'], "class='form-control'");  ?>
					</div>	
				</div>
				 
				  <div class="form-group">
					<label class="col-sm-3 control-label">Blood Group :</label>
					<div class="col-sm-6">
					<?php 
					   if($userProfileDetails[0]['blood_group']=='') $blood = '';
					  else $blood = $ARR_BLOOD_GROUP[$userProfileDetails[0]['blood_group']];
					  makeDropDown('blood_group', array_keys($ARR_BLOOD_GROUP), array_values($ARR_BLOOD_GROUP), $blood, "class='form-control'");  ?>
					</div>
				  </div>
				</div>
			  </div>

			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Family Background</h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-3 control-label">Religion :</label>
					<div class="col-sm-6">
					 <?php $Religions = $db->getRecord(0,array('religion_name,religion_code'),'tbl_religions',array('status'=>'A'),'','','religion_name','ASC');
						makeDropDownFromDB('religion_code', $Religions, 'religion_code', 'religion_name', $userReligionName[0]['religion_code'], '', "class='form-control'",'onchange="checkotherreligion(this);"');
						?>
						
					</div>						
				  </div>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div id="religion_code_other_yes" style="display: none;">
								<input type="text" name="religion_code_other" id="religion_code_other" value="" placeholder="Please specify your religion" class="form-control">
							</div>
						</div>
					</div>
					<?php if($userReligionName[0]['religion_code']=='4b5e46272c2df29c5a96350518ef70aa'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'religion_other_name','tbl_religion_other');?></div>
						</div>
					</div>
					<?php } ?>	
				  <div class="form-group">
					<label class="col-sm-3 control-label">Community :</label>
					<div class="col-sm-6">
						<select class="form-control" id="community_code" name="community_code" onchange="checkothercommunity(this);">
							<?php if($userBasicArr[0]['community_code']!='NA'){
								$userCommunityArr = $db->getRecord(0,array('community_name'),'tbl_community', array('community_code' => $userBasicArr[0]['community_code']));
								?>
							<option value="<?php echo $userBasicArr[0]['community_code'] ?>" selected><?php echo $userCommunityArr[0]['community_name']; ?></option>
							<?php } else  { ?>
							<option value="NA" selected>Community not available</option>
							<?php } ?>
							<!--<div class="col-sm-6">
							  <?php $community = $db->getRecord(0,array('community_name,community_code'),'tbl_community',array('status'=>'A'),'','','community_name','ASC');
								makeDropDownFromDB('community_code', $community, 'community_code', 'community_name', $userBasicArr[0]['community_code'], '', "class='form-control'",'onchange="checkothercommunity(this);"');?>
							</div> -->
						</select> 
						
					</div>
				  </div>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div id="community_code_other_yes" style="display: none;">
								<input type="text" name="community_code_other" id="community_code_other" value="" placeholder="Please specify your community" class="form-control">
							</div>
						</div>
					</div>
		
				<?php if($userBasicArr[0]['community_code']=='37f0260d37b50e0b3164f2d81868af52'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>
				
				<?php if($userBasicArr[0]['community_code']=='catholic_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>
				
				<?php if($userBasicArr[0]['community_code']=='catholic_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>	
				<?php if($userBasicArr[0]['community_code']=='chrishtain_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>	
				<?php if($userBasicArr[0]['community_code']=='islamic_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>
				<?php if($userBasicArr[0]['community_code']=='hindu_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>	
				<?php if($userBasicArr[0]['community_code']=='jain_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>	
				<?php if($userBasicArr[0]['community_code']=='jewish_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>	
				<?php if($userBasicArr[0]['community_code']=='muslim_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>	
				<?php if($userBasicArr[0]['community_code']=='no_religion_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>	
				<?php if($userBasicArr[0]['community_code']=='parsi_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>
				<?php if($userBasicArr[0]['community_code']=='sikh_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>	
				<?php if($userBasicArr[0]['community_code']=='other_other'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'community_other_name','tbl_community_other');?></div>
						</div>
					</div>
				<?php } ?>				
				  <div class="form-group">
					<label class="col-sm-3 control-label">Mother Tongue :</label>
					<div class="col-sm-6">
					  <?php 
						$motherTongue = $db->getRecord(0,array('mother_tongue,mother_tongue_code'),'tbl_mother_tongue',array('status'=>'A'),'','','rank','ASC');
						makeDropDownFromDB('mother_tongue_code', $motherTongue, 'mother_tongue_code', 'mother_tongue', $userMotherTongue[0]['mother_tongue_code'], '', "class='form-control'",'onchange="checkothermother_tongue(this);"');
						?>
					</div>
				  </div>
				   <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div id="mother_tongue_code_other_yes" style="display: none;">
								<input type="text" name="mother_tongue_code_other" id="mother_tongue_code_other" value="" placeholder="Please specify your mother tongue" class="form-control">
							</div>
						</div>
					</div>
					<?php if($userMotherTongue[0]['mother_tongue_code']=='6be7d0534f51857dd87f7fef23dd308b'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'mother_tongue_other_name','tbl_mother_tongue_other');?></div>
						</div>
					</div>
				<?php } ?>
					
				  <div class="form-group">
					<label class="col-sm-3 control-label">Gothra/Gothram :</label>
					<div class="col-sm-6">
					  <?php $gotra = $db->getRecord(0,array('gotra_name,gotra_code'),'tbl_gotra',array('status'=>'A'),'','','gotra_name','ASC');
					  makeDropDownFromDB('gotra_code', $gotra, 'gotra_code', 'gotra_name', $userProfileDetails[0]['gotra_code'], '', "class='form-control'",'onchange="checkothergotra(this);"');
					  //echo $userProfileDetails[0]['gotra_code'];
					 //echo $gotra[0]['gotra_code'];
					   ?>
					</div>
				 </div>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div id="gotra_code_other_yes" style="display: none;">
								<input type="text" name="gotra_code_other" id="gotra_code_other" value="" placeholder="Please specify your gotra" class="form-control">
							</div>
						</div>
					</div>
					<?php if($userProfileDetails[0]['gotra_code']=='012f922d6dcc525939d180134d0ccace'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'gotra_other_name','tbl_gotra_other');?></div>
						</div>
					</div>
				<?php } ?> 
				  <div class="form-group">
					<label class="col-sm-3 control-label">Manglik :</label>
					<div class="col-sm-6">
					  <label class="radio-inline"><input type="radio" value="0" name="manglik" <?=($userProfileDetails[0]['manglik'] == 0?'checked':'')?>>&nbsp;No </label>
					  <label class="radio-inline"><input type="radio" value="1" name="manglik" <?=($userProfileDetails[0]['manglik'] == 1?'checked':'')?>>&nbsp;Yes </label>
					  <label class="radio-inline"><input type="radio" value="2" name="manglik" <?=($userProfileDetails[0]['manglik'] == 2?'checked':'')?>>&nbsp;Don't Know</label>
					</div>
				</div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Astro Influence (Nakshtra):</label>
					<div class="col-sm-6">
					  <?php $nakshtra = $db->getRecord(0,array('tbl_nakshtra_id,name'),'tbl_nakshtra',array('status'=>'A'),'','','name','ASC');
					  makeDropDownFromDB('nakshtra', $nakshtra, 'tbl_nakshtra_id', 'name', $userProfileDetails[0]['nakshtra'], '', "class='form-control'",'onchange="checkothernakshtra(this);"');?>
					<?php //echo $userProfileDetails[0]['nakshtra']; ?>
					</div>
				</div>
				<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div id="nakshtra_code_other_yes" style="display: none;">
								<input type="text" name="nakshtra_code_other" id="nakshtra_code_other" value="" placeholder="Please specify your nakshtra" class="form-control">
							</div>
						</div>
					</div>
					<?php if($userProfileDetails[0]['nakshtra']=='31'){?>
				  <div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="form-control"><?php echo OtherFieldsDetail($_SESSION['userDetail']['profile_code'],'nakshtra_other_name','tbl_nakshtra_other');?></div>
						</div>
					</div>
				<?php } ?>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Horoscope (Rashi) :</label>
					<div class="col-sm-6">
					 <?php $rashi = $db->getRecord(0,array('tbl_horscope_id,name'),'tbl_horscope',array('status'=>'A'),'','','name','ASC');
					  makeDropDownFromDB('rashi', $rashi, 'name', 'name', $userProfileDetails[0]['rashi'], '', "class='form-control'");?>
					</div>
				</div>
					
				</div>
			  </div>
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Family Details</h4>
				</div>
				<?php $userFamilyArr = $db->getRecord(0,array('*'),'tbl_family_details',array('profile_code'=>$_SESSION['userDetail']['profile_code']));?>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-3 control-label">Father :</label>
					<div class="col-sm-6">
					  <?php 
					  if($userFamilyArr[0]['father_status']=='') $parentStatus = '';
					  else $parentStatus = $userFamilyArr[0]['father_status'];
					  
						$employmentArr = $db->getRecord(0,array('category_name', 'category_code'), 'tbl_profession_category', '', '', '','category_name', 'ASC'); 
						makeFatherDropDownFromDB('father_status', $employmentArr, 'category_name', 'category_name', $parentStatus, '', "class='form-control'");?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Mother :</label>
					<div class="col-sm-6">
					  <?php 
					  if($userFamilyArr[0]['mother_status']=='') $motherStatus = '';
					 else $motherStatus = $userFamilyArr[0]['mother_status'];
					 
					$employmentArr = $db->getRecord(0,array('category_name', 'category_code'), 'tbl_profession_category', '', '', '','category_name', 'ASC'); 
						makeMotherDropDownFromDB('mother_status', $employmentArr, 'category_name', 'category_name', $motherStatus, '', "class='form-control'");?>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="col-sm-3 control-label">Number of Siblings :</label>
					<div class="col-sm-6">
						<label class="radio-inline">
						<?php if(($userFamilyArr[0]['no_of_brothers'] >0) || ($userFamilyArr[0]['no_of_sisters']>0)) $checked= 1; else $checked= 0; ?>
						  <input type="radio" name="sibling" class="siblings" value="Y" <?php if($userFamilyArr[0]['sibling_status']=='Y'){ echo'checked';} ?>>Yes
						</label>
						<label class="radio-inline">
						  <input type="radio" name="sibling" class="siblings" value="N"  <?php if($userFamilyArr[0]['sibling_status']=='N'){ echo 'checked';} ?>>No
						</label>
					</div>
				</div>
				
				<div class="form-group" id="brother" style="display:<?php if(($userFamilyArr[0]['sibling_status']=='Y') and (($userFamilyArr[0]['no_of_brothers'] >0) || ($userFamilyArr[0]['no_of_sisters']>0))){ echo "block"; }else{ echo "none";} ?>">
					<label class="col-sm-3 control-label">Number of Brothers :</label>
					<div class="col-sm-6">
						<?= makeDropDown('no_of_brothers', array_keys($ARR_NUMBER_BROTHER), array_values($ARR_NUMBER_BROTHER), $userFamilyArr[0]['no_of_brothers'], "class='form-control'") ?>
						<span class="errorcls" id="span_no_of_brothers"></span>
					</div>
				</div>
				
				<div class="form-group" id="sister" style="display:<?php if(($userFamilyArr[0]['sibling_status']=='Y')and(($userFamilyArr[0]['no_of_brothers'] >0) || ($userFamilyArr[0]['no_of_sisters']>0))){ echo "block"; }else{ echo "none";} ?>">
					<label class="col-sm-3 control-label">Number of Sisters :</label>
					<div class="col-sm-6">
						<?= makeDropDown('no_of_sisters', array_keys($ARR_NUMBER_SISTER), array_values($ARR_NUMBER_SISTER), $userFamilyArr[0]['no_of_sisters'], "class='form-control'") ?>
						<span class="errorcls" id="span_no_of_sisters"></span>
					</div>
				</div>
			
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Family Location :</label>
					<div class="col-sm-6">
					  <input type="text" name="family_location" id="family_location" class="form-control" value="<?=ucwords($userFamilyArr[0]['family_location'])?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Native Place :</label>
					<div class="col-sm-6">
					  <input type="text" name="native_place" id="native_place" class="form-control" value="<?=ucwords($userFamilyArr[0]['native_place'])?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Family type :</label>
					<div class="col-sm-6">
					  	<label class="radio-inline"><input type="radio" name="family_type" value="Joint" <?php if($userFamilyArr[0]['family_type']=='Joint') echo 'checked'; ?>>Joint</label>
						<label class="radio-inline"><input type="radio" name="family_type" value="Nuclear" <?php if($userFamilyArr[0]['family_type']=='Nuclear') echo 'checked'; ?>>Nuclear</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Family Affluence :</label>
					<div class="col-sm-6">
					   <?php 
					   if($userFamilyArr[0]['affluence_level']=='') $affluence = '';
						else $affluence = $FAMILY_AFFLUENCE[$userFamilyArr[0]['affluence_level']];
					   makeDropDown('affluence_level', array_keys($FAMILY_AFFLUENCE), array_values($FAMILY_AFFLUENCE), $affluence, "class='form-control'");  ?>
					</div>
				  </div>
				</div>
			  </div>
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Education & Career</h4>
				</div>
				<?php $userEducationArr = $db->getRecord( 0,array('*'),'tbl_education_career',array('profile_code'=>$_SESSION['userDetail']['profile_code']));?>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-3 control-label">Education :</label>
					<div class="col-sm-6">
					  <?php $Education = $db->getRecord(0,array('name,education_code'),'tbl_education',array('status'=>'A'),'','','name','ASC');
					  makeDropDownFromDB('education_code', $Education, 'education_code', 'name', $userEducationArr[0]['education_code'], '', "class='form-control'");?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Employment :</label>
					<div class="col-sm-6">
					  <?php $employmentArr = $db->getRecord(0,array('category_name', 'category_code'), 'tbl_profession_category', '', '', '','category_name', 'ASC'); ?>
					<?= makeDropDownFromDB('working_with', $employmentArr, 'category_name', 'category_name', $userEducationArr[0]['working_with'], '', "class='form-control'");?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Annual Income :</label>
					<div class="col-sm-3">
						<?php makeDropDown('annual_income', array_keys($ARR_INCOME), array_values($ARR_INCOME), $userEducationArr[0]['annual_income'], "class='form-control'"); ?>
					</div>
					<div class="col-sm-3">
						<?php 
						$UserCountryCode = GetCountryCode();
						$where = "currency_code != ''";
						$currency = $db->getRecord(0,array('currency_code,country_code'),'tbl_countries',$where);
						$selectedCurrency = $db->getRecord(0,array('currency_code'),'tbl_countries',array('country_code' =>$UserCountryCode));
						makeDropDownFromDB('currency', $currency, 'currency_code', 'currency_code', $selectedCurrency[0]['currency_code'], '', "class='form-control'");?>
					</div>
					
				</div>
				</div>
			  </div>
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Location</h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-3 control-label">Country :</label>
					<div class="col-sm-6">
					  <?php $country = $db->getRecord(0,array('country_name,country_id_pk'),'tbl_countries',array('status'=>'A'),'','','country_name','ASC');
						makeDropDownFromDB('country_id_fk', $country, 'country_id_pk', 'country_name', $userContactDetail[0]['country_id_fk'], '', "class='form-control'");?>
					</div>
				  </div>
				  <div class="form-group">
						<label class="col-sm-3 control-label">State  :</label>
						<div class="col-sm-6">
							<?php $state = $db->getRecord(0,array('tbl_states.state_name,tbl_states.state_id_pk from tbl_states JOIN tbl_member_contact_info ON tbl_member_contact_info.state_id_fk = tbl_states.state_id_pk'),'',array('tbl_states.status'=>'A', 'tbl_member_contact_info.profile_code' => $_SESSION['userDetail']['profile_code']),'','','state_name','ASC'); 
							 $count = count($state);
							 //if($count > 0){
							?>
							  <!--<select name="state_id_fk" id="state_id_fk" class="form-control"><option value="<?//=$state[0]['state_id_pk']?>" selected><?//=$state[0]['state_name']?></option></select>-->
							 <?php // } else { ?>
							 <select name="state_id_fk" id="state_id_fk" class="form-control"><option value="">Please Select</option></select>
							 <?php //} ?>
							 
					  </div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">City  :</label>
					<div class="col-sm-6">
						   <?php $city = $db->getRecord(0,array('tbl_cities.city_name,tbl_cities.city_id_pk from tbl_cities JOIN tbl_member_contact_info ON tbl_member_contact_info.city_id_fk = tbl_cities.city_id_pk'),'',array('tbl_cities.status'=>'A', 'tbl_member_contact_info.profile_code' => $_SESSION['userDetail']['profile_code']),'','','city_name','ASC'); 
						 $count = count($city);
						 if($count > 0){
						?>
						  <select name="city_id_fk" id="city_id_fk" class="form-control"><option value="<?=$city[0]['city_id_pk']?>" selected><?=$city[0]['city_name']?></option></select>
						 <?php } else { ?>
						 <select name="city_id_fk" id="city_id_fk" class="form-control"><option value="">Please Select</option></select>
						 <?php } ?>	
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Zip/Pin/Area Code  :</label>
					<div class="col-sm-6">
						  <input type="text" name="pin_code_fk" id="pin_code_fk" value="<?=$userContactDetail[0]['pin_code_fk']?>" class="form-control">
					</div>
				  </div>
				 </div>
			  </div>
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Lifestyle</h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-3 control-label">Food Preference :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" name="diet" value="Veg"  <?php if($userLifestyleArr[0]['diet']=='Veg') echo 'checked'; ?>>Veg</label>
						<label class="radio-inline"><input type="radio" name="diet" value="Non-Veg" <?php if($userLifestyleArr[0]['diet']=='Non-Veg') echo 'checked'; ?>>Non-Veg</label>
						<label class="radio-inline"><input type="radio" name="diet" value="Vegan" <?php if($userLifestyleArr[0]['diet']=='Vegan') echo 'checked'; ?>>Vegan</label>
						<label class="radio-inline"><input type="radio" name="diet" value="Halal" <?php if($userLifestyleArr[0]['diet']=='Halal') echo 'checked'; ?>>Halal</label>
						<label class="radio-inline"><input type="radio" name="diet" value="Other" <?php if($userLifestyleArr[0]['diet']=='Other') echo 'checked'; ?>>Other</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Drink :</label>
					<div class="col-sm-6">
					  	<label class="radio-inline"><input type="radio" name="drink" value="Y" <?php if($userLifestyleArr[0]['drink']=='Y') echo 'checked'; ?>>Yes</label>
						<label class="radio-inline"><input type="radio" name="drink" value="N" <?php if($userLifestyleArr[0]['drink']=='N') echo 'checked'; ?>>No</label>
						<label class="radio-inline"><input type="radio" name="drink" value="O" <?php if($userLifestyleArr[0]['drink']=='O') echo 'checked'; ?>>Occasionally</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Smoke :</label>
					<div class="col-sm-6">
					  	<label class="radio-inline"><input type="radio" name="smoke" value="Y" <?php if($userLifestyleArr[0]['smoke']=='Y') echo 'checked'; ?>>Yes</label>
						<label class="radio-inline"><input type="radio" name="smoke" value="N" <?php if($userLifestyleArr[0]['smoke']=='N') echo 'checked'; ?>>No</label>
						<label class="radio-inline"><input type="radio" name="smoke" value="O" <?php if($userLifestyleArr[0]['smoke']=='O') echo 'checked'; ?>>Occasionally</label>
					</div>
				  </div>
				</div> 
			  </div>

			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">About Myself</h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-12 control-label">This section will help you make a positive impression on your potential partner</label>
					<div class="col-sm-12">
				  	<br>
					  <textarea class="form-control" rows="5" style="height: 100px;" maxlength="255" name="more_detail" id="more_detail"><?=ucwords($userProfileDetails[0]['more_detail'])?></textarea>
					  <span class="errorcls" id="span_more_detail"></span>
					</div>
				  </div>
				 </div>
			  </div>
			   <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">What I'm looking For</h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					
					<div class="col-sm-12">
				  	<br>
					  <textarea class="form-control" rows="5" style="height: 100px;" maxlength="255" name="looking_for" id="looking_for"><?=ucwords($userProfileDetails[0]['looking_for'])?></textarea>
					  <span class="errorcls" id="span_looking_for"></span>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-10">
					  <button type="submit" class="btn btn-danger">Save Changes</button>
					  
					 
					  
					    <a href="<?=USER_PATH?>self-profile.php"><input type="button"  name="BACK" value="BACK" class="btn btn-danger"></button></a>
					  
					  <input type="hidden" name="postAction" id="postAction" value="editUserProfile" />
					  <input type="hidden" name="postActionCode" id="postActionCode" value="<?=$_SESSION['userDetail']['profile_code']?>" />
					</div>
				  </div>
				</div>
			  </div>
			</form>

		  </div>
		</div>
		
	</div>
</section>

<?php include_once('chat_process.php'); ?>
<link href="<?=USER_PATH?>css/paging.css" rel="stylesheet" type="text/css" />
<?php include('footer.php');?> 
<?php include_once('shaadichoice_chat.php'); ?>
<script>
$(document).ready(function(){
	$('.collapse').on('shown.bs.collapse',function(){
		$(this).parent().find('.fa-plus-circle').removeClass('fa-plus-circle').addClass('fa-minus-circle');
	}).on('hidden.bs.collapse',function(){
		$(this).parent().find('.fa-minus-circle').removeClass('fa-minus-circle').addClass('fa-plus-circle');	
	})
});
</script>

<script>
	
	$(document).ready(function() {
        $('textarea').keypress(function(e) {
			if(e.keyCode==13){
				var msg = $(this).val();
				$("<div class='msg_b'>"+msg+"</div>").insertBefore('.msg_insert');
				$(this).val('');
				$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
			}
        });
    });
</script>
<script>
$(document).ready(function() {
	function get_state_dtl(){
		var sCountry = '<?php echo $userContactDetail[0]['country_id_fk']; ?>';
		var sState = '<?php echo $userContactDetail[0]['state_id_fk']; ?>';
		//alert('Country='+sCountry+'state='+sState);
		$.ajax({
			type: "POST",
			url: "get-user-ajex-data.php?country_id="+sCountry+"&state_id="+sState+"&getAction=stateAutoFill",
		}).done(function(data){
		  $('#state_id_fk').empty();
		   $("#state_id_fk").append(data);
		});
	}
	get_state_dtl();
	
	// function hideOtherGotra()
	// {
		// $('#otherGotra').hide();
	// }
	// hideOtherGotra();
});
//other case for religion

function checkotherreligion(idval) {
	if (idval.value == "4b5e46272c2df29c5a96350518ef70aa") {
		document.getElementById("religion_code_other_yes").style.display = "block";
	} else {
		document.getElementById("religion_code_other_yes").style.display = "none";
	}
}

function checkothercommunity(idval) {
	//alert(idval.value);	
	if (idval.value =="buddhist_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="catholic_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="chrishtain_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="islamic_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="hindu_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="jain_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="jewish_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="muslim_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="no_religion_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="parsi_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="sikh_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	}else if (idval.value =="other_other") {
		document.getElementById("community_code_other_yes").style.display = "block";
	} else {
		document.getElementById("community_code_other_yes").style.display = "none";
	}
}

function checkothermother_tongue(idval) {
	if (idval.value == "6be7d0534f51857dd87f7fef23dd308b") {
		document.getElementById("mother_tongue_code_other_yes").style.display = "block";
	} else {
		document.getElementById("mother_tongue_code_other_yes").style.display = "none";
	}
}

function checkothergotra(idval) {
	if (idval.value == "012f922d6dcc525939d180134d0ccace") {
		document.getElementById("gotra_code_other_yes").style.display = "block";
	} else {
		document.getElementById("gotra_code_other_yes").style.display = "none";
	}
}

function checkothernakshtra(idval) {
	//alert(idval.value);
	if (idval.value == 31) {
		document.getElementById("nakshtra_code_other_yes").style.display = "block";
	} else {
		document.getElementById("nakshtra_code_other_yes").style.display = "none";
	}
}

//other case for mother tongue
$("#gotra_code").change(function(){
	var selectedGotraCode = $(this).val();
	//alert(selectedGotraCode);
	if(selectedGotraCode=="012f922d6dcc525939d180134d0ccace"){
		$('#gotra_code_other').show();	
	}else{
		$('#gotra_code_other').hide();	
	}
});

$("#mycountry_code_id").change(function(){
		var selectedCountry = $(this).val();
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?country_id="+selectedCountry+"&getAction=CountryPhoneAutoFill",
        }).done(function(data){
          $('#country_phone_code_pk').empty();
		   $("#country_phone_code_pk").append(data);
        });
    });

$("#country_id_fk").change(function(){
		var selectedCountry = $(this).val();
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?country_id="+selectedCountry+"&getAction=stateAutoFill",
        }).done(function(data){
          $('#state_id_fk').empty();
		   $("#state_id_fk").append(data);
        });
    });


$("#religion_code").change(function(){
		var selectedReligion = $(this).val();
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?religion_code="+selectedReligion+"&getAction=CommunityAutoFill",
        }).done(function(data){
          $('#community_code').empty();
		   $("#community_code").append(data);
        });
    });
	
 $("#state_id_fk").change(function(){
		var selectedState= $(this).val();
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?state_id="+selectedState+"&getAction=cityAutoFill",
        }).done(function(data){
           //console.log(data);
		    $("#city_id_fk").empty();
		   $("#city_id_fk").append(data);
        });
    });   

	
$('.siblings').click(function(){
		var val = $(this).val();
		if(val == 'Y')
		{
			$('#brother').css('display','block');
			$('#sister').css('display','block');
		}
		else
		{
			$('#brother').css('display','none');
			$('#sister').css('display','none');
		}
	})
	
	$('.siblings').click(function()
	{
		var val = $(this).val();
		if(val == 'N')
		{
			$('#no_of_brothers').val(0);
			$('#no_of_sisters').val(0);
		}
		
	})
	
	$('#userProfileDetail').submit(function(){
		var brother = $('#no_of_brothers').val();
		var siblings = $('.siblings').val();
	
		var sister = $('#no_of_sisters').val();
			//alert(siblings+ ',' +brother+ ',' + sister);
		if(siblings == 'Y')
		{
			if(brother == '')
			{
				$('#span_no_of_brothers').text('required');
				return false;
			}
			if(sister == '')
			{
				$('#span_no_of_sisters').text('required');
				return false;
			}
		}
		//alert(brother+','+siblings+','+sister);
	})
	
	
</script>