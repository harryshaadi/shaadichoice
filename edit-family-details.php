<?php
include('head.php');
include('currency_api.php');
$profileCode = $_SESSION['userDetail']['profile_code'];
$formVldFmlyParm = "dropDown:father_status:Father Status~dropDown:mother_status:Mother Status~dropDown:affluence_level:Family Affluence~text:native_place:Native Place~text:family_location:Family Location";
?>

<section style="padding-top:0px;">
	<div class="container bootstrap snippets full-information">
		<div class="row">
	  		<div class="tab-content">
			 <?php $familyFilled = $db->getRecord(0, array('*'), 'tbl_family_details', array('profile_code' => $profileCode)); ?>
			 
					<div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<h4>Please Complete Your Family Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; padding: 30px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
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
											  <input type="radio" name="sibling_status" class="siblings" value="Y" <?php if($familyFilled[0]['sibling_status']=='Y'){ echo'checked';} ?>>Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="sibling_status" class="siblings" value="N"  <?php if($familyFilled[0]['sibling_status']=='N'){ echo 'checked';} ?>>No
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
										 <div class="form-group">
											<label>Family type<span>*</span></label>
											<div class="form-group">
												<label class="radio-inline"><input type="radio" name="family_type" value="Joint" <?php if($familyFilled[0]['family_type']=='Joint') echo 'checked'; ?>>Joint</label>
												<label class="radio-inline"><input type="radio" name="family_type" value="Nuclear" <?php if($familyFilled[0]['family_type']=='Nuclear') echo 'checked'; ?>>Nuclear</label>
											</div>
										  </div>
										<div class="form-group">
											<label">Family Location :</label>
											<div class="form-group">
											  <input type="text" name="family_location" id="family_location" class="form-control" value="<?=ucwords($familyFilled[0]['family_location'])?>">
											</div>
											<span class="errorcls" id="span_family_location"></span>
										  </div>
										  <div class="form-group">
											<label>Native Place<span>*</span></label>
											<div class="form-group">
											  <input type="text" name="native_place" id="native_place" class="form-control" value="<?=ucwords($familyFilled[0]['native_place'])?>">
											  <span class="errorcls" id="span_native_place"></span>
											</div>
										  </div>
										 
										  <div class="form-group">
											<label>Family Affluence<span>*</span></label>
											<div class="form-group">
											   <?php 
											   if($familyFilled[0]['affluence_level']=='') $affluence = '';
												else $affluence = $FAMILY_AFFLUENCE[$familyFilled[0]['affluence_level']];
											   makeDropDown('affluence_level', array_keys($FAMILY_AFFLUENCE), array_values($FAMILY_AFFLUENCE), $affluence, "class='form-control'");  ?>
											   <span class="errorcls" id="span_affluence_level"></span>
											</div>
										  </div>
										
											<input type="submit" value="Save" class="btn btn-danger">
											<input type="hidden" name="postAction" value="editFamilyDetailData" class="btn btn-danger">
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

</script>