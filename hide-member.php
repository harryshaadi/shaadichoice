<?php 
	include('head.php');
	 $dataArr = $db->getRecord(0,array('show_hide_profile'), 'tbl_profiles', array('profile_code' => $_SESSION['userDetail']['profile_code']));
	 if($dataArr[0]['show_hide_profile'] =='')
	 {
		$dataArr[0]['show_hide_profile'] = 'S';
	 }
?> 

<!--  end navbar -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3 panel-body">
						<?php include_once('manage_profile_left.php');?>
					</div>
					
					<div class="col-sm-9 panel-body profile-list">
					<?php include_once('user-session-msg.php');?>
						<div class="panel panel-body">
								<h4>Profile Visibility</h4>
						</div>
						<div class="panel panel-body">
							<div class="row hide-column">
									<div class="col-sm-12">
										<form>
											<ul class="list-group">
												<li class="list-group-item">
												<div class="btn-group1" id="toggle_event_editing1">
														<button type="button" onClick="showhidebutton('s',1,'show_hide_profile');" id="s1"
														class="<?=($dataArr[0]['show_hide_profile']=='S'?"btn btn-danger locked_active":"btn btn-default unlocked_inactive")?>">Show Account</button>
														<button type="button" onClick="showhidebutton('h',1,'show_hide_profile');" id="h1" class="<?=($dataArr[0]['show_hide_profile']=='H'?"btn unlocked_active btn-danger":"btn btn-default unlocked_inactive")?>">Hide Account</button>
													</div>
												</li>
											</ul>	
										</form>
										<p>Click to check or uncheck the sections you want to show or hide your profile When your profile is hidden you will not appear in any dashboards or search results</p>
									</div>
									
									<div class="col-sm-12">
										<form method="POST" action="<?=USER_PATH?>user-controller.php">
											<ul class="list-group">
												<li class="list-group-item">
													<div class="btn-group1">
														<button type="submit" class="btn btn-danger locked_active" onclick="return alertONDelete();">Delete Account</button>
														<input type="hidden" name="postAction" value="deleteUserProfile">
													</div>
												</li>
											</ul>	
										</form>
										<p>Click to delete your profile Please bear in mind that deleting your Account removes all information associated with your account.</p>
									</div>
									
								</div>
								
							
						   </div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>
<?php if(isset($_SESSION['profileDeleted'])){
	unset($_SESSION['userDetail']);
unset($_SESSION['profileDeleted']); }
?>

<?php 
	include('footer.php');
?> 
<script>

function showalert()
{
	if(confirm('Are you sure to delete?')){
	return true;}
	else {return false;}
}
	
function showhidebutton(data,ID,myID){
	var flag;
	if(data == 's') {flag = 'show';} else if(data == 'h'){ flag = 'hide'; }
	if(confirm('Are you sure to '+ flag +' your pofile?'))
	{
		if($(this).hasClass('locked_active') || $(this).hasClass('unlocked_inactive')){
		$('#switch_status').html('Switched on.');
		}else{
			$('#switch_status').html('Switched off.');
		}
		$('#toggle_event_editing'+ID+' button').eq(0).toggleClass('locked_inactive locked_active btn-default btn-danger');
		$('#toggle_event_editing'+ID+' button').eq(1).toggleClass('unlocked_inactive unlocked_active btn-danger btn-default');
		if(data=='s'){
			var val = 'S';
			var id = '<?=$_SESSION['userDetail']['profile_code']?>';
			$.ajax({
			type: "POST",
			url: "get-user-ajex-data.php?profile_code="+id+"&field="+myID+"&value="+val+"&getAction=updateProfileShowHideStatus",
		}).done(function(data){ });
		}else if(data=='h'){
			var val = 'H';
			var id = '<?=$_SESSION['userDetail']['profile_code']?>';
			$.ajax({
			type: "POST",
			url: "get-user-ajex-data.php?profile_code="+id+"&field="+myID+"&value="+val+"&getAction=updateProfileShowHideStatus",
		}).done(function(data){  });
		}else{
			$('#'+myID).val('');
		}
	}
	else {return false;}
}

function alertONDelete()
{
	if(confirm('Are you sure to delete yor profile?'))
	{
		return true;
	}
	else
	{
		return false;
	}
}	
</script>