<?php
include('head.php');
include('currency_api.php');
$profileCode = $_SESSION['userDetail']['profile_code'];
$formVldLocationParm = "dropDown:country_id_fk:Country~dropDown:state_id_fk:State~dropDown:city_id_fk:City~numeric:pin_code_fk:Pin Code";
?>

<section style="padding-top:0px;">
	<div class="container bootstrap snippets full-information">
		<div class="row">
	  		<div class="tab-content">
			  <?php $locationFilled = $db->getRecord(0, array('country_id_fk','state_id_fk','city_id_fk','pin_code_fk'), 'tbl_member_contact_info', array('profile_code' => $profileCode)); //print_r($locationFilled);?>
			 
			  		 <div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<h4>Please Complete Your Location Details</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; padding: 30px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
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
										
											<input type="submit" value="Save" class="btn btn-danger">
											<input type="hidden" value="editLocationDetail" name="postAction" class="btn btn-danger">
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
<script type="text/javascript">
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
</script>