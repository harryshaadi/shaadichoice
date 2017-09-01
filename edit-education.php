<?php
include('head.php');
include('currency_api.php');
$profileCode = $_SESSION['userDetail']['profile_code'];
$formVldEduParm = "dropDown:education_code:Education~dropDown:working_with:Working With~dropDown:currency:Currency~dropDown:annual_income:Annual Income";
?>

<section style="padding-top:0px;">
	<div class="container bootstrap snippets full-information">
		<div class="row">
	  		<div class="tab-content">
			<?php $educationFilled = $db->getRecord(0, array('education_category','education_code','currency','working_with','annual_income'), 'tbl_education_career', array('profile_code' => $profileCode)); ?>
			  
					 <div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<h4>Please Complete Your Education Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc;  padding: 30px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
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
											<input type="submit" value="Save" class="btn btn-danger">
											<input type="hidden" name="postAction" id="postAction" value="editEducationDetail" />
										</form>
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