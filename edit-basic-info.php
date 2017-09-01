<?php
include('head.php');
include('currency_api.php');
$formVldParm = "text:fname:First Name~text:lname:Last name~numericPhone:contact_no:Contact Number~dropDown:country_phone_code_pk:Country Phone Code~dropDown:religion_code:Religion Name~dropDown:community_code:Community~dropDown:mother_tongue_code:Mother Tongue~dropDown:maritial_status:Marital Status~dropDown:birth_day:Day~dropDown:birth_month:Month~dropDown:birth_year:Year~dropDown:height:Height~dropDown:mycountry_code_id:Country~dropDown:created_by:Created By~textarea:looking_for:Looking For~textarea:more_detail:More Detail~numeric:weight:Weight~dropDown:eye_color:Eye Color~dropDown:skin_tone:Skin Tone~dropDown:blood_group:Blood Group~dropDown:gotra_code:Gotra~dropDown:nakshtra:Nakshtra~dropDown:rashi:Rashi";	
?>

<section style="padding-top:0px;">
	<div class="container bootstrap snippets full-information">
		<div class="row">
	  		<div class="tab-content">
			<?php 
			$profileCode = $_SESSION['userDetail']['profile_code'];
			$basicDetailFilled = $db->getRecord(0, array('*'), 'tbl_profiles', array('profile_code' => $profileCode)); //print_r($basicDetailFilled);
			
			$basicProfileDetailFilled = $db->getRecord(0, array('*'), 'tbl_profile_detail', array('profile_code_fk' => $profileCode));
			
			$locationFilled = $db->getRecord(0, array('country_id_fk','state_id_fk','city_id_fk','pin_code_fk'), 'tbl_member_contact_info', array('profile_code' => $profileCode));			
			?>
				
					<div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<?php include('user-session-msg.php');?>
						<h4>Complete Your Basic Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; padding: 30px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
									<form role="form" method="POST" name="userBasicDetail" id="userBasicDetail" action="<?=USER_PATH?>user-controller.php" onSubmit="return validation('userBasicDetail', '<?=$formVldParm?>');">
									<?php include('user-session-msg.php');?>
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
													<label>First Name <span>*</span></label>
													<input type="text" name="fname" id="fname" class="form-control input-sm" placeholder="First Name" value="<?=($basicDetailFilled[0]['fname']!=''?ucfirst($basicDetailFilled[0]['fname']):'')?>">
													<span class="errorcls" id="span_fname"></span>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
													<label>Middle Name</label>
													<input type="text" name="mname" id="mname" class="form-control input-sm" placeholder="Middle Name" value="<?=($basicDetailFilled[0]['mname']!=''?ucfirst($basicDetailFilled[0]['mname']):'')?>">
													<span class="errorcls" id="span_mname"></span>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
													<label>Last Name<span>*</span></label>
													<input type="text" name="lname" id="lname" class="form-control input-sm" placeholder="Last Name" value="<?=($basicDetailFilled[0]['lname']!=''?ucfirst($basicDetailFilled[0]['lname']):'')?>"><span class="errorcls" id="span_lname"></span>
													<span class="errorcls" id="span_lname"></span>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
												  <label for="sel1">Country <span>*</span></label> 
												   <?php  $countryArr = $db->getRecord(0,array('country_id_pk,country_name'),'tbl_countries',array('status'=>'A'),'','','country_name','ASC');
														makeDropDownCountryFromDB('country_id_fk','mycountry_code_id', $countryArr, 'country_id_pk', 'country_name', $locationFilled[0]['country_id_fk'], '', "class='form-control'");
												  ?>
												   <span class="errorcls" id="span_mycountry_code_id"></span>
												</div>
											</div>
											
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
												  <label for="sel1">Country Phone Code<span>*</span></label>
												  <select class="form-control" id="country_phone_code_pk" name="country_phone_code_pk">
													<?php if($basicDetailFilled[0]['country_phone_code']!=''){?>
													<option value="<?php echo $basicDetailFilled[0]['country_phone_code'] ?>" selected><?php echo '+'.$basicDetailFilled[0]['country_phone_code']; ?></option>
													<?php } ?>
												  </select>
												  <span class="errorcls" id="span_country_phone_code_pk"></span>
												</div>
											</div>
											
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
													<label>Phone Number <span>*</span></label>
													<input type="text" name="contact_no" id="contact_no" class="form-control input-sm" placeholder="Phone Number" value="<?=($basicDetailFilled[0]['contact_no']!=''?$basicDetailFilled[0]['contact_no']:'')?>">
													<span class="errorcls" id="span_contact_no"></span>
												</div>
											</div>
										</div>

										<div class="form-group">
										  <label for="sel1">Religion <span>*</span></label>
											 <?php 
												$relgn ='';
												if($basicDetailFilled[0]['religion_code'] == '') $relgn =''; else $relgn =$basicDetailFilled[0]['religion_code'];
												$userBasicArr = $db->getRecord(0,array('religion_code,religion_name'),'tbl_religions');
												makeDropDownFromDB('religion_code', $userBasicArr, 'religion_code', 'religion_name', $relgn, $basicDetailFilled[0]['religion_code'], "class='form-control'");
											 ?>
											<span class="errorcls" id="span_religion_code"></span>
										</div>
										
										<div class="form-group">
											<label for="sel1">Community <span>*</span></label>
												<select class="form-control" id="community_code" name="community_code">
													<?php if($basicDetailFilled[0]['community_code']!='NA'){
														$userCommunityArr = $db->getRecord(0,array('community_name'),'tbl_community', array('community_code' => $basicDetailFilled[0]['community_code']));
														?>
													<option value="<?php echo $basicDetailFilled[0]['community_code'] ?>" selected><?php echo $userCommunityArr[0]['community_name']; ?></option>
													<?php } else  { ?>
													<option value="NA" selected>No Community Found</option>
													<?php } ?>
												</select>
											<span class="errorcls" id="span_community_code"></span>
										</div>

										<div class="form-group">
										  <label for="sel1">Language <span>*</span></label>
											 <?php 
												$mtongue ='';											 
											 if($basicDetailFilled[0]['mother_tongue_code'] == '') $mtongue = ''; else $mtongue = $basicDetailFilled[0]['mother_tongue_code'];
											 $motherTongue = $db->getRecord(0,array('mother_tongue,mother_tongue_code'),'tbl_mother_tongue',array('status'=>'A'),'','','rank','ASC');
												makeDropDownFromDB('mother_tongue_code', $motherTongue, 'mother_tongue_code', 'mother_tongue', $mtongue, '', "class='form-control'");
											?>		
											<span class="errorcls" id="span_mother_tongue_code"></span>
										</div>
										
										<div class="row">
											<div class="col-sm-12">
												<label>Date Of Birth <span>*</span></label>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
												<?= 
												   $day =''; $month = ''; $year = '';
											
													if($basicProfileDetailFilled[0]['birth_date']!='')
													{	
														$birdate = explode('-',$basicProfileDetailFilled[0]['birth_date']);
														$day = $birdate[2]; $month = $birdate[1];  $year = $birdate[0];
													}
						
													makeDropDownDay('birth_day', $day, "class='form-control'") ?>
												   <span class="errorcls" id="span_birth_day"></span>
												</div> 	
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
												  <?= makeDropDownAgeMonth('birth_month', $month, "class='form-control'") ?>
												  <span class="errorcls" id="span_birth_month"></span>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
												  <?= makeDropDownYear('birth_year', $year, "class='form-control'") ?>
												  <span class="errorcls" id="span_birth_year"></span>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label for="sel1">Marital Status <span>*</span></label>
											  <?php  
											  $martlstus = '';
											  if($basicDetailFilled[0]['maritial_status'] == '') $martlstus =''; else $martlstus =$basicDetailFilled[0]['maritial_status'];
											  makeDropDown('maritial_status', array_keys($MARITAL_STATUS), array_values($MARITAL_STATUS), $martlstus, "class='form-control'");?>
											  <span class="errorcls" id="span_maritial_status"></span>
										</div>
										
										<div class="form-group">
											<label>Height <span>*</span></label>
											<div class="form-group">
											<?= makeDropDown('height', array_keys($ARR_HEIGHT), array_values($ARR_HEIGHT), $basicProfileDetailFilled[0]['height'], "class='form-control'") ?>
											 <span class="errorcls" id="span_height"></span>
											</div>
										</div>
										
										<div class="form-group">
											<label>Profile Created By<span>*</span></label>
											<div class="form-group">
											   <?php makeDropDown('created_by', array_keys($ARR_CREAT_BY), array_values($ARR_CREAT_BY), $basicDetailFilled[0]['created_by'], "class='form-control'");?>
											   <span class="errorcls" id="span_created_by"></span>
											</div>
										</div>
										
										<div class="form-group">
											<label>Body Type<span>*</span></label>
											<div class="form-group">
												<?php foreach ($ARR_BODY_TYPE AS $bodyTypeKey => $bodyTypeVal)
												{ ?>
												<label class="radio-inline"><input type="radio" name="body_type" value="<?=$bodyTypeKey?>" <?php if($basicProfileDetailFilled[0]['body_type']==trim($bodyTypeKey)) echo 'checked'; ?>><?=$bodyTypeVal?></label>
												<?php } ?>
											</div>
										 </div>
										 
										  <div class="form-group">
											<label>Body Weight<span>*</span></label>
												<div class="form-group">
												  <input type="text" name="weight" id="weight" class="form-control" value="<?=$basicProfileDetailFilled[0]['weight']?>">
												</div>
												<div class="form-group">
													<label class="radio-inline"><input type="radio" value="kg" name="measure" <?php if($basicProfileDetailFilled[0]['measure']=='kg') echo 'checked'; ?>>kg</label>
													<label class="radio-inline"><input type="radio" value="lbs" name="measure" <?php if($basicProfileDetailFilled[0]['measure']=='lbs') echo 'checked'; ?>>lbs</label>
												</div>
												<span class="errorcls" id="span_weight"></span>
										</div>
										
										 <div class="form-group">
											<label>Eye Color<span>*</span></label>
											<div class="form-group">
											 <?php 
												if($basicProfileDetailFilled[0]['eye_color']=='') $eyeColor = '';
												  else $eyeColor = $basicProfileDetailFilled[0]['eye_color'];
												 makeDropDown('eye_color', array_keys($ARR_EYE_COLOR), array_values($ARR_EYE_COLOR), $eyeColor, "class='form-control'");  ?>
												 <span class="errorcls" id="span_eye_color"></span>
											</div>
										 </div>
										 
										 <div class="form-group">
											<label>Complexion<span>*</span></label>
											<div class="form-group">
												<?= makeDropDown('skin_tone', array_keys($ARR_SKIN_TONE), array_values($ARR_SKIN_TONE), $basicProfileDetailFilled[0]['skin_tone'], "class='form-control'");  ?>
												 <span class="errorcls" id="span_skin_tone"></span>
											</div>	
										</div>
										
										 <div class="form-group">
											<label>Blood Group<span>*</span></label>
											<div class="form-group">
											<?php 
											   if($basicProfileDetailFilled[0]['blood_group']=='') $blood = '';
											  else $blood = $ARR_BLOOD_GROUP[$basicProfileDetailFilled[0]['blood_group']];
											  makeDropDown('blood_group', array_keys($ARR_BLOOD_GROUP), array_values($ARR_BLOOD_GROUP), $blood, "class='form-control'");  ?>
											   <span class="errorcls" id="span_blood_group"></span>
											</div>
										 </div>
										
										<div class="form-group">
										 <label>Gender <span>*</span></label>
											<div class="form-group">
												<label class="radio-inline"><input type="radio" name="gender" value="M" <?php if($basicDetailFilled[0]['gender']=='M') echo 'checked';?> onclick="return false;">Male</label>
												<label class="radio-inline"><input type="radio" name="gender" value="F" <?php if($basicDetailFilled[0]['gender']=='F') echo 'checked';?> onclick="return false;">Female</label>
											</div>
										 </div>
										 
										  <div class="form-group">
											<label>Gothra/Gothram<span>*</span></label>
											<div class="form-group">
											  <?php $gotra = $db->getRecord(0,array('gotra_name,gotra_code'),'tbl_gotra',array('status'=>'A'),'','','gotra_name','ASC');
											  makeDropDownFromDB('gotra_code', $gotra, 'gotra_code', 'gotra_name', $basicProfileDetailFilled[0]['gotra_code'], '', "class='form-control'");?>
											   <span class="errorcls" id="span_gotra_code"></span>
											</div>
										 </div>
										 <div class="form-group">
											<label>Astro Influence (Nakshtra)<span>*</span></label>
											<div class="form-group">
											  <?php $nakshtra = $db->getRecord(0,array('tbl_nakshtra_id,name'),'tbl_nakshtra',array('status'=>'A'),'','','name','ASC');
													makeDropDownFromDB('nakshtra', $nakshtra, 'name', 'name', $basicProfileDetailFilled[0]['nakshtra'], '', "class='form-control'");?>
											  <span class="errorcls" id="span_nakshtra"></span>
											</div>
										</div>
										  <div class="form-group">
											<label>Horoscope (Rashi)<span>*</span></label>
											<div class="form-group">
											 <?php $rashi = $db->getRecord(0,array('tbl_horscope_id,name'),'tbl_horscope',array('status'=>'A'),'','','name','ASC');
													makeDropDownFromDB('rashi', $rashi, 'name', 'name', $basicProfileDetailFilled[0]['rashi'], '', "class='form-control'");?>
											  <span class="errorcls" id="span_rashi"></span>
											</div>
										</div>
										
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-12">
												<div class="form-group">
													<label>About Me: <span>*</span></label>
													<textarea name="more_detail" id="more_detail" class="form-control" style="height:100px; resize:vertical" maxlength="500" placeholder="About Me"><?=($basicProfileDetailFilled[0]['more_detail']!=''?(ucfirst($basicProfileDetailFilled[0]['more_detail'])):'')?></textarea>
													<span class="errorcls" id="span_more_detail"></span>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-12">
												<div class="form-group">
													<label>What I Am Looking For: <span>*</span></label>
													<textarea name="looking_for" id="looking_for" class="form-control" style="height:100px; resize:vertical" maxlength="500" placeholder="What You are looking for"><?=($basicProfileDetailFilled[0]['looking_for']!=''?(ucfirst($basicProfileDetailFilled[0]['looking_for'])):'')?></textarea>
													<span class="errorcls" id="span_looking_for"></span>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>Manglik</label>
											<br>
											<?php $nmglk ='checked'; if($basicProfileDetailFilled[0]['manglik'] == 1) $mglk = 'checked'; else if($basicProfileDetailFilled[0]['manglik'] == 2) $dnmglk ='checked'; ?>
											<label class="radio-inline">
											  <input type="radio" name="manglik" value="1" <?=@$mglk?>>Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="manglik"  value="0" <?=$nmglk?> >No
											</label>
											<label class="radio-inline">
											  <input type="radio" name="manglik"  value="2" <?=@$dnmglk?> >Don't Know
											</label>
										</div>

										<input type="submit" value="Save" class="btn btn-danger">
										<input type="hidden" name="postAction" id="postAction" value="editBasicDetail" />
										<input type="hidden" name="postActionCode" id="postActionCode" value="<?=$profileCode?>" />
										<a href="<?=USER_PATH?>dashboard.php" class="btn btn-danger">Back</a>
									</form>	
								</div>
							</div>
						</div>
					</div>
			
			  
			</div>
		</div>
	</div>
</div>
<?php include_once('footer.php'); ?>


<script type="text/javascript">
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
	
	
	function get_country_phone_dtl(){
		var selectedCountry = '<?php echo $locationFilled[0]['country_id_fk']; ?>';
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?db_country_id="+selectedCountry+"&country_id="+selectedCountry+"&getAction=CountryPhoneAutoFill",
        }).done(function(data){
			//alert(data);
          $('#country_phone_code_pk').empty();
		   $("#country_phone_code_pk").append(data);
        });
    }
	get_country_phone_dtl();
	
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
	
	function get_state_dtl(){
		var sCountry = '<?php echo $locationFilled[0]['country_id_fk']; ?>';
		var sState = '<?php echo $locationFilled[0]['state_id_fk']; ?>';
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?country_id="+sCountry+"&state_id="+sState+"&getAction=stateAutoFill",
        }).done(function(data){
          $('#state_id_fk').empty();
		   $("#state_id_fk").append(data);
        });
    }
	get_state_dtl();
	
	$("#state_id_fk").change(function(){
		var selectedState= $(this).val();
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?state_id="+selectedState+"&getAction=cityAutoFill",
        }).done(function(data){
           //alert(data);
		    $("#city_id_fk").empty();
		   $("#city_id_fk").append(data);
        });
    });
	
	function get_city_dtl(){
		var sState = '<?php echo $locationFilled[0]['state_id_fk']; ?>';
		var sCity = '<?php echo $locationFilled[0]['city_id_fk']; ?>';
		$.ajax({
            type: "POST",
            url: "get-user-ajex-data.php?state_id="+sState+"&city_id="+sCity+"&getAction=cityAutoFill",
        }).done(function(data){
			//alert(data);
          $('#city_id_fk').empty();
		   $("#city_id_fk").append(data);
        });
    }
	get_city_dtl(); 

</script>