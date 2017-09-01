<?php 
	include('header.php');
	$formVldParm = "dropDown:father_status:Father Status~dropDown:mother_status:Mother Status~dropDown:no_of_brothers:Number Of Brothers~dropDown:no_of_sisters:Number Of Sisters~dropDown:affluence_level:Family Affluence";	
?>

<!--  end navbar -->
<section>
	<div class="container bootstrap snippets full-information">
		<div class="row">
		  <div class="col-xs-12 col-sm-6 col-sm-offset-3">
			  <h3 class="text-center">Please Add Your Family Details</h3>
				<div class="panel panel-body" style="box-shadow: 5px 5px 7px #ccc; border: 1px solid #ccc; padding: 41px 0px;">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-10">
							<form role="form" name="userBasicDetail3" id="userBasicDetail3" method="POST" action="user-controller.php" onSubmit="return validation('userBasicDetail3', '<?=$formVldParm?>');">
							<?php include('user-session-msg.php');?>
		    					<div class="form-group">
								  <label for="sel1">Father Status <span>*</span></label>
								  <?php makeDropDown('father_status', array_keys($ARR_PARENT_STATUS), array_values($ARR_PARENT_STATUS), '', "class='form-control'"); ?>
								  <span class="errorcls" id="span_father_status"></span>
								</div>
			    				
			    				<div class="form-group">
								  <label for="sel1">Mother Status<span>*</span></label>
								  <?php makeDropDown('mother_status', array_keys($ARR_MOTHER_STATUS), array_values($ARR_MOTHER_STATUS), '', "class='form-control'"); ?>
								  <span class="errorcls" id="span_mother_status"></span>
								</div>
								
		    					<div class="form-group">
								  <label for="sel1">No. of Brother <span>*</span></label>
								  <?php makeDropDown('no_of_brothers', array_keys($ARR_NUMBER_BROTHER), array_values($ARR_NUMBER_BROTHER), '', "class='form-control'"); ?>
								  <span class="errorcls" id="span_no_of_brothers"></span>
								</div>
    							
    							<div class="form-group">
								  <label for="sel1">No. of Sister <span>*</span></label>
								   <?php makeDropDown('no_of_sisters', array_keys($ARR_NUMBER_SISTER), array_values($ARR_NUMBER_SISTER), '', "class='form-control'"); ?>
								   <span class="errorcls" id="span_no_of_sisters"></span>
								</div>
	    					
	    						<div class="form-group">
								  <label for="sel1">Family Affluence <span>*</span></label>
								   <?php makeDropDown('affluence_level', array_keys($FAMILY_AFFLUENCE), array_values($FAMILY_AFFLUENCE), '', "class='form-control'"); ?>
								   <span class="errorcls" id="span_affluence_level"></span>
								</div>
	    					
		    					<input type="submit" value="Save" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
		    					<input type="hidden" name="postAction" id="postAction" value="basicDetaile3" />					           
			    				<a href="life-style.php"><input type="button" value="Continue" class="btn btn-danger"></a>
			    		
			    			</form>	
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

