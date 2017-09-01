 <style>
.tab .nav-tabs{
    border-bottom:0px;
}
.tab .nav-tabs li{

}
.tab .nav-tabs li:last-child{
    border-right:0px solid #ddd;
}
.tab .nav-tabs li:first-child a{
    border-left:1px solid #ddd;
}
.tab .nav-tabs li a {
    color: #868686;
    background:#fff;
    border-radius:0;
    font-size:16px;
    margin-right:-1px;
    padding: 5.5px 30px;
    border-top:1px solid #d3d3d3;
    border-bottom: 1px solid #d3d3d3;
}
.nav-tabs li:first-child a{
    border-radius: 5px 0 0 5px;
}
.nav-tabs li:last-child a{
    border-radius: 0 5px 5px 0;
    border-right:1px solid #d3d3d3;
}
.tab .nav-tabs li a:hover{
    background:#eee;
}
.tab .nav-tabs li a:hover:before{
    border-left: 15px solid #eee;
}
.tab .nav-tabs li.active a:after,
.tab .nav-tabs li a:after{
    content:"";
    border-left: 17px solid #900;
    border-top: 17px solid transparent;
    border-bottom: 17px solid transparent;
    position: absolute;
    top: 0px;
    right: -17px;
    z-index:1;
}
.tab .nav-tabs li a:after{
    border-left: 17px solid #d3d3d3;
}
.tab .nav-tabs li.active a:before{
    border-left: 17px solid #900;
}
.tab .nav-tabs li a:before{
    border-bottom: 15px solid rgba(0, 0, 0, 0);
    border-left: 15px solid #fff;
    border-top: 15px solid rgba(0, 0, 0, 0);
    content: "";
    position: absolute;
    right: -15px;
    top: 2px;
    z-index: 2;
}
.tab .nav-tabs li.active > a,
.tab .nav-tabs > li.active > a:focus,
.tab .nav-tabs > li.active > a:hover {
    border: none;
    color:#fff;
    background:#900;
    border-top:1px solid #d3d3d3;
    border-bottom: 1px solid #d3d3d3;
}
.tab .nav-tabs li:last-child.active a:after,
.tab .nav-tabs li:last-child a:after{
    border: none;
}
.tab .nav-tabs li:last-child a:after,
.tab .nav-tabs li:last-child a:hover:before,
.tab .nav-tabs li:last-child.active a:before,
.tab .nav-tabs li:last-child a:before{
    border-left: none;
}
.tab .tab-content{
    padding:12px;
    color:#5a5c5d;
    margin-top:2%;
    font-size: 14px;
    border: 1px solid #fff;
}
</style>
<?php 
	include('basic-profile-header.php'); 
	include_once('scpanel/web-config.php');
	include_once('scpanel/functions/common.php');
	include_once('scpanel/classes/class.DBQuery.php');
	include_once('currency_api.php');
	$db = new DBQuery();
	if (!$db->getRecordCount(0,'tbl_profiles', array('email' => $_SESSION['userDetail']['email'], 'profile_status' => 'A')))
	{
		headerRedirect('index.php');
	}
	
	$formVldParm = "text:fname:First Name~text:lname:Last name~numericPhone:contact_no:Contact Number~dropDown:country_phone_code_pk:Country Phone Code~dropDown:religion_code:Religion Name~dropDown:community_code:Community~dropDown:mother_tongue_code:Mother Tongue~dropDown:maritial_status:Marital Status~dropDown:birth_day:Day~dropDown:birth_month:Month~dropDown:birth_year:Year~dropDown:height:Height~dropDown:mycountry_code_id:Country~textarea:looking_for:Looking For~textarea:more_detail:More Detail";	
	$formVldEduParm = "dropDown:education_code:Education~dropDown:working_with:Working With~dropDown:currency:Currency~dropDown:annual_income:Annual Income";
	$formVldFmlyParm = "dropDown:father_status:Father Status~dropDown:mother_status:Mother Status";
	$formVldLocationParm = "dropDown:country_id_fk:Country~dropDown:state_id_fk:State~dropDown:city_id_fk:City~numeric:pin_code_fk:Pin Code";
?>
<section style="background-size: 100%;">
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-xs-12 col-md-10 col-md-offset-1"> 
      <!-- Nav tabs -->
      <div class="tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"  class=" <?php if(!isset($_SESSION['activeTab'])) { echo "active"; } else { echo "disabled"; } ?> "><a href="#tab1" aria-controls="home" role="tab" <?php if(!isset($_SESSION['activeTab'])) { echo "data-toggle='tab'"; }?>><i class="fa fa-info" aria-hidden="true"></i> <span>Basic Info</span></a></li>
		  
          <li role="presentation" class=" <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab2") { echo "active"; } else { echo "disabled"; } ?>"><a href="#tab2" aria-controls="messages" role="tab" <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab2") { echo "data-toggle='tab'"; }?>><i class="fa fa-graduation-cap" aria-hidden="true"></i>  <span>Education</span></a></li>
		  
          <li role="presentation"  class=" <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab3") { echo "active"; } else { echo "disabled"; } ?>"><a href="#tab3" aria-controls="settings" role="tab" <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab3") { echo "data-toggle='tab'"; }?>><i class="fa fa-users" aria-hidden="true"></i>  <span>Family Details</span></a></li>
		  
          <li role="presentation"  class="<?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab4") { echo "active"; } else { echo "disabled"; } ?>"><a href="#tab4" aria-controls="settings" role="tab" <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab4") { echo "data-toggle='tab'"; }?>><i class="fa fa-beer" aria-hidden="true"></i> <span>Life Style</span></a></li>
		  
          <li role="presentation"  class=" <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab5") { echo "active"; } else { echo "disabled"; } ?>"><a href="#tab5" aria-controls="settings" role="tab" <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab5") { echo "data-toggle='tab'"; }?>><i class="fa fa-map-marker" aria-hidden="true"></i>  <span>Location</span></a></li>
		  
		  <li role="presentation"  class=" <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab6") { echo "active"; } else { echo "disabled"; } ?>"><a href="#tab6" aria-controls="settings" role="tab" <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab6") { echo "data-toggle='tab'"; }?>><i class="fa fa-upload" aria-hidden="true"></i> <span>Upload Image</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</section>
<!--  end navbar -->
<section style="padding-top:0px;">
	<div class="container bootstrap snippets full-information">
		<div class="row">
	  		<div class="tab-content">
			<?php 
			$profileCode = $_SESSION['userDetail']['profile_code'];
			$basicDetailFilled = $db->getRecord(0, array('*'), 'tbl_profiles', array('profile_code' => $profileCode)); //print_r($basicDetailFilled);
			
			$basicProfileDetailFilled = $db->getRecord(0, array('*'), 'tbl_profile_detail', array('profile_code_fk' => $profileCode));
			
			$locationFilled = $db->getRecord(0, array('country_id_fk','state_id_fk','city_id_fk','pin_code_fk'), 'tbl_member_contact_info', array('profile_code' => $profileCode));			
			
			//$codeFilled = $db->getRecord(0, array('country_id_fk','state_id_fk','city_id_fk','pin_code_fk'), 'tbl_profiles', array('country_phone_code' => $basicDetailFilled[0]['country_phone_code']));			
			?>
			  <div role="tabpanel" class="tab-pane <?php if(!isset($_SESSION['activeTab'])) { echo "active"; } else { echo "disabled";} ?>" id="tab1">
					<div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<?php include('user-session-msg.php');?>
						<h4>Please Enter Your Basic Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; padding: 30px 30px;">
							<div class="row">
								<div class="col-sm-12">
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

										<!--<div class="form-group">
											<label>Disability</label>
											<br>
											<label class="radio-inline">
											<?php $na ='checked'; if($basicProfileDetailFilled[0]['disability'] == 'Y') $ya = 'checked'; else $na ='checked'; ?>
											  <input type="radio" name="disability" value="Y" <?=@$ya?>>Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="disability" value="N" <?=$na?> >No
											</label>
										</div>-->
										<input type="submit" value="Save & Continue" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
										<input type="hidden" name="postAction" id="postAction" value="basicDetail" />					           
									</form>	
								</div>
							</div>
						</div>
					</div>
			  </div>
			
			<?php $educationFilled = $db->getRecord(0, array('education_category','education_code','currency','working_with','annual_income'), 'tbl_education_career', array('profile_code' => $profileCode)); ?>
			  <div role="tabpanel" class="tab-pane <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab2") { echo "active"; }?>" id="tab2">
					 <div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<h4>Please Enter Your Education Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc;  padding: 30px 30px;">
							<div class="row">
								<div class="col-sm-12">
									<form role="form" method="POST" name="userEducationDetail" id="userEducationDetail" action="user-controller.php" onSubmit="return validation('userEducationDetail', '<?=$formVldEduParm?>');" style="display:inline;">
									<?php include('user-session-msg.php');?>
										<!--<div class="form-group">
										  <label for="sel1">Your Profession<span>*</span></label>
										   <?php  $educationCategoryArr = $db->getRecord(0,array('category_name'),'tbl_education_category',array('status'=>'A'),'','','category_name','ASC');
												makeDropDownFromDB('education_category', $educationCategoryArr, 'category_name', 'category_name', $educationFilled[0]['education_category'], '', "class='form-control'");
										  ?>
										   <span class="errorcls" id="span_education_cat"></span>
										</div>-->
										<div class="form-group">
										  <label for="sel1">Education <span>*</span></label>
										  <?php  $educationArr = $db->getRecord(0,array('name,education_code'),'tbl_education',array('status'=>'A'),'','','name','ASC');
												makeDropDownFromDB('education_code', $educationArr, 'education_code', 'name', $educationFilled[0]['education_code'], '', "class='form-control'");
										  ?>
										  <span class="errorcls" id="span_education_code"></span>
										</div>

										<div class="form-group">
										  <label for="sel1">Employment <span>*</span></label>
										  <?php $employmentArr = $db->getRecord(0,array('category_name', 'category_code'), 'tbl_profession_category', '', '', '','category_name', 'ASC'); ?>
										  <?= makeDropDownFromDB('working_with', $employmentArr, 'category_name', 'category_name', $educationFilled[0]['working_with'], '', "class='form-control'");?>
											 <span class="errorcls" id="span_working_with"></span>
										</div>

										<div class="form-group">
											<div class="col-sm-12 col-md-12">
												<label for="sel1">Annual Income<span>*</span></label>
											</div>
											<!--<label class="col-sm-3 control-label">Annual Income <span>*</span></label>-->
											<div class='row'>
												<div class="col-sm-6 col-md-6">
													<?php 
													$UserCountryCode = GetCountryCode();
													$where = "currency_code != ''";
													$currency = $db->getRecord(0,array('currency_code,country_code'),'tbl_countries',$where);
													$selectedCurrency = $db->getRecord(0,array('currency_code'),'tbl_countries',array('country_code' =>$UserCountryCode));
													makeDropDownFromDB('currency', $currency, 'currency_code', 'currency_code', $selectedCurrency[0]['currency_code'], $educationFilled[0]['currency'], "class='form-control'");?>
													<span class="errorcls" id="span_currency"></span>
												</div>
												<div class="col-sm-6 col-md-6">
													<?php makeDropDown('annual_income', array_keys($ARR_INCOME), array_values($ARR_INCOME), $educationFilled[0]['annual_income'], "class='form-control'"); ?>
													<span class="errorcls" id="span_annual_income"></span>
												</div>
											</div>
										</div>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<input type="submit" value="Save & Continue" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
											<input type="hidden" name="postAction" id="postAction" value="educationDetail" />
										</form>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<button type="submit" class="btn btn-danger">Skip</button>
											<input type="hidden" name="postAction" id="postAction" value="educationDetailSkip" />
										</form>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<button type="submit" class="btn btn-danger">Back</button>
											<input type="hidden" name="postAction" id="postAction" value="educationDetailBack" />
										</form>
									</form>	
								</div>
							</div>
						</div>
					</div>
			  </div>
			  
			  <?php $familyFilled = $db->getRecord(0, array('sibling_status','father_status','mother_status','no_of_brothers','no_of_sisters'), 'tbl_family_details', array('profile_code' => $profileCode)); //print_r($familyFilled); ?>
			  <?php //if($familyFilled[0]['sibling_status'] == 'Y') { $formVldFmlyParm .= "~dropDown:no_of_brothers:Brothers~dropDown:no_of_sisters:Sisters"; }?>
			  <div role="tabpanel" class="tab-pane <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab3") { echo "active"; } ?>" id="tab3">
					<div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<h4>Please Enter Your Family Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; padding: 30px 30px;">
							<div class="row">
								<div class="col-sm-12">
									<form role="form" method="POST" name="userFamilyDetail" id="userFamilyDetail" action="user-controller.php" onSubmit="return validation('userFamilyDetail', '<?=$formVldFmlyParm?>');" style="display:inline;">
									<?php include('user-session-msg.php');?>
										<div class="form-group">
										  <label for="sel1">Father<span>*</span></label>
										   <?php $employmentArr = $db->getRecord(0,array('category_name', 'category_code'), 'tbl_profession_category', '', '', '','category_name', 'ASC'); ?>
										  <?= makeFatherDropDownFromDB('father_status', $employmentArr, 'category_name', 'category_name', $familyFilled[0]['father_status'], '', "class='form-control'");?>
											 <span class="errorcls" id="span_father_status"></span>
										</div>

										<div class="form-group">
										  <label for="sel1">Mother<span>*</span></label>
											<?php $employmentArr = $db->getRecord(0,array('category_name', 'category_code'), 'tbl_profession_category', '', '', '','category_name', 'ASC'); ?>
										  <?= makeMotherDropDownFromDB('mother_status', $employmentArr, 'category_name', 'category_name', $familyFilled[0]['mother_status'], '', "class='form-control'");?>
											 <span class="errorcls" id="span_mother_status"></span>
										</div>
										<?php //echo $familyFilled[0]['sibling_status']; ?>
										<div class="form-group">
											<label>Number of Siblings?</label>
											<br>
											<label class="radio-inline">
											<?php if(($familyFilled[0]['no_of_brothers'] >0) || ($familyFilled[0]['no_of_sisters']>0)) $checked= 1; else $checked= 0; ?>
											  <input type="radio" name="sibling" class="siblings" value="Y" <?php if($familyFilled[0]['sibling_status']=='Y'){ echo'checked';} ?>>Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="sibling" class="siblings" value="N"  <?php if($familyFilled[0]['sibling_status']=='N'){ echo 'checked';} ?>>No
											</label>
										</div>
										<div class="form-group" id="brother" style="display:<?php if(($familyFilled[0]['sibling_status']=='Y') and (($familyFilled[0]['no_of_brothers'] >0) || ($familyFilled[0]['no_of_sisters']>0))){ echo "block"; }else{ echo "none";} ?>">
										  <label for="sel1">Number of Brothers</label>
										  <?= makeDropDown('no_of_brothers', array_keys($ARR_NUMBER_BROTHER), array_values($ARR_NUMBER_BROTHER), $familyFilled[0]['no_of_brothers'], "class='form-control'") ?>
											 <span class="errorcls" id="span_no_of_brothers"></span>
										</div>

										<div class="form-group" id="sister" style="display:<?php if(($familyFilled[0]['sibling_status']=='Y')and(($familyFilled[0]['no_of_brothers'] >0) || ($familyFilled[0]['no_of_sisters']>0))){ echo "block"; }else{ echo "none";} ?>">
										  <label for="sel1">Number of Sisters</label>
										 <?= makeDropDown('no_of_sisters', array_keys($ARR_NUMBER_SISTER), array_values($ARR_NUMBER_SISTER), $familyFilled[0]['no_of_sisters'], "class='form-control'") ?>
										 <span class="errorcls" id="span_no_of_sisters"></span>
										</div>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<input type="submit" value="Save & Continue" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
											<input type="hidden" value="familyDetail" name="postAction" class="btn btn-danger">
										</form>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<button type="submit" class="btn btn-danger">Skip</button>
											<input type="hidden" name="postAction" id="postAction" value="familyDetailSkip" />
										</form>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<button type="submit" class="btn btn-danger">Back</button>
											<input type="hidden" name="postAction" id="postAction" value="familyDetailBack" />
										</form>

									</form>	
								</div>
							</div>
						</div>
					</div>
			  </div>
			  
			   <?php $lifeStyleFilled = $db->getRecord(0, array('diet','drink','smoke'), 'tbl_lifestyle', array('profile_code' => $profileCode)); ?>
			  <div role="tabpanel" class="tab-pane <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab4") { echo "active"; } ?>" id="tab4">
			  		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<h4>Please Enter Your Lifestyle Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; padding: 30px 30px;">
							<div class="row">
								<div class="col-sm-12">
									<form role="form" method="POST" name="userLifeStyleDetail" id="userLifeStyleDetail" action="user-controller.php" style="display:inline">
										<?php include('user-session-msg.php');?>
										<div class="form-group">
											<label>Food Preference<span>*</span></label>
											<br>
											<?php $veg = 'checked';
													if($lifeStyleFilled[0]['diet'] == 'Non Veg')  $nveg ='checked';
													if($lifeStyleFilled[0]['diet'] == 'Vegan')  $vegan ='checked';
													if($lifeStyleFilled[0]['diet'] == 'Halal')  $hlal ='checked';
													if($lifeStyleFilled[0]['diet'] == 'Other')  $othr ='checked'; ?>
											<label class="radio-inline">
											  <input type="radio" name="diet" value="Veg" <?=$veg?>>Veg
											</label>
											<label class="radio-inline">
											  <input type="radio" name="diet" value="Non Veg" <?=@$nveg?>>Non-veg
											</label>
											<label class="radio-inline">
											  <input type="radio" name="diet" value="Vegan" <?=@$vegan?>>Vegan
											</label>
											<label class="radio-inline">
											  <input type="radio" name="diet" value="Halal" <?=@$hlal?>>Halal
											</label>
											<label class="radio-inline">
											  <input type="radio" name="diet" value="Other" <?=@$othr?>>Other
											</label>
										</div>

										<div class="form-group">
											<label>Smoking? <span>*</span></label>
											<br>
											<?php $smokeNA = 'checked';
													if($lifeStyleFilled[0]['smoke'] == 'Y')  $smokeY ='checked';
													if($lifeStyleFilled[0]['smoke'] == 'O')  $smokeO ='checked'; ?>
											<label class="radio-inline">
											  <input type="radio" name="smoke" value="Y" <?=@$smokeY?>>Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="smoke" value="N" <?=@$smokeNA?>>No
											</label>
											<label class="radio-inline">
											  <input type="radio" name="smoke" value="O" <?=@$smokeO?>>Occasionlly
											</label>
										</div>

										<div class="form-group">
											<label>Drinking? <span>*</span></label>
											<br>
											<?php $drinkNA = 'checked';
													if($lifeStyleFilled[0]['drink'] == 'Y')  $drinkY ='checked';
													if($lifeStyleFilled[0]['drink'] == 'O')  $drinkO ='checked'; ?>
											<label class="radio-inline">
											  <input type="radio" name="drink" value="Y" <?=@$drinkY?>>Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="drink" value="N" <?=@$drinkNA?>>No
											</label>
											<label class="radio-inline">
											  <input type="radio" name="drink" value="O" <?=@$drinkO?>>Occasionlly
											</label>
										</div>
										
										<!--<div class="form-group">
											<label>Hair Color? <span>*</span></label>
											<br>
											<?php foreach($ARR_HAIR_COLOR as $airKey => $airVal){ ?>
													<label class="radio-inline">
													  <input type="radio" name="hair_color" value=<?=$airKey?> <?=(strtolower($basicProfileDetailFilled[0]['hair_color']) == strtolower($airKey)?'checked':'')?>><?=$airVal?>
													</label>
											<?php } ?>
										</div> -->
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<input type="submit" value="Save & Continue" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
											<input type="hidden" value="lifestyleDetail" name="postAction" class="btn btn-danger">
										</form>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<button type="submit" class="btn btn-danger">Skip</button>
											<input type="hidden" name="postAction" id="postAction" value="lifestyleDetailSkip" />
										</form>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<button type="submit" class="btn btn-danger">Back</button>
											<input type="hidden" name="postAction" id="postAction" value="lifestyleDetailBack" />
										</form>
									</form>	
								</div>
							</div>
						</div>
					</div>
			  </div>
			  
			  <?php $locationFilled = $db->getRecord(0, array('country_id_fk','state_id_fk','city_id_fk','pin_code_fk'), 'tbl_member_contact_info', array('profile_code' => $profileCode)); //print_r($locationFilled);?>
			   <div role="tabpanel" class="tab-pane <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab5") { echo "active"; } ?>" id="tab5">
			  		 <div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<h4>Please Enter Your Location Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; padding: 30px 30px;">
							<div class="row">
								<div class="col-sm-12">
									<form role="form" method="POST" name="userLocationDetail" id="userLocationDetail" action="user-controller.php" onSubmit="return validation('userLocationDetail', '<?=$formVldLocationParm?>');" style="display:inline">
									<?php include('user-session-msg.php');?>
										<div class="form-group">
										  <label for="sel1">Country <span>*</span></label> 
										   <?php  $countryArr = $db->getRecord(0,array('country_id_pk,country_name'),'tbl_countries',array('status'=>'A'),'','','country_name','ASC');
												makeDropDownFromDB('country_id_fk', $countryArr, 'country_id_pk', 'country_name', $locationFilled[0]['country_id_fk'], '', "class='form-control'");
										  ?>
										   <span class="errorcls" id="span_country_id_fk"></span>
										</div>
										<div class="form-group">
										  <label for="sel1">State/Province <span>*</span></label>
										  <select class="form-control" id="state_id_fk" name="state_id_fk">
											<option>Please Select</option>
										  </select>
										  <span class="errorcls" id="span_state_id_fk"></span>
										</div>
										<div class="form-group">
										  <label for="sel1">City <span>*</span></label>
										  <select class="form-control" id="city_id_fk" name="city_id_fk">
											<option>Please Select</option>
										  </select>
										   <span class="errorcls" id="span_city_id_fk"></span>
										</div>
										<div class="form-group">
										  <label for="sel1">Zip/Pin/Area Code <span>*</span></label>
										  <input type="text" class="form-control" id="pin_code_fk" name="pin_code_fk" value="<?=$locationFilled[0]['pin_code_fk']?>">
											<span class="errorcls" id="span_pin_code_fk"></span>
										</div>
										<form method="POST"  action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<input type="submit" value="Save & Continue" class="btn btn-danger">
											<input type="hidden" value="locationDetail" name="postAction" class="btn btn-danger">
										</form>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<button type="submit" class="btn btn-danger">Skip</button>
											<input type="hidden" name="postAction" id="postAction" value="locationDetailSkip" />
										</form>
										<form method="POST" action="<?=USER_PATH?>user-controller.php" style="display:inline">
											<button type="submit" class="btn btn-danger">Back</button>
											<input type="hidden" name="postAction" id="postAction" value="locationDetailBack" />
										</form>
									</form>	
								</div>
							</div>
						</div>
					</div>
			  </div>
			  
			  <div role="tabpanel" class="tab-pane <?php if(isset($_SESSION['activeTab']) && $_SESSION['activeTab'] == "tab6") { echo "active"; } ?>" id="tab6">
			  	 <div class="col-xs-12 col-sm-8 col-sm-offset-2">
					<h4>Please Upload Your Profile Image</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; ">
							<div class="photo">
							
								<?php
									
								if(isset($_SESSION['image_exist']) && ($_SESSION['image_exist'] == 'Y')) { echo '<script>alert("First delete uploaded image.");</script>'; 
									unset($_SESSION['image_exist']);
								} ?>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_default_1">
										<div class="row panel-body  interest-column">
											<div class="col-sm-12 text-center">
												<?php if(isset($_SESSION['mymessageSession'])){ echo '<div style="color:#900;">'.$_SESSION['mymessageSession'].'</div>'; } ?>
												<p>Get the most responses by uploading up to your 10 photos on your profile. <a href="" style="color:#900;">Read our Photo Guidelines</a></p>
												<p>All photos are screened as per photo guidelines and gets activated within 24 to 48 hours.</p>
												<br>
											</div>
											<div class="col-sm-10 col-sm-offset-1">
												<?php //if($_SESSION['img_success']=='success'){ echo '<script>alert("Image uploaded successfully.");</script>'; } else { ?>
												<div class="photo-panel">
													<h2><i class="fa fa-cloud-upload" aria-hidden="true"></i></h2>
													<h3>Upload Photo</h3>
													<form action="user-controller.php" method='POST' enctype="multipart/form-data" style="margin-bottom: 0em;">
														<span id="fileselector">
															<label class="btn btn-default" for="upload-file-selector">
																<input type="file" id="upload-file-selector" name="image"/>
																<i class="fa fa-upload" aria-hidden="true"></i> Select Photo
															</label>
														</span>
														<span><button class="btn btn-default" type="submit" name="uploadProfilePic">Upload</button></span>
														<input type="hidden" name="postAction" id="postAction" value="addProfilePic">
														<input type="hidden" name="postEventCode" id="postEventCode" value="<?=$_SESSION['userDetail']['profile_code']?>">
														<!--<p>Max upload only 3 images.</p> -->
														<p><small>Upload more photos by going into profile settings</small></p>
													</form>
												</div>
												<?php //} ?>
												<div class="row">
													
														<?php 
														$whr = "profile_code = '".$profileCode."' AND default_image='Y'";
														$profileImageArr = $db->getRecord(0, array('image', 'image_code', 'approved'), 'tbl_profile_images', $whr);
														$count = count($profileImageArr);
														$imagePath ='';
														$imgDiv ='';
														?>
														
														<?php 
															if($count>0){
															?>
														<div class="col-sm-12 panel-body text-center">
															<h4>Uploaded Profile Photo</h4>
														</div>
														<?php		
																for($i = 0; $i < $count; $i++){ 
																$imagePath = USER_PATH.'uploads/profile_pic/'.$profileImageArr[$i]['image'];
														?>
																
																<div class="col-sm-4 upload_photo col-sm-offset-4">
																	<img src="<?=$imagePath?>" class="img-thumbnail" style="height:200px; width:200px;">
																	<div class="dropdown pull-right">
																	  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop1"><i class="fa fa-cog" aria-hidden="true"></i></button>
																	  <ul class="dropdown-menu  drop_down" id="drop">
																		 <li><form method="POST" action="<?=USER_PATH?>user-controller.php">
																			<button type="submit" onClick='return confirm("Are you sure to delete this image?");' style="border:none; background:transparent;">Delete</button>
																			<input type="hidden" name="postAction" value="dropProfilePic">
																			<input type="hidden" name="postActionCode" value="<?=$profileImageArr[$i]['image_code']?>">
																		  </form></li>
																	  </ul>
																	</div>
																</div>
														<?php
																}
															}
															else
															{
															 ?>
																<?php if($basicDetailFilled[0]['gender']=='M'){ ?>
																<div class="col-sm-12 panel-body text-center">
																	<h4>Sample Photo</h4>
																</div>
																<div class="col-sm-4 upload_photo col-sm-offset-4">
																	<img src="<?=USER_PATH?>img/default-profile.jpg" class="img-thumbnail">
																</div>
																<?php }else{ ?>
																<div class="col-sm-12 panel-body text-center">
																	<h4>Sample Photo</h4>
																</div>
																<div class="col-sm-4 upload_photo col-sm-offset-4">
																	<img src="<?=USER_PATH?>img/default-profile_lady.jpg" class="img-thumbnail">
																	<div class="dropdown pull-right">
																	  
																	  <ul class="dropdown-menu  drop_down" id="drop">											
																		<li><a href="javascript:void(0)" onClick='return archive("32");'>Move To Private</a></li>
																		<li><a href="javascript:void(0)" onClick='return msgread("32");'>Delete</a></li>
																	  </ul>
																	</div>
																</div>
																<?php } ?> 
														<?php } ?>
													
													<!--<div class="col-sm-4 upload_photo"> 
														<img src="<?=USER_PATH?>uploads/profile_pic/profile.jpg" class="img-thumbnail">
														<div class="dropdown pull-right">
														  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop1"><i class="fa fa-cog" aria-hidden="true"></i></button>
														  <ul class="dropdown-menu  drop_down" id="drop1">											
															<li><a href="javascript:void(0)" onClick='return archive("32");'>Move To Private</a></li>
															<li><a href="javascript:void(0)" onClick='return msgread("32");'>Delete</a></li>
														  </ul>
														</div>
													</div>
													<div class="col-sm-4 upload_photo">
														<img src="<?=USER_PATH?>uploads/profile_pic/profile.jpg" class="img-thumbnail">
														<div class="dropdown pull-right">
														  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop2"><i class="fa fa-cog" aria-hidden="true"></i></button>
														  <ul class="dropdown-menu  drop_down" id="drop2">											
															<li><a href="javascript:void(0)" onClick='return archive("32");'>Move To Private</a></li>
															<li><a href="javascript:void(0)" onClick='return msgread("32");'>Delete</a></li>
														  </ul>
														</div>
													</div>-->
													<div class="col-sm-12 text-left ">
													<br>
														<span class="notice"><b>Note:</b> Each photo must not be less than 440px x 440px and you should be in the photo. The uploaded, images can take up to 48 hours to be reviewed and fully visible on your profile.</span>

													</div>
												</div>
											</div>
											
											<!--<div class="col-sm-6">
												<div class="photo-panel">
													<h2><i class="fa fa-cloud-upload" aria-hidden="true"></i></h2>
													<h3>Private Photo</h3>
													<form action="user-controller.php" method='POST' enctype="multipart/form-data" style="margin-bottom: 0em;">
														<span id="fileselector">
															<label class="btn btn-default" for="upload-file-selector">
																<input type="file" id="upload-file-selector" name="image"/>
																<i class="fa fa-upload" aria-hidden="true"></i> Select Photo
															</label>
														</span>
														<span><button class="btn btn-default" type="submit" name="uploadProfilePic">Upload</button></span>
														<input type="hidden" name="postAction" id="postAction" value="addProfilePic">
														<input type="hidden" name="postEventCode" id="postEventCode" value="<?=$_SESSION['userDetail']['profile_code']?>">
														<p>Max upload only 3 images.</p>
														<p><small>Upload more photos by going into profile settings</small></p>
													</form>
												</div>
												<div class="row">
													<div class="col-sm-12 panel-body text-center">
														<h4>Private Images</h4>
													</div>
													<div class="col-sm-4 upload_photo">
														<img src="http://www.shaadichoice.com/uploads/profile_pic/profile.jpg" class="img-thumbnail">
														<div class="dropdown pull-right">
														  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop3"><i class="fa fa-cog" aria-hidden="true"></i></button>
														  <ul class="dropdown-menu  drop_down" id="drop3">											
															<li><a href="javascript:void(0)" onClick='return archive("32");'>Move To Public</a></li>
															<li><a href="javascript:void(0)" onClick='return msgread("32");'>Delete</a></li>
														  </ul>
														</div>
													</div>
													<div class="col-sm-4 upload_photo">
														<img src="http://www.shaadichoice.com/uploads/profile_pic/profile.jpg" class="img-thumbnail">
														<div class="dropdown pull-right">
														  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop4"><i class="fa fa-cog" aria-hidden="true"></i></button>
														  <ul class="dropdown-menu  drop_down" id="drop4">											
															<li><a href="javascript:void(0)" onClick='return archive("32");'>Move To Public</a></li>
															<li><a href="javascript:void(0)" onClick='return msgread("32");'>Delete</a></li>
														  </ul>
														</div>
													</div>
													<div class="col-sm-4 upload_photo">
														<img src="http://www.shaadichoice.com/uploads/profile_pic/profile.jpg" class="img-thumbnail">
														<div class="dropdown pull-right">
														  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop5"><i class="fa fa-cog" aria-hidden="true"></i></button>
														  <ul class="dropdown-menu  drop_down" id="drop5">											
															<li><a href="javascript:void(0)" onClick='return archive("32");'>Move To Public</a></li>
															<li><a href="javascript:void(0)" onClick='return msgread("32");'>Delete</a></li>
														  </ul>
														</div>
													</div>
													
													<div class="col-sm-12 text-left ">
													<br>
														<span class="notice"><b>Note:</b> Private photo can only be seen by members that you have granted access.</span>
														<br>
														<br>
													</div>
												</div>
											</div>-->
											<div class="col-sm-12 text-center ">
											<br>
												<span class="notice"><b>Note:</b> Your face MUST be clearly visible in your MAIN IMAGE. All images MUST contain you.</span>
												<br>
												<span class="notice"><b>Note:</b> Any Images that doesn’t feature yourself will be removed..</span>
												<br>
											</div>
											
											<form method="POST" action="<?=USER_PATH?>user-controller.php" style="padding-right : 5px;">
												<button type="submit" class="pull-right btn btn-danger">Complete Profile</button> 
												<input type="hidden" name="postAction" id="postAction" value="addProfileCompletedByUser" />
											</form><span style="clear:both; margin-left:10px;"></span>
											<form method="POST" action="<?=USER_PATH?>user-controller.php">
												<button type="submit" class="pull-right btn btn-danger">Back</button> 
												<input type="hidden" name="postAction" id="postAction" value="profileImageBack" />
											</form><span style="clear:both; margin-left:10px"></span>
											<form method="POST" action="<?=USER_PATH?>user-controller.php">
												<button type="submit" class="pull-right btn btn-danger">Skip</button> 
												<input type="hidden" name="postAction" id="postAction" value="profileImageSkip" />
											</form>
											
											<!--<div class="col-sm-2 text-center">
												<h3>OR</h3>
											</div>
											<div class="col-sm-5">
												<div class="photo-panel-fb">
													<h3>Add your best photos from Facebook</h3>
													<form>
														<span id="fileselector">
															<label class="btn btn-default" for="upload-file-selector">
																<input id="upload-file-selector" type="file">
																Upload Photo
															</label>
														</span>
													</form>
												</div>
											</div>-->
											
											<!--<div class="col-sm-12">
												<h4>Other ways to upload your photos</h4>
												<br>
											</div>
											<div class="col-sm-6">
												<span class="notice">E-mail your photos to <a href="#">photos@shaadichoice.com</a> <br>Mention your Profile ID and Name in the mail.</span>
											</div>
											<div class="col-sm-6">
												<span class="notice">Send your photos through post to our <a href="#">office</a> <br>Mention your Profile ID and Name at the back of the photos.</span>
											</div>
											<div class="col-sm-12">
												<hr>
											</div>
											<div class="col-sm-4">
												<span class="notice"><i class="fa fa-check" aria-hidden="true"></i> Photos you can upload</span>
												<div class="row">
													<div class="col-sm-6 panel-body">
														<img src="<?=USER_PATH?>img/photo/1.gif">
													</div>
													<div class="col-sm-6 panel-body">
														<img src="<?=USER_PATH?>img/photo/2.gif">
													</div>
												</div>
											</div>
											<div class="col-sm-8">
												<span class="notice"><i class="fa fa-times" aria-hidden="true"></i> Photos you cannot upload</span>
												<div class="row">
													<div class="col-sm-3 panel-body">
														<img src="<?=USER_PATH?>img/photo/3.gif">
													</div>
													<div class="col-sm-3 panel-body">
														<img src="<?=USER_PATH?>img/photo/4.gif">
													</div>
													<div class="col-sm-3 panel-body">
														<img src="<?=USER_PATH?>img/photo/5.gif">
													</div>
													<div class="col-sm-3 panel-body">
														<img src="<?=USER_PATH?>img/photo/6.gif">
													</div>
												</div>
											</div>-->
										</div>
									</div>
									<!--<div class="tab-pane" id="tab_default_2">
										<div class="row panel-body">
											<div class="col-sm-12">
												<h4>Choose display option</h4>
												  <form method="POST" action="<?=USER_PATH?>user-controller.php">
													<div class="radio">
													  <label><input type="radio" name="visibility" value="A">Visible to all</label>
													</div>
													<div class="radio">
													  <label><input type="radio" name="visibility" value="P">Visible only on Invitation Sent/Accepted</label>
													</div>
													<input type="submit" class="btn btn-danger" value="Save Change">
													<input type="hidden" class="btn btn-danger" value="postAction" name="postAction">
													<input type="hidden" class="btn btn-danger" value="changeProfilePicVisibility" name="postActionCode"><
													<input type="hidden" class="btn btn-danger" value="basicDetails" name="redir">
												  </form>
											</div>
										</div>
									</div>-->
								</div>
							</div>
						</div>
					</div>
			   </div>
			</div>
		</div>
	</div>
</section>


<?php 
	include('footer.php');
?>
<script type="text/javascript">
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
	
	$('#userFamilyDetail').submit(function(){
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

$('#contact_no').keypress(function(){
		var val = $(this).val();
		if(val == '')
		{
			$('#span_contact_no').text('');
		}
		else if(val.length >9)
		{
			return false;
		}
		else
		{
			if(isNaN(val))
			{
				$('#span_contact_no').text('Only digits 0-9 allowed.');
			}
			else 
			{
				/* var firstDigit = val.slice(0,1);
				if(firstDigit == 9 || firstDigit == 7 || firstDigit == 0)
				{
				  return true;
				}
				else
				{
					$('#span_contact_no').text("First digit should be 0,9,7");
				} */
			}
		}
		
	})	
</script>
