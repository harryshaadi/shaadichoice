<?php 
session_start();
	include('header.php');
$formVldParm = "dropDown:height:Height";	
?>

<!--  end navbar -->
<section>
	<div class="container bootstrap snippets full-information">
		<div class="row">
		  <div class="col-xs-12 col-sm-6 col-sm-offset-3">
		  		<h3 class="text-center">Now Builds Your Profile</h3>
				<div class="panel panel-body" style="box-shadow: 5px 5px 7px #ccc; border: 1px solid #ccc; padding: 41px 0px;">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-10">
							<form role="form" name="userBasicDetail1" id="userBasicDetail1" method="POST" action="user-controller.php" onSubmit="return validation('userBasicDetail1', '<?=$formVldParm?>');">
							<?php include('user-session-msg.php');?>
								<div class="row">
									<div class="col-sm-12">
										<label>Date Of Birth <span>*</span></label>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="form-group">
										  <select class="form-control" name="days" id="days">
										  <?php for($i=1;$i<=31;$i++){?>
											<option><?php echo $i;?> </option>";
										<?php } ?>
										  </select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="form-group">
										  <select class="form-control" name="months" id="months">
										   <?php for($i=1;$i<=12;$i++){?>
											<option><?php echo $i;?> </option>";
											<?php } ?>											
										  </select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="form-group">
										  <select class="form-control" name="years"  id="years">
											 <?php for($i=1950;$i<=2000;$i++){?>
											<option><?php echo $i;?> </option>";
											<?php } ?>
										  </select>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label>Height <span>*</span></label>
									<div class="form-group">
									  <?php makeDropDown('height', array_keys($ARR_HEIGHT), array_values($ARR_HEIGHT), '', "class='form-control'");  ?>
									</div>
									<span class="errorcls" id="span_height"></span>
								</div>
	    					
		    					<div class="form-group">
									<label>Manglik <span>*</span></label>
									<br>
									<label class="radio-inline">
									  <input type="radio" name="manglik" value="Y">Yes
									</label>
									<label class="radio-inline">
									  <input type="radio" name="manglik" value="N" checked>No
									</label>
									<label class="radio-inline">
									  <input type="radio" name="manglik" value="DN">Don't Know
									</label>
								</div>
    					
    							<div class="form-group">
									<label>Disability <span>*</span></label>
									<br>
									<label class="radio-inline">
									  <input type="radio" name="disability" value="PD">Yes
									</label>
									<label class="radio-inline">
									  <input type="radio" name="disability" value="N" checked>No
									</label>
								</div>
	    					
		    					<input type="submit" value="Save" class="btn btn-danger" >&nbsp;&nbsp;&nbsp;
		    					<input type="hidden" name="postAction" id="postAction" value="basicDetaile1" />					           
			    				<a href="education-career.php"><input type="button" value="Continue" class="btn btn-danger"></a>
			    		
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

