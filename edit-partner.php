<?php 
	include('head.php');
	include('currency_api.php');
	$partnerInfoArr = $db->getRecord(0,array('*'),'tbl_partner_preference',array('profile_code_fk'=>$_SESSION['userDetail']['profile_code']));
	$religionCode = $db->getRecord(0,array('religion_code'),'tbl_religions',array('religion_name'=>$partnerInfoArr[0]['religion']));
?> 
<link href="css/jquery.css" rel="stylesheet" type="text/css" />
<!--  end navbar -->
<section>
	
	<div class="container bootstrap snippets edit-profile">
		<div class="row">
	  	 <div class="col-sm-3 panel-body">
				<?php include_once('manage_profile_left.php');?>
			</div>

		  <div class="col-xs-12 col-sm-9 profile-list profile_listing">
		   <?php  
				include_once('user-session-msg.php');
			?>
			<form class="form-horizontal" action="user-controller.php" method="POST">
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Basic Info </h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-3 control-label">Age :</label>
					<div class="col-sm-3">
					<?php
					if($partnerInfoArr[0]['age_from']!='') $ageFrom = $partnerInfoArr[0]['age_from']; else  $ageFrom='';
					makeDropDown('age_from', array_keys($ARR_AGE), array_values($ARR_AGE), $ageFrom, "class='form-control'"); ?>
					</div>
					<div class="col-sm-1 text-center">
						to
					</div>
					<div class="col-sm-3">
					  <?php 
					  if($partnerInfoArr[0]['age_to']!='') $ageTo = $partnerInfoArr[0]['age_to']; else  $ageTo='';
					  makeDropDown('age_to', array_keys($ARR_AGE), array_values($ARR_AGE), $ageTo, "class='form-control'"); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Height :</label>
					<div class="col-sm-3">
					  <?php 
					  if($partnerInfoArr[0]['height_from']!=0) $heightFrom = $partnerInfoArr[0]['height_from']; else  $heightFrom='';
					  makeDropDown('height_from', array_keys($ARR_HEIGHT), array_values($ARR_HEIGHT), $heightFrom, "class='form-control'"); ?>
					</div>
					<div class="col-sm-1 text-center">
						to
					</div>
					<div class="col-sm-3">
					  <?php 
					  if($partnerInfoArr[0]['height_to']!=0) $heightTo = $partnerInfoArr[0]['height_to']; else  $heightTo='';
					  makeDropDown('height_to', array_keys($ARR_HEIGHT), array_values($ARR_HEIGHT), $heightTo, "class='form-control'"); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Marital Status :</label>
					<div class="col-sm-7">
					   <?php 
					   if($partnerInfoArr[0]['martial_status']!='') $maritalStatus = $partnerInfoArr[0]['martial_status']; else  $maritalStatus='';
					   makeDropDown('martial_status', array_keys($MARITAL_STATUS), array_values($MARITAL_STATUS), $maritalStatus, "class='form-control'"); ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Religion :</label>
					<div class="col-sm-7">
					  <?php 
					   if($partnerInfoArr[0]['religion']!='') $religion = $partnerInfoArr[0]['religion']; else  $religion='';
					  $Religions = $db->getRecord($trace = 0,array('religion_name,religion_code'),'tbl_religions',array('status'=>'A'),'','','rank','ASC');
						makeDropDownFromDB('religion', $Religions, 'religion_code', 'religion_name', $religion, '', "class='form-control'");?>
					</div>
				  </div>	
				  		  
				  <div class="form-group">
					<label class="col-sm-3 control-label">Community :</label>
					<div class="col-sm-7">
						<select class="form-control" id="community" name="community">
							<?php if($partnerInfoArr[0]['community']!='NA'){
								$userCommunityArr = $db->getRecord(0,array('community_name'),'tbl_community', array('community_code' => $partnerInfoArr[0]['community']));
								?>
							<option value="<?php echo $partnerInfoArr[0]['community'] ?>" selected><?php echo $userCommunityArr[0]['community_name']; ?></option>
							<?php } else  { ?>
							<option value="NA" selected>Community not available </option>
							<?php } ?>
						</select>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="col-sm-3 control-label">Mother Tongue :</label>
					<div class="col-sm-7">
					  <?php 
					  if($partnerInfoArr[0]['mother_tongue_code']!='') $motherTongue1 = $partnerInfoArr[0]['mother_tongue_code']; else  $motherTongue1='';
						$motherTongue = $db->getRecord($trace = 0,array('mother_tongue,mother_tongue_code'),'tbl_mother_tongue',array('status'=>'A'),'','','rank','ASC');
						makeDropDownFromDB('mother_tongue_code', $motherTongue, 'mother_tongue_code', 'mother_tongue', $motherTongue1, '', "class='form-control'");?>
					</div>
				  </div>
				  
				  
				  
				  <!--<div class="form-group">
					<label class="col-sm-3 control-label">Body Type :</label>
					<div class="col-sm-8"> 
					<?php foreach ($ARR_BODY_TYPE AS $bodyTypeKey => $bodyTypeVal)
					{ ?>
					<label class="radio-inline"><input type="radio" name="body_type" value="<?=$bodyTypeKey?>" <?php if($partnerInfoArr[0]['body_type']==trim($bodyTypeKey)) echo 'checked'; ?>><?=$bodyTypeVal?></label>
					<?php } ?>
					</div>
				  </div>-->
				   <?php 
					 if(!empty($partnerInfoArr[0]))
					 {
						if(array_key_exists('body_type',$partnerInfoArr[0]))
						 $bodyArr = explode(',', $partnerInfoArr[0]['body_type']);
					 }
					?>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Body Type :</label>
					<div class="col-sm-7">
						<?php foreach ($ARR_BODY_TYPE AS $bodyTypeKey => $bodyTypeVal)
						{ ?>
						<label class="radio-inline"><input type="checkbox" name="body_type[]" value="<?=$bodyTypeKey?>" <?=(!empty($bodyArr)?(in_array($bodyTypeKey,@$bodyArr)?'checked':''):'')?>><?=$bodyTypeVal?></label>
						<?php } ?>
					</div>
				  </div>
				  
				  
					<!--<div class="form-group">
						<label class="col-sm-3 control-label">Complexion :</label>
						<div class="col-sm-7">
						<?= makeDropDown('skin_tone', array_keys($ARR_SKIN_TONE), array_values($ARR_SKIN_TONE), $partnerInfoArr[0]['skin_tone'], "class='form-control'");  ?>
						</div>	
					</div>-->
					 <?php 
					 if(!empty($partnerInfoArr[0]))
					 {
						if(array_key_exists('skin_tone',$partnerInfoArr[0]))
						 $complexionArr = explode(',', $partnerInfoArr[0]['skin_tone']);
					 }
					?>
					
					<div class="form-group">
					<label class="col-sm-3 control-label">Complexion:</label>
					<div class="col-sm-7">
						<?php foreach ($ARR_SKIN_TONE AS $complexionKey => $complexionVal)
						{ ?>
						<label class="radio-inline">
						<input type="checkbox" name="skin_tone[]" value="<?=$complexionKey?>" <?=(!empty($complexionArr)?(in_array($complexionKey,@$complexionArr)?'checked':''):'')?>><?=$complexionVal?>
						</label>
						<?php } ?>
						
					</div>
				  </div>
					
					
				  <div class="form-group">
					<label class="col-sm-3 control-label">Manglik :</label>
					<div class="col-sm-7">
						<label class="radio-inline"><input type="radio" name="manglik" value="0" <?php if($partnerInfoArr[0]['manglik']=='1') echo 'checked'; ?>>Yes</label>
						<label class="radio-inline"><input type="radio" name="manglik" value="1" <?php if($partnerInfoArr[0]['manglik']=='0') echo 'checked'; ?>>No</label>
					  	<label class="radio-inline"><input type="radio" name="manglik" value="2" <?php if($partnerInfoArr[0]['manglik']=='2') echo 'checked'; ?>>Doesn't Matter</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Profile Created By :</label>
					<div class="col-sm-7">
					   <?php makeDropDown('profile_created_by', array_keys($ARR_CREAT_BY), array_values($ARR_CREAT_BY), $partnerInfoArr[0]['profile_created_by'], "class='form-control'");  ?>
					</div>
				  </div>
				  
				  
				 <!-- <div class="form-group">
					<label class="col-sm-3 control-label">Eye Color:</label>
					<div class="col-sm-7">
					 <?php 
						if($partnerInfoArr[0]['eye_color']=='') $eyeColor = '';
						  else $eyeColor = $partnerInfoArr[0]['eye_color'];
						 makeDropDown('eye_color', array_keys($ARR_EYE_COLOR), array_values($ARR_EYE_COLOR), $eyeColor, "class='form-control'");  ?>
					</div>
				 </div>-->
				 
				 
				 <?php 
					 if(!empty($partnerInfoArr[0]))
					 {
						if(array_key_exists('eye_color',$partnerInfoArr[0]))
						 $eyeColor = explode(',', $partnerInfoArr[0]['eye_color']);
					 }
				?>
				 
				<div class="form-group">
					<label class="col-sm-3 control-label">Eye Color:</label>
					<div class="col-sm-7">
						<?php foreach ($ARR_EYE_COLOR AS $eyeColorKey => $eyeColorVal)
						{ ?>
						<label class="radio-inline">
						<input type="checkbox" name="eye_color[]" value="<?=$eyeColorKey?>" <?=(!empty($eyeColor)?(in_array($eyeColorKey,@$eyeColor)?'checked':''):'')?>><?=$eyeColorVal?>
						</label>
						<?php } ?>
					</div>
				  </div>
				</div>
			  </div>
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Education & Career</h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-3 control-label">Education :</label>
					<div class="col-sm-7">
					  <?php 
					  if($partnerInfoArr[0]['education']!='') $edu = $partnerInfoArr[0]['education']; else  $edu='';
					  $Education = $db->getRecord($trace = 0,array('name,education_code'),'tbl_education',array('status'=>'A'),'','','name','ASC');
					  makeDropDownFromDB('education', $Education, 'education_code', 'name', $edu, '', "class='form-control'");?>
					  </select>
					</div>
				  </div>
				  <!--<div class="form-group">
					<label class="col-sm-3 control-label">College  :</label>
					<div class="col-sm-7">
					  <input type="text" class="form-control" value="">
					</div>
				  </div>-->
				  <div class="form-group">
					<label class="col-sm-3 control-label">Employment :</label>
					<div class="col-sm-7">
					  <?php $employmentArr = $db->getRecord(0,array('category_name', 'category_code'), 'tbl_profession_category', '', '', '','category_name', 'ASC'); ?>
					<?= makeDropDownFromDB('working_with', $employmentArr, 'category_name', 'category_name', $partnerInfoArr[0]['working_with'], '', "class='form-control'");?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Annual Income :</label>
					<div class="col-sm-5">
						<?php makeDropDown('annual_income', array_keys($ARR_INCOME), array_values($ARR_INCOME), $partnerInfoArr[0]['annual_income'], "class='form-control'"); ?>
					</div>
					<div class="col-sm-2">
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
					<div class="col-sm-7">
					   <?php 
					   if($partnerInfoArr[0]['country_living']!='') $countryCode = $partnerInfoArr[0]['country_living']; else  $countryCode='';
					   $country = $db->getRecord(0,array('country_name,country_id_pk'),'tbl_countries',array('status'=>'A'),'','','country_name','ASC');
						makeDropDownFromDB('country_living', $country, 'country_id_pk', 'country_name', $countryCode, '', "class='form-control'");?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">State  :</label>
					<div class="col-sm-7">
					  <?php $state = $db->getRecord(0,array('tbl_states.state_name,tbl_states.state_id_pk from tbl_states JOIN tbl_partner_preference ON tbl_partner_preference.state_living = tbl_states.state_id_pk'),'',array('tbl_states.status'=>'A', 'tbl_partner_preference.profile_code_fk' => $_SESSION['userDetail']['profile_code']),'','','state_name','ASC'); 
						 $count = count($state);
						 if($count > 0){
						?>
						  <select name="state_living" id="state_id_fk" class="form-control"><option value="<?=$state[0]['state_id_pk']?>" selected><?=$state[0]['state_name']?></option></select>
						 <?php } else { ?>
						 <select name="state_living" id="state_id_fk" class="form-control"><option value="">Please Select</option></select>
						 <?php } ?>	
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">City  :</label>
					<div class="col-sm-7">
					   <?php $city = $db->getRecord(0,array('tbl_cities.city_name,tbl_cities.city_id_pk from tbl_cities JOIN tbl_partner_preference ON tbl_partner_preference.city_district = tbl_cities.city_id_pk'),'',array('tbl_cities.status'=>'A', 'tbl_partner_preference.profile_code_fk' => $_SESSION['userDetail']['profile_code']),'','','city_name','ASC'); 
						 $count = count($city);
						 if($count > 0){
						?>
						  <select name="city_district" id="city_id_fk" class="form-control"><option value="<?=$city[0]['city_id_pk']?>" selected><?=$city[0]['city_name']?></option></select>
						 <?php } else { ?>
						 <select name="city_district" id="city_id_fk" class="form-control"><option value="">Please Select</option></select>
						 <?php } ?>	
					</div> 	
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Zip/Pin/Area Code  :</label>
					<div class="col-sm-7">
						 <input type="text" name="pin_code" id="pin_code" value="<?=$partnerInfoArr[0]['pin_code']?>" class="form-control">
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
					  	<label class="radio-inline"><input type="radio" name="diet" value="Veg"  <?php if($partnerInfoArr[0]['diet']=='Veg') echo 'checked'; ?>>Veg</label>
						<label class="radio-inline"><input type="radio" name="diet" value="Non-Veg" <?php if($partnerInfoArr[0]['diet']=='Non-Veg') echo 'checked'; ?>>Non-Veg</label>
						<label class="radio-inline"><input type="radio" name="diet" value="Vegan" <?php if($partnerInfoArr[0]['diet']=='Vegan') echo 'checked'; ?>>Vegan</label>
						<label class="radio-inline"><input type="radio" name="diet" value="Halal" <?php if($partnerInfoArr[0]['diet']=='Halal') echo 'checked'; ?>>Halal</label>
						<label class="radio-inline"><input type="radio" name="diet" value="Other" <?php if($partnerInfoArr[0]['diet']=='Other') echo 'checked'; ?>>Other</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Drink :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" name="drink" value="Y" <?php if($partnerInfoArr[0]['drink']=="Y") echo 'checked'; ?>>Yes</label>
						<label class="radio-inline"><input type="radio" name="drink" value="N" <?php if($partnerInfoArr[0]['drink']=="N") echo 'checked'; ?>>No</label>
						<label class="radio-inline"><input type="radio" name="drink" value="O" <?php if($partnerInfoArr[0]['drink']=="O") echo 'checked'; ?>>Occasionally</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Smoke :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" name="smoke" value="Y" <?php if($partnerInfoArr[0]['smoke']=="Y") echo 'checked'; ?>>Yes</label>
						<label class="radio-inline"><input type="radio" name="smoke" value="N" <?php if($partnerInfoArr[0]['smoke']=="N") echo 'checked'; ?>>No</label>
						<label class="radio-inline"><input type="radio" name="smoke" value="O" <?php if($partnerInfoArr[0]['smoke']=="O") echo 'checked'; ?>>Occasionally</label>
					</div>
				  </div>
				 <!--<div class="form-group">
					<label class="col-sm-3 control-label">Disability :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" name="disability" value="N" <?php if($partnerInfoArr[0]['disability']=="N") echo 'checked'; ?>>Doesn't Matter</label>
						<label class="radio-inline"><input type="radio" name="disability" value="DN" <?php if($partnerInfoArr[0]['disability']=="DN") echo 'checked'; ?>>Don't include Profiles with disability</label>
					</div>
				  </div>-->
				  <hr>
				  <div class="form-group">
					<div class="col-sm-10">
					  <button type="submit" class="btn btn-danger">Save Changes</button>
					  <input type="hidden" name="postAction" id="postAction" value="editPartnerProfile" >
					  <a href="<?=USER_PATH?>self-profile.php"> <input type="button" class="btn btn-danger" value="BACK" ></button>
					</div>
				  </div>
				</div>
			  </div>
			</form>

		  </div>
		</div>
	</div>
</section>


<div class="chat_box">
	<div class="chat_header">
    	Online <i class="fa fa-minus-circle pull-right" aria-hidden="true"></i>
    </div>
    <div class="tab-content">
		<div id="menu" class="tab-pane fade in active">
			<div class="chat_body">
				<div class="user">
					<a href="#" id="btnPopover1" data-content="<img src='img/partner/1.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Anjali Singh</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Anjali Singh<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover2" data-content="<img src='img/partner/2.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Aditi Sharma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Aditi Sharma<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover3" data-content="<img src='img/partner/3.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Harshita Varma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Harshita Varma<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover4" data-content="<img src='img/partner/4.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Priya Kashyap</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Priya Kashyap<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover5" data-content="<img src='img/partner/5.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Khushi Jain</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Khushi Jain<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover6" data-content="<img src='img/partner/6.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Deepika Patel</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Deepika Patel<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover7" data-content="<img src='img/partner/7.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Bhumika Rawat</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Bhumika Rawat<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover8" data-content="<img src='img/partner/8.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Apurva Arora</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Apurva Arora<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
			</div>
		</div>
   		<!--<div id="menu1" class="tab-pane fade in">
			<div class="chat_body">
				<div class="user">
					<a href="#" id="btnPopover1" data-content="<img src='img/partner/1.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Anjali Singh</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Anjali Singh<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover2" data-content="<img src='img/partner/2.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Aditi Sharma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Aditi Sharma<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover3" data-content="<img src='img/partner/3.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Harshita Varma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Harshita Varma<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover4" data-content="<img src='img/partner/4.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Priya Kashyap</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Priya Kashyap<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover5" data-content="<img src='img/partner/5.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Khushi Jain</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Khushi Jain<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover6" data-content="<img src='img/partner/6.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Deepika Patel</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Deepika Patel<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover7" data-content="<img src='img/partner/7.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Bhumika Rawat</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Bhumika Rawat<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
				<div class="user">
					<a href="#" id="btnPopover8" data-content="<img src='img/partner/8.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Apurva Arora</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">Apurva Arora<span class="pull-right"><i class="fa fa-comment" aria-hidden="true"></i></span></a>
				</div>
			</div>
		</div>-->
   		<div id="menu2" class="tab-pane fade in">
			<div class="chat_body">
				<div class="user1">
					<a href="#" id="btnPopover_1" data-content="<img src='img/partner/1.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Anjali Singh</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/1.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Anjali Singh</b>  has sent you an Invitation to Connect <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small">Accept</button> <button type="button" class="btn btn-danger btn-small">Cancel</button></div>
						</div>
					</a>
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_2" data-content="<img src='img/partner/2.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Aditi Sharma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/2.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"><b> Aditi Sharma</b> has sent you an Invitation to Conne <br><i>13 May</i> <button type="button" class="btn btn-danger btn-small">Accept</button> <button type="button" class="btn btn-danger btn-small">Cancel</button></div>
						</div>
				  </a>
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_3" data-content="<img src='img/partner/3.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Harshita Varma</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/3.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Harshita Varma </b> has sent you an Invitation to Connect <br><i>14 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div>
					</a>	
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_4" data-content="<img src='img/partner/4.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Priya Kashyap</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/4.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Priya Kashyap</b> has sent you an Invitation to Connect <br><i>17 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div>
					</a>	
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_5" data-content="<img src='img/partner/5.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Khushi Jain</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/5.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Khushi Jain</b> has sent you an Invitation to Connect <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div>
					</a>
				</div>
				<div class="user1">
					<a href="#" id="btnPopover_6" data-content="<img src='img/partner/6.jpg' class='img-thumbnail pull-left' style='height:70px;width:70px; margin-right:15px;'> <h5>Deepika Patel</h5> <h6>34, Mumbai, Maharashtra, India</h6>" data-html="true" data-placement="left" data-trigger="hover" data-toggle="popover">
						<div class="row">
							<div class="col-sm-2"><img src="img/partner/6.jpg" width="30" height="30" class="img-circle"></div>
							<div class="col-sm-10"> <b>Deepika Patel</b> has sent you an Invitation to Connec <br><i>12 May</i> <button type="button" class="btn btn-danger btn-small"><i class="fa fa-check" aria-hidden="true"></i> Accepted</button></div>
						</div> 
					</a>
				</div>
			</div>
		</div>
    </div>
    <ul class="nav nav-tabs chat">
		<li class="active">
			<a data-toggle="tab" class="col-sm-12" href="#menu">Online (20)</a>
		</li>
		<!--<li><a data-toggle="tab" href="#menu1"><i class="fa fa-comment" aria-hidden="true"></i> Chat</a></li>-->
	    <li>
			<a data-toggle="tab" class="col-sm-12" href="#menu2"><i class="fa fa-bell-o" aria-hidden="true"></i> Alerts </a>
	   </li>
	</ul>
</div>


<div class="msg_box" style="right:260px;">
	<div class="msg_head">
    	Arpit Shukla <div class="pull-right close1">x</div>
    </div>
    <div class="msg_wrap">
        <div class="msg_body">
            <div class="msg_a">Hi</div>
            <div class="msg_b">Hello</div>
            <div class="msg_insert"></div>
        </div>
        <div class="msg_footer">
            <form>
                <textarea style=" resize: none;" class="form-control" rows="1"></textarea>
            </form>
        </div>
    </div>
</div>


<?php 
	include('footer.php');
?> 





<script src="js/jquery.js"></script>
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
	$( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 300 ],
			slide: function( event, ui ) {
				$( "#km" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] + " km"  );
			}
		});
		$( "#km" ).val($( "#slider-range" ).slider( "values", 0 ) +
			"-" + $( "#slider-range" ).slider( "values", 1 )+ " km " );
	} );
</script>

<script>
	$( function() {
		$( "#slider-range1" ).slider({
			range: true,
			min: 20,
			max: 60,
			values: [ 20, 60 ],
			slide: function( event, ui ) {
				$( "#age" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ]);
			}
		});
		$( "#age" ).val($( "#slider-range1" ).slider( "values", 0 ) +
			" - " + $( "#slider-range1" ).slider( "values", 1 ) );
	} );
</script>

<script>
	$( function() {
		$( "#slider-range2" ).slider({
			range: true,
			min: 0,
			max: 200,
			values: [ 0, 200 ],
			slide: function( event, ui ) {
				$( "#height" ).val(ui.values[ 0 ] + " cm " + " - " + ui.values[ 1 ] + " cm"  );
			}
		});
		$( "#height" ).val($( "#slider-range2" ).slider( "values", 0 ) + " cm " +
			" - " + $( "#slider-range2" ).slider( "values", 1 )+ " cm " );
	} );
</script>


<script>
	$(document).ready(function(e) {
        $('.chat_header').click(function(e) {
         $('.chat_body').slideToggle(500);
			$('.chat').slideToggle(500);	
		 $(this).find('i').toggleClass('fa-plus-circle fa-minus-circle')
        });
    });
	
	$(document).ready(function(e) {
        $('.msg_head').click(function(e) {
            $('.msg_wrap').slideToggle(500);
			
        });
    });
	
	
	$(document).ready(function(e) {
        $('.close1').click(function(e) {
            $('.msg_box').hide(500);
        });
    });
	$(document).ready(function(e) {
        $('.user').click(function(e) {
			$('.msg_wrap').show();
            $('.msg_box').show();
        });
    });


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
	$('#btnPopover1').popover();
	$('#btnPopover2').popover();
	$('#btnPopover3').popover();
	$('#btnPopover4').popover();
	$('#btnPopover5').popover();
	$('#btnPopover6').popover();
	$('#btnPopover7').popover();
	$('#btnPopover8').popover();
	
	$('#btnPopover_1').popover();
	$('#btnPopover_2').popover();
	$('#btnPopover_3').popover();
	$('#btnPopover_4').popover();
	$('#btnPopover_5').popover();
	$('#btnPopover_6').popover();
	$('#btnPopover_7').popover();
	$('#btnPopover_8').popover();
});

$("#religion").change(function(){
		var selectedReligion = $(this).val();
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?religion_code="+selectedReligion+"&getAction=CommunityAutoFill",
        }).done(function(data){
          $('#community').empty();
		   $("#community").append(data);
        });
    });

$("#country_living").change(function(){
		var selectedCountry = $(this).val();
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?country_id="+selectedCountry+"&getAction=stateAutoFill",
        }).done(function(data){
          $('#state_id_fk').empty();
		   $("#state_id_fk").append(data);
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
</script>