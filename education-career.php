<?php 
session_start();
	include('header.php');
	$formVldParm = "dropDown:working_as:Work~dropDown:annual_income:Income";	
?>

<!--  end navbar -->
<section>
	<div class="container bootstrap snippets full-information">
		<div class="row">
		  <div class="col-xs-12 col-sm-6 col-sm-offset-3">
			  <h3 class="text-center">Please Add Your Education & Career Details</h3>
				<div class="panel panel-body" style="box-shadow: 5px 5px 7px #ccc; border: 1px solid #ccc; padding: 41px 0px;">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-10">
							<form role="form" name="userBasicDetail2" id="userBasicDetai2" method="POST" action="user-controller.php" onSubmit="return validation('userBasicDetai2', '<?=$formVldParm?>');">
							<?php include('user-session-msg.php');?>
		    					<div class="form-group">
								  <label for="sel1">Your Education <span>*</span></label>
						 <?php  $education = $db->getRecord($trace = 0,array('name,education_code'),'tbl_education',array('status'=>'A'));
						 //print_r($education);die;
						       makeDropDownFromDB('name', $education, 'name', 'name', $education[0]['name'], '', "class='form-control'");?>			  
								  <!-- <select class="form-control" id="sel1">
									<option>Master</option>
									<option>Beachlors</option>
									<option>Intermediate</option>
									<option>High School</option>
								  </select> -->
								</div>
			    				
			    				<div class="form-group">
								  <label for="sel1">Education Field <span>*</span></label>
								  <?php  $education_category = $db->getRecord($trace = 0,array('category_name,category_code'),'tbl_education_category',array('status'=>'A'));
						 //print_r($education);die;
						       makeDropDownFromDB('category_code', $education_category, 'category_code', 'category_name', $education_category[0]['category_code'], '', "class='form-control'");?>	
								</div>
								
		    					<div class="form-group">    					
		    					
								  <label for="sel1">Your Work <span>*</span></label>
								  <?php makeDropDown('working_as', array_keys($ARR_WORKING_STATUS), array_values($ARR_WORKING_STATUS), '', "class='form-control'");  ?>
								  <span class="errorcls" id="span_working_as"></span>
								</div>
	    					
	    						<div class="form-group">
								  <label for="sel1">Annual Income <span>*</span></label>
								   <?php makeDropDown('annual_income', array_keys($ARR_ANNUAL_INCOME), array_values($ARR_ANNUAL_INCOME), '', "class='form-control'");  ?>
								   <span class="errorcls" id="span_annual_income"></span>
								</div>
	    					
		    					<input type="submit" value="Save" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
		    					<input type="hidden" name="postAction" id="postAction" value="basicDetaile2" />					           
			    				<a href="family-details.php"><input type="button" value="Continue" class="btn btn-danger"></a>
			    		
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

