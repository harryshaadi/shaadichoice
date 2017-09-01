<?php 
     session_start();
     include('header.php');	
	$formVldParm = "text:fname:First Name~text:lname:Last name~numericPhone:contact_no:Mobile Number~dropDown:religion_code:Religion Name~dropDown:maritial_status:Marital Status";	
?>

<!--  end navbar -->
<section>
	<div class="container bootstrap snippets full-information">
		<div class="row">
		  <div class="col-xs-12 col-sm-6 col-sm-offset-3">
		  		<h3 class="text-center">Now Some Basic Details</h3>
				<div class="panel panel-body" style="box-shadow: 5px 5px 7px #ccc; border: 1px solid #ccc; padding: 41px 0px;">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-10">
							<form role="form" name="userBasicDetail" id="userBasicDetail" method="POST" action="user-controller.php" onSubmit="return validation('userBasicDetail', '<?=$formVldParm?>');">
							<?php include('user-session-msg.php');?>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="form-group">
											<label>First Name <span>*</span></label>
											<input type="text" name="fname" id="fname" class="form-control input-sm" placeholder="First Name">
											<span class="errorcls" id="span_fname"></span>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="form-group">
											<label>Middle Name</label>
											<input type="text" name="mname" id="mname" class="form-control input-sm" placeholder="Middle Name">
											<span class="errorcls" id="span_mname"></span>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="form-group">
											<label>Last Name<span>*</span></label>
											<input type="text" name="lname" id="lname" class="form-control input-sm" placeholder="Last Name"><span class="errorcls" id="span_lname"></span>
											<span class="errorcls" id="span_lname"></span>
										</div>
									</div>
								</div>
								
								<!-- <div class="form-group">
									<label>Gender<span>*</span></label>
									<br>
									<label class="radio-inline">
									  <input type="radio" name="gender" checked>Male
									</label>
									<label class="radio-inline">
									  <input type="radio" name="gender">Female
									</label>
								</div> -->
								<div class="form-group">
									<label>Mobile Number <span>*</span></label>
									<input type="text" name="contact_no" id="contact_no" class="form-control input-sm" placeholder="Mobile Number">
									<span class="errorcls" id="span_contact_no"></span>
								</div>
		    					
		    					<div class="form-group">
								  <label for="sel1">Religion <span>*</span></label>

								 <?php 

						$userBasicArr = $db->getRecord($trace = 0,array('religion_code,religion_name'),'tbl_religions');
						makeDropDownFromDB('religion_code', $userBasicArr, 'religion_code', 'religion_name', $userBasicArr[0]['religion_name'], '', "class='form-control'");?>								 
								  <span class="errorcls" id="span_religion_code"></span>
								</div>
			    				
			    				<div class="form-group">
								  <label for="sel1">Mother Tongue <span>*</span></label>
								 <?php  $motherTongue = $db->getRecord($trace = 0,array('mother_tongue,mother_tongue_code'),'tbl_mother_tongue',array('status'=>'A'),'','','rank','ASC');
						        makeDropDownFromDB('mother_tongue_code', $motherTongue, 'mother_tongue_code', 'mother_tongue', $motherTongue[0]['mother_tongue_code'], '', "class='form-control'");?>		
								  <span class="errorcls" id="span_mother_tongue_code"></span>
								</div>
								
		    					<div class="form-group">
								  <label for="sel1">Marital Status <span>*</span></label>

								  <?php  makeDropDown('maritial_status', array_keys($MARITAL_STATUS), array_values($MARITAL_STATUS), '', "class='form-control'");?>
								  <span class="errorcls" id="span_maritial_status"></span>
								</div>
		    					<input type="submit" value="Save" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
		    					<input type="hidden" name="postAction" id="postAction" value="basicDetaile" />					           
			    				<a href="build-profile.php"><input type="button" value="Continue" class="btn btn-danger"></a>
			    		
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

