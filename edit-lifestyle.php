<?php
include('head.php');
include('currency_api.php');
$profileCode = $_SESSION['userDetail']['profile_code'];
?>

<section style="padding-top:0px;">
	<div class="container bootstrap snippets full-information">
		<div class="row">
	  		<div class="tab-content">
			 <?php $lifeStyleFilled = $db->getRecord(0, array('diet','drink','smoke'), 'tbl_lifestyle', array('profile_code' => $profileCode)); ?>
			  
			  		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<h4>Please Complete Your Lifestyle Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; padding: 30px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
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
										
											<input type="submit" value="Save" class="btn btn-danger">
											<input type="hidden" value="editLifestyleDetail" name="postAction" class="btn btn-danger">
									</form>	
									<a href="<?=USER_PATH?>dashboard.php" class="btn btn-danger">Back</a>
								</div>
							</div>
						</div>
					</div>
			
			  
			</div>
		</div>
	</div>
</div>
<?php include_once('footer.php'); ?>