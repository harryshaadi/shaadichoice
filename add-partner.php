<?php 
	include('header.php');
	$partnerInfoArr = $db->getRecord($trace = 0,array('*'),'tbl_partner_preference',array('profile_code_fk'=>$_SESSION['userDetail']['profile_code']));
	$religionCode = $db->getRecord($trace = 0,array('religion_code'),'tbl_religions',array('religion_name'=>$partnerInfoArr[0]['religion']));
	$formVldParm = "dropDown:age_from:Age From~dropDown:age_to:Age to~dropDown:height_from:Height From~dropDown:height_to:Height To~dropDown:martial_status:Martial Status~dropDown:religion:Religion~dropDown:mother_tongue_code:Mother Tongue Code~dropDown:community:Community~dropDown:education:Education~dropDown:working_with:Working With~dropDown:annual_income:Annual Income~dropDown:country_living:Country Living~dropDown:state_living:State Living~dropDown:city_district:City District~dropDown:state_living:State Living~dropDown:country_grew_upin:Country Grew pin";	
?> 
<!--  end navbar -->
<section>
	
	<div class="container bootstrap snippets edit-profile">
		<div class="row">
		  <div class="col-xs-12 col-sm-8 col-sm-offset-2">
		  <?php  
				include_once('user-session-msg.php');
			?> 
			<form class="form-horizontal" action="user-controller.php" method="POST">
		  		<h4>Add Partner Preferences </h4>
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Basic Info </h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					<label class="col-sm-3 control-label">Age :</label>
					<div class="col-sm-3">
					<?php
					
					makeDropDown('age_from', array_keys($ARR_AGE), array_values($ARR_AGE), '', "class='form-control'"); ?>
					<span class="errorcls" id="span_age_from"></span>
					</div>
					<div class="col-sm-1 text-center">
						to
					</div>
					<div class="col-sm-3">
					  <?php 
					 
					  makeDropDown('age_to', array_keys($ARR_AGE), array_values($ARR_AGE), '', "class='form-control'"); ?>
					  <span class="errorcls" id="span_age_to"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Height :</label>
					<div class="col-sm-3">
					  <?php 
					 
					  makeDropDown('height_from', array_keys($ARR_HEIGHT), array_values($ARR_HEIGHT), '', "class='form-control'"); ?>
					  <span class="errorcls" id="span_height_from"></span>
					</div>
					<div class="col-sm-1 text-center">
						to
					</div>
					<div class="col-sm-3">
					  <?php 
					  
					  makeDropDown('height_to', array_keys($ARR_HEIGHT), array_values($ARR_HEIGHT), '', "class='form-control'"); ?>
					  <span class="errorcls" id="span_height_to"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Marital Status :</label>
					<div class="col-sm-5">
					   <?php 
					  
					   makeDropDown('martial_status', array_keys($MARITAL_STATUS), array_values($MARITAL_STATUS), '', "class='form-control'"); ?>
					   <span class="errorcls" id="span_martial_status"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Religion :</label>
					<div class="col-sm-5">
					  <?php 
					   
					  $Religions = $db->getRecord($trace = 0,array('religion_name,religion_code'),'tbl_religions',array('status'=>'A'),'','','rank','ASC');
						makeDropDownFromDB('religion', $Religions, 'religion_code', 'religion_name', $partnerInfoArr[0]['religion'], '', "class='form-control'");?>
						<span class="errorcls" id="span_religion"></span>
					</div>
				  </div>	
				  <div class="form-group">
					<label class="col-sm-3 control-label">Mother Tongue :</label>
					<div class="col-sm-5">
					  <?php 
					  
						$motherTongue = $db->getRecord($trace = 0,array('mother_tongue,mother_tongue_code'),'tbl_mother_tongue',array('status'=>'A'),'','','rank','ASC');
						makeDropDownFromDB('mother_tongue_code', $motherTongue, 'mother_tongue_code', 'mother_tongue', $partnerInfoArr[0]['mother_tongue_code'], '', "class='form-control'");?>
						<span class="errorcls" id="span_mother_tongue_code"></span>
					</div>
				  </div>		  
				  <div class="form-group">
					<label class="col-sm-3 control-label">Community :</label>
					<div class="col-sm-5">
					  <?php 
					  
					  $community = $db->getRecord($trace = 0,array('community_name,community_code'),'tbl_community',array('status'=>'A'),'','','community_name','ASC');
						makeDropDownFromDB('community', $community, 'community_code', 'community_name',$partnerInfoArr[0]['community'], '', "class='form-control'");?>
						<span class="errorcls" id="span_community"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Manglik :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" name="manglik" value="2" checked>Doesn't Matter</label>
						<label class="radio-inline"><input type="radio" name="manglik" value="1" >Only Mangliks</label>
						<label class="radio-inline"><input type="radio" name="manglik" value="0" >No Mangliks</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Profile Created By :</label>
					<div class="col-sm-8">
						<label class="radio-inline"><input type="radio" name="profile_created_by" value="0" checked>Doesn't Matter</label>
						<label class="radio-inline"><input type="radio" name="profile_created_by" value="1" >Self</label>
						<label class="radio-inline"><input type="radio" name="profile_created_by" value="2" >Parent/ Guardian</label>
						<label class="radio-inline"><input type="radio" name="profile_created_by" value="3" >Sibling / Friend / Others</label>
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
					<div class="col-sm-5">
					  <?php 
					  
					  $Education = $db->getRecord($trace = 0,array('name,education_code'),'tbl_education',array('status'=>'A'),'','','name','ASC');
					  makeDropDownFromDB('education', $Education, 'name', 'name', $partnerInfoArr[0]['education'], '', "class='form-control'");?>
					  <span class="errorcls" id="span_education"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">College  :</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" value="<?=($partnerInfoArr[0]['college']!=''?ucwords($partnerInfoArr[0]['college']):'')?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Working :</label>
					<div class="col-sm-5">
					  <?php 
					  
					  $Profession = $db->getRecord($trace = 0,array('category_name,category_code'),'tbl_profession_category',array('status'=>'A'),'','','category_name','ASC');
						makeDropDownFromDB('working_with', $Profession, 'category_name', 'category_name', $partnerInfoArr[0]['working_with'], '', "class='form-control'");?>
						<span class="errorcls" id="span_working_with"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Annual income :</label>
					<div class="col-sm-5">
				  	<?php 					 
					  makeDropDown('annual_income', array_keys($ARR_ANNUAL_INCOME), array_values($ARR_ANNUAL_INCOME), '', "class='form-control'"); ?>
					  <span class="errorcls" id="span_annual_income"></span>
					 
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
					<div class="col-sm-5">
					   <?php 
					  
					   $country = $db->getRecord($trace =0,array('country_name,country_id_pk'),'tbl_countries',array('status'=>'A'),'','','country_name','ASC');
						makeDropDownFromDB('country_living', $country, 'country_id_pk', 'country_name', $partnerInfoArr[0]['country_living'], '', "class='form-control'");?>
						<span class="errorcls" id="span_country_living"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">State  :</label>
					<div class="col-sm-5">
					   <?php 
					   
					   $state = $db->getRecord($trace =0,array('state_name,state_id_pk'),'tbl_states',array('status'=>'A'),'','','state_name','ASC');
						makeDropDownFromDB('state_living', $state, 'state_id_pk', 'state_name', $partnerInfoArr[0]['state_living'], '', "class='form-control'");?>
						<span class="errorcls" id="span_state_living"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">City  :</label>
					<div class="col-sm-5">
					  <?php 
					  
					  $city = $db->getRecord($trace =0,array('city_name,city_id_pk'),'tbl_cities',array('status'=>'A'),'','','city_name','ASC');
						makeDropDownFromDB('city_district', $city, 'city_id_pk', 'city_name', $partnerInfoArr[0]['city_district'], '', "class='form-control'");?>
						<span class="errorcls" id="span_city_district"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Country Grew up in :</label>
					<div class="col-sm-5">
					   <?php 
					  
					   $country = $db->getRecord($trace =0,array('country_name,country_id_pk'),'tbl_countries',array('status'=>'A'),'','','country_name','ASC');
						makeDropDownFromDB('country_grew_upin', $country, 'country_id_pk', 'country_name', $partnerInfoArr[0]['country_grew_upin'], '', "class='form-control'");?>
						<span class="errorcls" id="span_country_grew_upin"></span>
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
					<label class="col-sm-3 control-label">Diet :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" value="Doesn't Matter" name="diet" checked>Doesn't Matter</label>
						<label class="radio-inline"><input type="radio" value="Veg" name="diet">Veg</label>
						<label class="radio-inline"><input type="radio" value="Non-Veg" name="diet">Non-Veg</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Drink :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" name="drink" value="Y" checked>Doesn't Matter</label>
						<label class="radio-inline"><input type="radio" name="drink" value="N">Never Drinks</label>
						<label class="radio-inline"><input type="radio" name="drink" value="O">Drinks Occasionally</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Smoke :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" name="smoke" value="Y" checked>Doesn't Matter</label>
						<label class="radio-inline"><input type="radio" name="smoke" value="N">Don't include profiles who smoke</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Body Type :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" value="Doesn't Matter" name="body_type" checked> Doesn't Matter</label>
						<label class="radio-inline"><input type="radio" value="Slim" name="body_type"> Slim</label>
						<label class="radio-inline"><input type="radio" value="Athletic" name="body_type"> Athletic</label>
						<label class="radio-inline"><input type="radio" value="Heavy" name="body_type"> Heavy</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Skin Tone :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" value="Doesn't Matter" name="skin_tone" checked> Doesn't Matter</label>
						<label class="radio-inline"><input type="radio" value="Fair" name="skin_tone"> Fair</label>
						<label class="radio-inline"><input type="radio" value="Dark" name="skin_tone"> Dark</label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Disability :</label>
					<div class="col-sm-8">
					  	<label class="radio-inline"><input type="radio" name="disability" value="Doesn't Matter" checked>Doesn't Matter</label>
						<label class="radio-inline"><input type="radio" name="disability" value="Don't include Profiles with disability">Don't include Profiles with disability</label>
					</div>
				  </div>
				  <hr>
				  <div class="form-group">
					<div class="col-sm-10">
					  <button type="submit" class="btn btn-danger" onClick="return validation('userBasicDetail', '<?=$formVldParm?>');">Save Changes</button>
					  <input type="hidden" name="postAction" id="postAction" value="addPartnerProfile" >
					  <button type="reset" class="btn btn-default">BACK</button>
					</div>
				  </div>
				</div>
			  </div>
			</form>

		  </div>
		</div>
	</div>
</section>

<?php 
	include('footer.php');
?> 
